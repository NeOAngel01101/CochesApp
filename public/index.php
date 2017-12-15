<?php
require_once '../vendor/autoload.php';
require_once '../arrays.php';
use Phroute\Phroute\RouteCollector;
use Illuminate\Database\Capsule\Manager as Capsule;

// Punto de entrada a la aplicación
require_once '../helpers.php';

session_start();

$baseDir = str_replace(
    basename($_SERVER['SCRIPT_NAME']),
    '',
    $_SERVER['SCRIPT_NAME']);

$baseUrl = "http://" . $_SERVER['HTTP_HOST'] . $baseDir;
define('BASE_URL', $baseUrl);
/**
 * Mandamos la direccion de donde se situa el env para que coja los datos correctamente.
 */
if(file_exists(__DIR__.'/../env')){
    $dotenv = new Dotenv\Dotenv(__DIR__.'/..','env');
    $dotenv->load();
}


/**
 * Instancia de eloquent ,aqui ponemos la informacion para que se conecte con el servidor,con sus datos host
 * name user y pass.Para no ponerlo hardcodeado ,le mandamos la ruta que tenemos en el archivo env en la raiz
 * principal del proyecto.
 */
$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => getenv('DB_HOST'),
    'database'  => getenv('DB_NAME'),
    'username'  => getenv('DB_USER'),
    'password'  => getenv('DB_PASS'),
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$route = $_GET['route'] ?? "/";

$router = new RouteCollector();

/**
 * Filtro para aplicar a rutas a USUARIOS AUTENTICADOS
 */
$router->filter('auth', function(){
    if(!isset($_SESSION['userId'])){
        header('Location: '. BASE_URL);
        return false;
    }
});
/**
 * Aqui se añaden las rutas web enlazadas a su controlador y a la funcion que desempeñan.Solo seran
 * vistas una vez que el usuario se haya logueado correctamente a la pagina.
 */
$router->group(['before' => 'auth'], function ($router){
    $router->get('/coches/new', ['\App\Controllers\CochesController', 'getNew']);
    $router->post('/coches/new', ['\App\Controllers\CochesController', 'postNew']);
    $router->get('/coches/edit/{id}', ['\App\Controllers\CochesController', 'getEdit']);
    $router->put('/coches/edit/{id}', ['\App\Controllers\CochesController', 'putEdit']);
    $router->delete('/coches/', ['\App\Controllers\CochesController', 'deleteIndex']);
    $router->get('/logout', ['\App\Controllers\HomeController', 'getLogout']);
});

/**
 * Filtro para aplicar a rutas a USUARIOS NO AUTENTIFICADOS
 */
$router->filter('noAuth', function(){
    if( isset($_SESSION['userId'])){
        header('Location: '. BASE_URL);
        return false;
    }
});
/**
 * Aqui se añaden las rutas web enlazadas a su controlador y a la funcion que desempeñan.Solo seran
 * vistas una vez que el usuario no este logueado en la pagina.
 */
$router->group(['before' => 'noAuth'], function ($router){
    $router->get('/login', ['\App\Controllers\HomeController', 'getLogin']);
    $router->post('/login', ['\App\Controllers\HomeController', 'postLogin']);
    $router->get('/registro', ['\App\Controllers\HomeController', 'getRegistro']);
    $router->post('/registro', ['\App\Controllers\HomeController', 'postRegistro']);

});

/**
 * Aqui se añaden las rutas web enlazadas a su controlador y a la funcion que desempeñan.Estas rutas
 * siempre seran vistas por el usuario,este o no registrado en la pagina.
 */
$router->get('/',['\App\Controllers\HomeController', 'getIndex']);
$router->get('/coches/{id}', ['\App\Controllers\CochesController', 'getIndex']);
$router->post('/coches/{id}', ['\App\Controllers\CochesController', 'postIndex']);
$router->get('/contacto/new', ['\App\Controllers\ContactoController', 'getNew']);
$router->post('/contacto/new', ['\App\Controllers\ContactoController', 'postNew']);
$router->controller('/api', App\Controllers\ApiController::class);

$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$method = $_REQUEST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$response = $dispatcher->dispatch($method, $route);

// Print out the value returned from the dispatched function
echo $response;
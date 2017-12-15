<?php
namespace App\Controllers;

use App\Models\Comment;
use App\Models\Coche;
use Sirius\Validation\Validator;

class CochesController extends BaseController {

    /**
     * Ruta [GET] /coches/new que muestra el formulario de añadir una nueva distribución.
     *
     * @return string Render de la web con toda la información.
     */
    public function getNew(){
        global $marca,$traccion,$turbo,$cilindros,$tipo;
        $errors = array();  // Array donde se guardaran los errores de validación
        $error = false;     // Será true si hay errores de validación.

        $webInfo = [
            'h1'        => 'AÑADIR COCHE',
            'submit'    => 'Añadir',
            'method'    => 'POST'
        ];

        // Se construye un array asociativo $coche con todas sus claves vacías
        $coche = array_fill_keys(["imagen", "imagen2","nombre", "tipo", "potencia", "cilindros", "aceleracion", "parmaxima", "velocidadmaxima", "turbo", "traccion", "marca", "year", "precio"],"");

        return $this->render('formCoches.twig', [
            'tipo'                      =>$tipo,
            'cilindros'                 =>$cilindros,
            'turbo'                     =>$turbo,
            'traccion'                  =>$traccion,
            'marca'                     => $marca,
            'coche'                     => $coche,
            'errors'                     => $errors,
            'webInfo'                    => $webInfo
        ]);
    }

    /**
     * Ruta [POST] /coches/new que procesa la introducción de una nueva distribución.
     *
     * @return string Render de la web con toda la información.
     */
    public function postNew(){
        global $marca,$traccion,$turbo,$cilindros,$tipo;
        $webInfo = [
            'h1'        => 'AÑADIR COCHE',
            'submit'    => 'Añadir',
            'method'    => 'POST'
        ];

        if (!empty($_POST)) {
            $validator = new Validator();

            $requiredFieldMessageError = "El {label} es requerido";
            $numeroFieldMessageError ="{label} debe ser numerico";

            $validator->add('nombre:Nombre', 'required',[],$requiredFieldMessageError);
            $validator->add('tipo:Tipo', 'required', [], $requiredFieldMessageError);
            $validator->add('potencia:Potencia', 'integer',[], $numeroFieldMessageError);
            $validator->add('cilindros:Cilindros','required',[],$requiredFieldMessageError);
            $validator->add('aceleracion:Aceleracion','required',[],$requiredFieldMessageError);
            $validator->add('parmaxima:Parmaxima','integer',[],$numeroFieldMessageError);
            $validator->add('velocidadmaxima:VelocidadMaxima','integer',[],$numeroFieldMessageError);
            $validator->add('turbo:Turbo','required',[],$requiredFieldMessageError);
            $validator->add('traccion:Traccion', 'required',[], $requiredFieldMessageError);
            $validator->add('marca:Marca','required',[],$requiredFieldMessageError);
            $validator->add('year:Year','required',[],$requiredFieldMessageError);
            $validator->add('precio:Precio','integer',[],$numeroFieldMessageError);

            // Extraemos los datos enviados por POST
            $coche['imagen'] = htmlspecialchars(trim($_POST['imagen']));
            $coche['imagen2'] = htmlspecialchars(trim($_POST['imagen2']));
            $coche['nombre'] = htmlspecialchars(trim($_POST['nombre']));
            $coche['tipo'] = htmlspecialchars(trim($_POST['tipo']));
            $coche['potencia'] = htmlspecialchars(trim($_POST['potencia']));
            $coche['cilindros'] = htmlspecialchars(trim($_POST['cilindros']));
            $coche['aceleracion'] = htmlspecialchars(trim($_POST['aceleracion']));;
            $coche['parmaxima'] = htmlspecialchars(trim($_POST['parmaxima']));
            $coche['velocidadmaxima'] = htmlspecialchars(trim($_POST['velocidadmaxima']));
            $coche['turbo'] = htmlspecialchars(trim($_POST['turbo']));
            $coche['traccion'] = htmlspecialchars(trim($_POST['traccion']));
            $coche['marca'] = htmlspecialchars(trim($_POST['marca']));
            $coche['year'] = htmlspecialchars(trim($_POST['year']));
            $coche['precio'] = htmlspecialchars(trim($_POST['precio']));

            if ($validator->validate($_POST)) {
                $coche = new Coche([
                    'imagen'          => $coche['imagen'],
                    'imagen2'         => $coche['imagen2'],
                    'nombre'          => $coche['nombre'],
                    'tipo'            => $coche['tipo'],
                    'potencia'        => $coche['potencia'],
                    'cilindros'       => $coche['cilindros'],
                    'aceleracion'     => $coche['aceleracion'],
                    'parmaxima'       => $coche['parmaxima'],
                    'velocidadmaxima' => $coche['velocidadmaxima'],
                    'turbo'           => $coche['turbo'],
                    'traccion'        => $coche['traccion'],
                    'marca'           => $coche['marca'],
                    'year'            => $coche['year'],
                    'precio'          => $coche['precio']
                ]);
                $coche->save();

                // Si se guarda sin problemas se redirecciona la aplicación a la página de inicio
                header('Location: ' . BASE_URL);
            }else{
                $errors = $validator->getMessages();
            }
        }

        return $this->render('formCoches.twig', [
            'tipo'                      =>$tipo,
            'cilindros'                 =>$cilindros,
            'turbo'                     =>$turbo,
            'traccion'                  =>$traccion,
            'marca'                     =>$marca,
            'coche'                     => $coche,
            'errors'                     => $errors,
            'webInfo'                    => $webInfo
        ]);
    }

    /**
     * Ruta [GET] /coches/edit/{id} que muestra el formulario de actualización de una nueva distribución.
     *
     * @param id Código de la distribución.
     *
     * @return string Render de la web con toda la información.
     */
    public function getEdit($id){
        global $marca,$traccion,$turbo,$cilindros,$tipo;
        $errors = array();  // Array donde se guardaran los errores de validación

        $webInfo = [
            'h1'        => 'Editando',
            'submit'    => 'Actualizar',
            'method'    => 'PUT'
        ];

        // Recuperar datos
        $coche = Coche::find($id);

        if( !$coche ){
            header('Location: home.twig');
        }

        return $this->render('formCoches.twig', [
            'tipo'                      =>$tipo,
            'cilindros'                 =>$cilindros,
            'turbo'                     =>$turbo,
            'traccion'                  =>$traccion,
            'marca'                     =>$marca,
            'coche'                     => $coche,
            'errors'                     => $errors,
            'webInfo'                    => $webInfo
        ]);
    }

    /**
     * Ruta [PUT] /coches/edit/{id} que actualiza toda la información de una distribución. Se usa el verbo
     * put porque la actualización se realiza en todos los campos de la base de datos.
     *
     * @param id Código de la distribución.
     *
     * @return string Render de la web con toda la información.
     */
    public function putEdit($id){
        global $marca,$traccion,$turbo,$cilindros,$tipo;
        $errors = array();  // Array donde se guardaran los errores de validación

        $webInfo = [
            'h1'        => 'Editando',
            'submit'    => 'Actualizar',
            'method'    => 'PUT'
        ];

        if( !empty($_POST)){
            $validator = new Validator();

            $requiredFieldMessageError = "El {label} es requerido";
            $numeroFieldMessageError ="{label} debe ser numerico";

            $validator->add('nombre:Nombre', 'required',[],$requiredFieldMessageError);
            $validator->add('tipo:Tipo', 'required', [], $requiredFieldMessageError);
            $validator->add('potencia:Potencia', 'integer',[], $numeroFieldMessageError);
            $validator->add('cilindros:Cilindros','required',[],$requiredFieldMessageError);
            $validator->add('aceleracion:Aceleracion','required',[],$requiredFieldMessageError);
            $validator->add('parmaxima:Parmaxima','integer',[],$numeroFieldMessageError);
            $validator->add('velocidadmaxima:VelocidadMaxima','integer',[],$numeroFieldMessageError);
            $validator->add('turbo:Turbo','required',[],$requiredFieldMessageError);
            $validator->add('traccion:Traccion', 'required',[], $requiredFieldMessageError);
            $validator->add('marca:Marca','required',[],$requiredFieldMessageError);
            $validator->add('year:Year','required',[],$requiredFieldMessageError);
            $validator->add('precio:Precio','integer',[],$numeroFieldMessageError);

            // Extraemos los datos enviados por POST
            $coche['id'] = $id;
            $coche['imagen'] = htmlspecialchars(trim($_POST['imagen']));
            $coche['imagen2'] = htmlspecialchars(trim($_POST['imagen2']));
            $coche['nombre'] = htmlspecialchars(trim($_POST['nombre']));
            $coche['tipo'] = htmlspecialchars(trim($_POST['tipo']));
            $coche['potencia'] = htmlspecialchars(trim($_POST['potencia']));
            $coche['cilindros'] = htmlspecialchars(trim($_POST['cilindros']));
            $coche['aceleracion'] = htmlspecialchars(trim($_POST['aceleracion']));;
            $coche['parmaxima'] = htmlspecialchars(trim($_POST['parmaxima']));
            $coche['velocidadmaxima'] = htmlspecialchars(trim($_POST['velocidadmaxima']));
            $coche['turbo'] = htmlspecialchars(trim($_POST['turbo']));
            $coche['traccion'] = htmlspecialchars(trim($_POST['traccion']));
            $coche['marca'] = htmlspecialchars(trim($_POST['marca']));
            $coche['year'] = htmlspecialchars(trim($_POST['year']));
            $coche['precio'] = htmlspecialchars(trim($_POST['precio']));

            if ( $validator->validate($_POST) ){
                $coche = Coche::where('id', $id)->update([
                    'id'              => $coche['id'],
                    'imagen'          => $coche['imagen'],
                    'imagen2'         => $coche['imagen2'],
                    'nombre'          => $coche['nombre'],
                    'tipo'            => $coche['tipo'],
                    'potencia'        => $coche['potencia'],
                    'cilindros'       => $coche['cilindros'],
                    'aceleracion'     => $coche['aceleracion'],
                    'parmaxima'       => $coche['parmaxima'],
                    'velocidadmaxima' => $coche['velocidadmaxima'],
                    'turbo'           => $coche['turbo'],
                    'traccion'        => $coche['traccion'],
                    'marca'           => $coche['marca'],
                    'year'            => $coche['year'],
                    'precio'          => $coche['precio']
                ]);

                // Si se guarda sin problemas se redirecciona la aplicación a la página de inicio
                header('Location: ' . BASE_URL);
            }else{
                $errors = $validator->getMessages();
            }
        }

        return $this->render('formCoches.twig', [
            'tipo'                      =>$tipo,
            'cilindros'                 =>$cilindros,
            'turbo'                     =>$turbo,
            'traccion'                  =>$traccion,
            'marca'                     =>$marca,
            'coche'                     => $coche,
            'errors'                     => $errors,
            'webInfo'                    => $webInfo
        ]);
    }

    /**
     * Ruta raíz [GET] /coches para la dirección home de la aplicación. En este caso se muestra la lista de distribuciones.
     *
     * @return string Render de la web con toda la información.
     *
     * Ruta [GET] /coches/{id} que muestra la página de detalle de la distribución.
     * todo: La vista de detalle está pendiente de implementar.
     *
     * @param id Código de la distribución.
     *
     * @return string Render de la web con toda la información.
     */
    public function getIndex($id = null){
        if( is_null($id) ){
            $webInfo = [
                'title' => 'Página de Inicio - CochesApp'
            ];

            $coches = Coche::query()->orderBy('id','desc')->get();
            //$coches = Coche::all();

            return $this->render('home.twig', [
                'coches' => $coches,
                'webInfo' => $webInfo
            ]);

        }else{
            // Recuperar datos

            $webInfo = [
                'title' => 'Página de Coche - CocheApp'
            ];

            $coche = Coche::find($id);
            $comments = Comment::where('coche_id', $id)->orderBy('created_at','DESC')->get();

            if( !$coche ){
                return $this->render('404.twig', ['webInfo' => $webInfo]);
            }

            //dameDato($coche);
            return $this->render('coche/coche.twig', [
                'coche'    => $coche,
                'webInfo'   => $webInfo,
                'comments'  => $comments
            ]);
        }

    }

    public function postIndex($id){
        $errors = [];
        $validator = new Validator();

        $validator->add('name:Nombre','required', [], 'El {label} es necesario para comentar');
        $validator->add('name:Nombre','minlength', ['min' => 5], 'El {label} debe tener al menos 5 caracteres');
        $validator->add('email:Email','required', [], 'El {label} no es válido');
        $validator->add('email:Email','required', [], 'El {label} es necesario para comentar');
        $validator->add('comment:Comentario', 'required', [], 'Aunque los silencios a veces dicen mucho no se permiten comentarios vacíos');

        if($validator->validate($_POST)){
            $comment = new Comment();

            $comment->coche_id = $id;
            $comment->user = $_POST['name'];
            $comment->email = $_POST['email'];
            $comment->ip = getRealIP();
            $comment->text = $_POST['comment'];
            $comment->approved = true;

            $comment->save();

            header("Refresh: 0 " );
        }else{
            $errors = $validator->getMessages();
        }

        $webInfo = [
            'title' => 'Página de Coche - CocheApp'
        ];

        $coche = Coche::find($id);
        $comments = Comment::all();
        $webInfo = [
            'title' => 'Página de Coche - CocheApp'
        ];

        if( !$coche ){
            return $this->render('404.twig', ['webInfo' => $webInfo]);
        }

        return $this->render('coche/coche.twig', [
            'errors'    => $errors,
            'webInfo'   => $webInfo,
            'coche'    => $coche,
            'comments'  => $comments
        ]);
    }

    /**
     * Ruta [DELETE] /coches/delete para eliminar la distribución con el código pasado
     */
    public function deleteIndex(){
        $id = $_REQUEST['id'];

        $coche = Coche::destroy($id);

        header("Location: ". BASE_URL);
    }

}
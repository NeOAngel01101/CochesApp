<?php
namespace App\Controllers;

use App\Models\contacto;
use Sirius\Validation\Validator;


class ContactoController extends BaseController {

    /**
    * Ruta [GET] /coches/new que muestra el formulario de añadir una nueva distribución.
    *
    * @return string Render de la web con toda la información.
    */
    public function getNew(){

        $errors = array();  // Array donde se guardaran los errores de validación
        $error = false;     // Será true si hay errores de validación.

        $webInfo = [
        'h1'        => 'CONTACTO',
        'submit'    => 'Enviar',
        'method'    => 'POST'
        ];

        // Se construye un array asociativo $coche con todas sus claves vacías
        $contacto = array_fill_keys(["nombrecontacto", "emailcontacto","telefonocontacto", "mensajecontacto"],"");

        return $this->render('formContactos.twig', [
        'contacto'                   => $contacto,
        'errors'                     => $errors,
        'webInfo'                    => $webInfo
        ]);
    }

    /**
    * Ruta [POST] /contacto/new que procesa la introducción de una nueva distribución.
    *
    * @return string Render de la web con toda la información.
    */
    public function postNew(){
        $webInfo = [
            'h1'        => 'CONTACTO',
            'submit'    => 'Enviar',
            'method'    => 'POST'
        ];

        if (!empty($_POST)) {
            $validator = new Validator();

            $requiredFieldMessageError = "El {label} es requerido";

            $validator->add('nombrecontacto:Nombre', 'required',[],$requiredFieldMessageError);
            $validator->add('emailcontacto:Email', 'required', [], $requiredFieldMessageError);
            $validator->add('mensajecontacto:Mensaje','required',[],$requiredFieldMessageError);


            // Extraemos los datos enviados por POST
            $contacto['nombrecontacto'] = htmlspecialchars(trim($_POST['nombrecontacto']));
            $contacto['emailcontacto'] = htmlspecialchars(trim($_POST['emailcontacto']));
            $contacto['telefonocontacto'] = htmlspecialchars(trim($_POST['telefonocontacto']));
            $contacto['mensajecontacto'] = htmlspecialchars(trim($_POST['mensajecontacto']));


            if ($validator->validate($_POST)) {
            $contacto = new Contacto([
            'nombrecontacto'             => $contacto['nombrecontacto'],
            'emailcontacto'              => $contacto['emailcontacto'],
            'telefonocontacto'           => $contacto['telefonocontacto'],
            'mensajecontacto'            => $contacto['mensajecontacto']

            ]);
            $contacto->save();

            // Si se guarda sin problemas se redirecciona la aplicación a la página de inicio
            header('Location: ' . BASE_URL);
        }else{
                $errors = $validator->getMessages();
            }
        }

        return $this->render('formContactos.twig', [
        'contacto'                   => $contacto,
        'errors'                     => $errors,
        'webInfo'                    => $webInfo
        ]);
    }


}
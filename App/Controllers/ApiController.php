<?php
namespace App\Controllers;

use App\Models\Coche;

class ApiController
{

    public function getCoches($id = null)
    {
        if (is_null($id)) {
            $coches = Coche::all();

            header('Content-Type: application/json');
            return json_encode($coches);
        } else {
            $coche = Coche::find($id);

            header('Content-Type: application/json');
            return json_encode($coche);
        }
    }
}
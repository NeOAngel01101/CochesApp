<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class contacto extends Model{

    protected $table = "contacto";
    protected $fillable = ['nombrecontacto','emailcontacto','telefonocontacto','mensajecontacto'];

}
<?php   
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model{
    protected $table = "contactos";

    protected $fillable = ['nombres', 'apellidos', 'correo', 'telefono_celular', 'telefono_habitacion'];

    // public $timestamps = false;
}
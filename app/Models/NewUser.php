<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewUser extends Model
{
    use HasFactory;

    protected $table = 'usuarios'; //esta es una tabla dentro de la base de datos
    protected $fillable = [
        'name',
        'email',
        'phone',
        'message' //dentro del array nombramos los campos que contiene la tabla
    ]; //fillable son arrays y nos cuida de ataques, si nosotros no nombramos algun campo, no nos lo va a mostrar

}

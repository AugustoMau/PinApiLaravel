<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts'; //esta es una tabla dentro de la base de datos
    protected $fillable = [
        'id',
        'category_id',
        'title',
        'summary',
        'image',
        'description',
        'author' //dentro del array nombramos los campos que contiene la tabla
    ]; //fillable son arrays y nos cuida de ataques, si nosotros no nombramos algun campo, no nos lo va a mostrar

    public function getCategory()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $fillable = [
        'id',
        'category_id',
        'title',
        'summary',
        'image',
        'description',
        'author'
    ];

    public function getCategory()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
}

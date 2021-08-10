<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function showList()
    {
        $posts = Post::all();
        return json_encode($posts);
        //return view('post-list', ['posts' => $posts] );

    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function showList()
    {
        $posts = Post::all();
        return json_encode($posts);
        //return view('post-list', ['posts' => $posts] );

    }

    public function showForm()
    {
        $categories = Category::all();
        return view('new-post', ['category'=>$categories]);
    }

    public function showFormEdit(Request $request)
    {
        $categories = Category::all();
        $post = Post::find($request->id);
        return view('edit-post', ['post'=>$post, 'category'=>$categories]);
    }

    public function save(Request $request)
    {

        Post::create([
            'category_id' => $request->category,
            'title' => $request->title,
            'summary'=>$request->summary,
            'image' => '',
            'description' => $request->description,
            'author'=> $request->author
        ]);
    }

    public function savePostEdit(Request $request)
    {
        if(isset($request->id)){ // es un post ya existente

            $post = Post::find($request->id);
            $post->category_id = $request->category;
            $post->title = $request->title;
            $post->summary = $request->summary;
            $post->image = '';
            $post->description = $request->description;
            $post->author = $request->author;
            $post->save();
        }
    }

}

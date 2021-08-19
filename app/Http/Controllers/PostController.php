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
        return view('post-list', ['posts' => $posts] );
    }

    public function showForm()
    {
        $categories = Category::all();
        return view('new-post', ['category'=>$categories]);
    }

    public function showFormEdit(Request $request)
    {
        try{
            $categories = Category::all();
            $post = Post::find($request->id);
            return view('edit-post', ['post'=>$post, 'category'=>$categories]);

        }catch(\ErrorException $e){
            dd($e->getMessage());
        }

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
        return redirect('/post/list');
    }

    public function savePostEdit(Request $request)
    {
        $post = Post::find($request->id);
        if(!empty($post)){
            $post->category_id = $request->category;
            $post->title = $request->title;
            $post->summary = $request->summary;
            $post->image = '';
            $post->description = $request->description;
            $post->author = $request->author;
            $post->save();
        }
        return redirect('/post/list');
    }

    public function deleteForm(Request $request)
    {
        try{
            $categories = Category::all();
            $post = Post::find($request->id);
            if(!empty($post)){
                return view('delete-post', ['post'=>$post, 'category'=>$categories]);
            }
            dd('empty post');
        }catch(\ErrorException $e){
            dd($e->getMessage());
        }
    }
}

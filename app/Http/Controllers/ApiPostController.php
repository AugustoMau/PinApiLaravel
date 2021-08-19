<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class ApiPostController extends Controller
{

    public function showList(Request $req)
    {
        $posts = Post::all();
        if(!empty($posts)){
            return json_encode(['post'=>$posts, 'status'=>'ok']);
        }

        return json_encode(['post'=>null, 'status'=>'faild']);

    }
    
    public function showDataForm(Request $request)
    {
        try{
            $categories = Category::all();
            $post = Post::find($request->id);
            return json_encode(['post'=>$post, 'category'=>$categories, 'status'=>'ok']);
        }catch(\ErrorException $e){
            return json_encode(['status'=>'faild', 'message'=>$e->getMessage()]);
        }
    }

    public function create(Request $request)
    {
        try{
            Post::create([
                'category_id' => $request->category,
                'title' => $request->title,
                'summary'=>$request->summary,
                'image' => '',
                'description' => $request->description,
                'author'=> $request->author
            ]);
            return json_encode(['status'=>'ok']);

        }catch(\ErrorException $e){
            return json_encode(['status'=>'faild', 'message'=>$e->getMessage()]);
        }
    }

    public function update(Request $request)
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
            return json_encode(['status'=>'ok']);
        }
        return json_encode(['status'=>'faild']);
    }

    public function delete(Request $request)
    {
        try{
            Post::find($request->id)->delete();
            return json_encode(['status'=>'ok']);
        }catch(\ErrorException $e){
            return json_encode(['status'=>'faild', 'message'=>$e->getMessage()]);
        }
    }
}

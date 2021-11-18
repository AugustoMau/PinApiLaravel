<?php

namespace App\Http\Controllers;
//use App\Models\Post; //referenciamos el model de post, se vincula el modelo de post con el controlador
use App\Models\NewUser;
use Illuminate\Http\Request;
use App\Mail\SendData;

class NewUserController extends Controller
{
    public function createusuario(Request $request)
    {
        try{
            $name = "no viene" ;
           if (isset($request->name) && $request->name !=null ){
              $name= $request->name;
           }

           $email = uniqid() . '@gmail.com';
           if (isset($request->email) && $request->email != null ){
              $email= $request->email;
           }

           $phone = "no viene phone" ;
           if (isset($request->phone) && $request->phone != null ){
              $phone= $request->phone;
           }

           $message = "no viene message" ;
           if (isset($request->message) && $request->message != null ){
              $message= $request->message;
           }

          Usuario::create([
              'name' =>  $name,
              'email'=> $email,
              'phone' => $phone,
              'message' => $message
          ]); 

           $details = [
              'title' => 'Post title: ' . $name, //$request->title,
              'body' => $request-> $message //description
          ];
          \Mail::to('your_receiver_email@gmail.com')->send(new \App\Mail\sendPost($details)); 

          return json_encode(['status'=>'ok']);

       }catch(\ErrorException $e){
          return json_encode(['status'=>'faild', 'message'=>$e->getMessage()]);
      } 
  }
}
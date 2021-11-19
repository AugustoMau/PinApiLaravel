<?php

namespace App\Http\Controllers;
//use App\Models\Post; //referenciamos el model de post, se vincula el modelo de post con el controlador
use App\Models\NewUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class NewUserController extends Controller
{
   public function createusuario (Request $request){

      $validator =  Validator::make($request->all(),[
      'name'=>'required|max:191',
      'email'=>'required|email|max:191',
      'phone'=>'required|max:8|min:8',
      'message'=>'required|max:191'
      ]);
      if($validator->fails()){
          return response()->json([
              'validate_err'=>$validator->messages(),
          ]);
      }else{

      
      $contact = new Contact;
      $contact->name = $request->input('name');
      $contact->email = $request->input('email');
      $contact->phone = $request->input('phone');
      $contact->message = $request->input('message');
      $contact->save();

      return response()->json([
          'status'=>200,
          'message'=>'Contact Added Successfully',
      ]);
      }
  }
  
}
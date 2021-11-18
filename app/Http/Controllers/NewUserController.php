<?php

namespace App\Http\Controllers;
//use App\Models\Post; //referenciamos el model de post, se vincula el modelo de post con el controlador
use App\Models\NewUser;
use Illuminate\Http\Request;
use App\Mail\SendData;

class NewUserController extends Controller
{
    public function usuarionuevo(Request $request)
    {
        try {
            if($request->email) {

                NewUser::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'message' => $request->message
                ]);
                $details = [
                    'title' => 'Nombre: '. $request->name, 
                    'body' => 'Email: '. $request->email,
                    'section' => 'Mensaje: '. $request->message,
                  
                     
                ];

               // Mail::to("augustomauro.cba@gmail.com")->send(new SendData($details));

                //return json_encode(['status' => 'ok']);
                return $request;
            }
            
            //return $request; //return json_encode($request);

        } catch (\ErrorException $e) {
            return json_encode(['status' => 'faild', 'message' => $e->getMessage()]);
        }
    }

}

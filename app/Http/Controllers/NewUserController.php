<?php

namespace App\Http\Controllers;
//use App\Models\Post; //referenciamos el model de post, se vincula el modelo de post con el controlador
use App\Models\NewUser;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function saveUsuarios(Request $request)
    {
        try {
            if($request->email) {

                Usuarios::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'message' => $request->message
                ]);

                //return json_encode(['status' => 'ok']);
                return $request;
            }
            
            //return $request; //return json_encode($request);

        } catch (\ErrorException $e) {
            return json_encode(['status' => 'faild', 'message' => $e->getMessage()]);
        }
    }

}

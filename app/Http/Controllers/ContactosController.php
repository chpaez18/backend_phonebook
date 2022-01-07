<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto;

class ContactosController extends Controller{

    /* GET */
    public function index($id = false){

        try{
            //verificamos si se envio el parametro id
            if($id){
                $table_data = Contacto::find($id);
            }else{
                $table_data = Contacto::all();
            }
            

        }catch(\Exception $e) {            
            return response()->json(['errorCode' => 500, 'errorMessage' => $e->getMessage()], 500);
        }
            return response()->json($table_data, 200);
    }

    /* POST */
    public function store(Request $request){

        try{
            $model = new Contacto();
            $model->nombres = $request->input('nombres');
            $model->apellidos = $request->input('apellidos');
            $model->correo = $request->input('correo');
            $model->telefono_celular = $request->input('telefono_celular');
            $model->telefono_habitacion = $request->input('telefono_habitacion');
            $model->save();

        }catch(\Exception $e) {            
            return response()->json(['errorCode' => 500, 'errorMessage' => $e->getMessage()], 500);
        }
            return response()->json(['success' =>  true], 200);
    }

    /* PUT */
    public function update(Request $request, $id){

        //header('Access-Control-Allow-Origin: *');

        try{
            $model = Contacto::find($id);
            if($model){
                $model->update($request->all());
            }else{
                return response()->json(['errorCode' => 500, 'errorMessage' => 'El contacto no existe'], 500);
            } 

        }catch(\Exception $e) {            
            return response()->json(['errorCode' => 500, 'errorMessage' => $e->getMessage()], 500);
        }
            return response()->json(['success' =>  true], 200);
    }

    /* DELETE */
    public function destroy(Request $request, $id){

        try{
            Contacto::destroy($id);
        }catch(\Exception $e) {            
            return response()->json(['errorCode' => 500, 'errorMessage' => $e->getMessage()], 500);
        }
            return response()->json(['success' =>  true], 200);
    }

}
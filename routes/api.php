<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\User;
use App\Productos;
use App\Http\Controllers\ProductoController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('Login/', function (Request $request) {

    $usuario = $request['usuario'];
    $clave = md5($request['clave']);
        $consulta = User::where('usuario',$usuario)->where('password',$clave)->where('estado','1')->get()->first();
        
        if($consulta){
            $consulta->token = $consulta->password.date("YmdHis");

            $consulta->save();
            return array('Msj'=>'Bienvenido','token'=>$consulta->token);
        }else{
            return array('Msj'=>'Usuario o contraseña incorrecta','State'=>false,'u'=>$usuario); 
        }
        
});

Route::get('Productos', function (Request $request) {
    //$AUT = $request->header('Authorization');
    
    //$consulta = User::where('token',$AUT)->get();
    //if($consulta->count()==0){
    //    return 'No tienes acceso a estos datos';
    //}

    $result= Productos::paginate(10);
    if($result){
        return $result;
    }else{
        return 'No hay datos';
    }
});

Route::get('Productos/{id}', function (Request $request, $id) {
    $AUT = $request->header('Authorization');
    $consulta = User::where('token',$AUT)->get();
    if($consulta->count()==0){
        return 'No tienes acceso a estos datos';
    }

    $result= Productos::find($id);
    if($result){
        return $result;
    }else{
        return 'No hay datos';
    }
     
});
Route::apiResources([
    'Verproductos' => ProductoController::class
]);
<?php

namespace App\Http\Controllers;

use App\Productos;
use Illuminate\Http\Request;

/**
 * Class CargoController
 * @package App\Http\Controllers
 */
/**
* @OA\Info(title="API Productos", version="1.0")
*
* @OA\Server(url="http://127.0.0.1:8000")
*/
class ProductoController extends Controller
{

  /**
    * @OA\Get(
    *     path="/api/Productos",
    *     summary="Mostrar productos",
    *     @OA\Response(
    *         response=200,
    *         description="Mostrar todos los productos."
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="Ha ocurrido un error."
    *     )
    * )
     * @OA\Get(
    *     path="/api/Productos/{id}",
    *     summary="Mostrar productos en especifico",
    *     @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="id del producto",
     *         required=false,
     *         @OA\Schema(type="number")
     *     ),
    *     @OA\Response(
    *     
    *         response=200,
    *         description="Mostrar un producto seleccionado."
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="Ha ocurrido un error."
    *     )
    * )
    */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Productos::paginate();

        return $productos;
    }

    public function show($id)
    {
        $producto = Productos::find($id);

        return response($producto);
    }

    public function destroy($id)
    {
       
    }
   
    public function store(Request $request)
    {
  
        
        
    }
    public function update(Request $request,$id)
    {
       
    }
   
}

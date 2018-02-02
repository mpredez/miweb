<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\productos;
use App\Http\Requests;

class ProductosController extends Controller
{

  public function index()
  {

    $productos = productos::get();
    return view('productos.index')->with('productos',$productos);


  }

	  /**
	 * Muestra la moneda seleccionada por id.
	 * @param $IdCurrency 
	 * @return Response
	 */

   public function show($IdCurrency)
   {
	  // Devuelve la moneda seleccionada por id.
	  $productos = productos::find($id_producto);
	  return view('productos.show')->with('productos',$productos);

   }


   public function create()
   {
        return view('productos.create');
   }

    public function store(Request $request)
    {
    	

    
        $producto = new productos();

        $producto->nombre = $request->input('nombre');
        $producto->tipo  = $request->input('tipo');

      
        $producto->save();

        return redirect()->route('productos.create');
    }
}

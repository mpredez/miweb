<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\detalle;
use App\productos;
use App\Http\Requests;

class ComprasController extends Controller
{
    //


  public function index()
  {
    // Devolverá todas las monedas
   // $monedas = detalle::get();
   //$monedas = CbCurrency::select('*')->get();
   //$monedas=CbCurrency::where('currency','Euro')->get(); ///Where
  	      
   // $monedas = CbCurrency::select('SELECT * FROM [MIWEB].[dbo].[cb_currency]');
     
   /* $monedas =
        detalle::join('productos',function($join){
            $join->on('detalle.id_producto','=','productos.id_producto');
        })->select('*')->get();// Hay problemas al intentar comparar un bolean por eso se recomiendo utilizar < > */

        $monedas = detalle::join("compra","detalle.id_compra","=","compra.id_compra")->join('productos','detalle.id_producto','productos.id_producto')->get();

      
    /*$producto = new productos();
    $producto->nombre = 'Tomate';
    $producto->tipo = 'Verduleria';
    $producto->save();*/
    return view('compras.index')->with('monedas',$monedas);
  }

	  /**
	 * Muestra la moneda seleccionada por id.
	 * @param $IdCurrency 
	 * @return Response
	 */



	
    

	public function show($IdCurrency)
	{
	  // Devuelve la moneda seleccionada por id.
	  $moneda = CbCurrency::find($IdCurrency);
	  return view('monedas.show')->with('moneda',$moneda);
	}


   public function create()
   {
        return view('compras.create');
   }

 public function store(Request $request)
    {
        $producto = new productos();
        $producto->nombre = $request->input('nombre');
        $producto->tipo  = $request->input('tipo');

        $producto->save();

        return redirect()->route('compras.index');
    }


}

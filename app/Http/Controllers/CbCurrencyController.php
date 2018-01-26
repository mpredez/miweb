<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CbCurrency;
use App\Http\Requests;

class CbCurrencyController extends Controller
{
 
  public function index()
  {
    // Devolverá todas las monedas
   // $monedas = CbCurrency::get();
  	//$monedas = CbCurrency::select('*')->get();
  	$monedas=CbCurrency::where('currency','Euro')->get(); ///Where
  	
   // $monedas = CbCurrency::select('SELECT * FROM [MIWEB].[dbo].[cb_currency]');
    return view('monedas.index')->with('monedas',$monedas);
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

}

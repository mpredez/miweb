<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\detalle;
use App\productos;
use App\compra;
use App\Http\Requests;


class ComprasController extends Controller
{


  public function index(Request $request)
  {
   		 // Devolverá todas las monedas
   		 // $monedas = detalle::get();
         //$monedas = CbCurrency::select('*')->get();
         //$monedas=CbCurrency::where('currency','Euro')->get(); ///Where
  	     /* $compras = detalle::join("compra","detalle.id_compra","=","compra.id_compra")->join('productos','detalle.id_producto','productos.id_producto')- >get();*/    
        $comprasDesc = '';
        $compraPersonalizada = '';

        if( $request->bcompra == 'Compra Del Dia' or is_null($request->bcompra)){
        	    
		       $pdo = \DB::connection()->getPdo();
		       $stmt = $pdo->prepare('exec dbo.CompraDia');
			   $out=$stmt->execute(); 
               $comprasDesc = 'Compras del Día';
			   if($out)
				   $compras = $stmt->fetchAll();

		        return view('compras.index')->with('compras',$compras)->with('comprasDesc',$comprasDesc)->with('compraPer',$compraPersonalizada);

   	   }
   	   else
       {
             if($request->bcompra == 'Compra Del Mes'){ 
             	$pdo = \DB::connection()->getPdo();
		        $stmt = $pdo->prepare('exec dbo.CompraMes');
				$out=$stmt->execute(); 
                $comprasDesc = 'Compras del Mes';
				if($out)
				   $compras = $stmt->fetchAll();

		        return view('compras.index')->with('compras',$compras)->with('comprasDesc',$comprasDesc)->with('compraPer',$compraPersonalizada);
		    }else{

                 if($request->bcompra == 'Compra Personalizada'){ 
                       

                       $fechaInicio = $request->fechaInicio;
                       $fechaFin = $request->fechaFin;


                       $compraPersonalizada = 'Personalizada';

                        if(is_null($fechaInicio) or is_null($fechaFin)){  

                        	     $comprasDesc = 'Compra Personalizada';

                                 return view('compras.index')->with('comprasDesc',$comprasDesc)->with('compraPer',$compraPersonalizada);
                        }else{  
                                
		                        $pdo = \DB::connection()->getPdo();
						        $stmt = $pdo->prepare('exec dbo.CompraPersonalizada ?,?');
						        $stmt->bindParam(1,$fechaInicio);
				                $stmt->bindParam(2,$fechaFin);
								$out=$stmt->execute(); 
				                $comprasDesc = 'Compra Personalizada';
				                $compraPersonalizada = '';

								if($out)
								   $compras = $stmt->fetchAll();

						     	 return view('compras.index')->with('compras',$compras)->with('comprasDesc',$comprasDesc)->with('compraPer',$compraPersonalizada);
						 } 

                 }


		    }
      }

      }
	  /**
	 * Muestra la moneda seleccionada por id.
	 * @param $IdCurrency 
	 * @return Response
	 */


	public function show($IdCurrency)
	{
	  // Devuelve la moneda seleccionada por id.
	  $compras = CbCurrency::find($id_compra);
	  return view('monedas.show')->with('moneda',$compras);
	}


    public function findTipo(Request $request)
	{
	  // Devuelve la moneda seleccionada por id.

		
	 // $productos = productos::find($tipos);
	 // return view('compras.create')->with('producto',$producto);
	}



   public function create(Request $request)
   {
     	
	   	   $productos = new productos();

	   	   $productos = productos::select('nombre')->where('tipo',$request->get('tipos'))->get();

	   	    $tipos = productos::select('tipo')->groupby('tipo')->get();
	        return view('compras.create')->with('tipos',$tipos)->with('productos',$productos);
        
   }

    public function store(Request $request)
    {
         $detalle = new detalle();
         $compra = new compra();
        
         //	$res = $stmt->query('select @out')->fetchAll();

        $descripcion = $request->descripcion;
        $fecha = $request->fecha;
        $producto = $request->producto;
        $precio = $request->precio;
        $cantidad = $request->cantidad;

       


		$pdo = \DB::connection()->getPdo();
        $stmt = $pdo->prepare('exec dbo.INSERTA_COMPRA ?,?,?,?,?');
		$stmt->bindParam(1,$descripcion);
		$stmt->bindParam(2,$fecha);
		$stmt->bindParam(3,$producto);
		$stmt->bindParam(4,$precio);
		$stmt->bindParam(5,$cantidad);
		$out=$stmt->execute();
		

	
		
		if($out){
			 $notificacion = array(
	            'message' => 'Gracias! Su Compra se inserto con exito!', 
	            'alert-type' => 'success');
		}else{

				$notificacion = array(
	            'message' => 'Error al intentar ingresar la compra !', 
	            'alert-type' => 'error');
			}

	

        
       // return view('compras.create')->with('prueba',$prueba)
        return redirect()->route('compras.create')->with($notificacion);
    }




}

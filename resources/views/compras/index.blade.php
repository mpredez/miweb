@extends('app')
@section('content')
<h1 class="text-primary">Compras Del Dia</h1>
 
<table class="table table-bordered" id="tableMonedas">
  <thead>
    <tr>
        <th class="text-center">Producto</th>
        <th class="text-center">Id producto</th>
        <th class="text-center">Id compra</th>
        <th class="text-center">Precio</th>
        <th class="text-center">Precio total</th>
        <th class="text-center">Cantidad</th>
        <th class="text-center">Fecha</th>
        <th class="text-center">Descripcion</th>
    </tr>
  </thead>
  <tbody>
    @foreach($monedas as $moneda)
        <tr>
            <td class="text-center">{{ $moneda->nombre}}</td>
            <td class="text-center">{{ $moneda->id_producto}}</td>
            <td class="text-center">{{ $moneda->id_compra}}</td>
            <td class="text-center">{{ $moneda->precio }}</td>
            <td class="text-center">{{ $moneda->precio_total}}</td>
             <td class="text-center">{{ $moneda->cantidad}}</td>
            <td class="text-center">{{ $moneda->fecha}}</td>
             <td class="text-center">{{ $moneda->descripcion}}</td>
            
        </tr>
    @endforeach
  </tbody>
  <tfoot>
    <tr>
        <th class="text-center">Producto</th>
        <th class="text-center">Id producto</th>
        <th class="text-center">Id compra</th>
        <th class="text-center">Precio</th>
        <th class="text-center">Precio total</th>
        <th class="text-center">Cantidad</th>
        <th class="text-center">Fecha</th>
        <th class="text-center">Descripcion</th>
    </tr>
  </tfoot>
</table>
@stop
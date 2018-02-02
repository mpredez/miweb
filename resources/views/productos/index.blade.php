@extends('app')
@section('content')
<br>
<h3 class="text-primary">Productos</h3>
<br>
 
<div class="table table-fixed" style=" width: 700px; height: 500px; overflow: scroll">
<table class="table table-fixed" >
  <thead>
    <tr>
        <th class="text-center">Id Producto</th>
        <th class="text-center">Nombre Producto</th>
        <th class="text-center">Tipo Producto</th>
 
    </tr>
  </thead>
  <tbody>
    @foreach($productos as $producto)
        <tr>
            <td class="text-center">{{ $producto->id_producto}}</td>
            <td class="text-center">{{ $producto->nombre}}</td>
            <td class="text-center">{{ $producto->tipo}}</td>
           
            
        </tr>
    @endforeach
  </tbody>
  
</table>
<div>
@stop
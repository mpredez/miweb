@extends('app')
@section('content')


<br>
<br>
<h3 class="text-primary">Registrar Producto</h3>
<br>

<form action="{{ route('productos.store') }}" method="POST">
	{{ csrf_field() }}

  <div class="form-group">
    <label for="nombre">Ingrese Nombre Producto</label>
    <input type="nombre" name="nombre" class="form-control" id="nombre">
  </div>
 
 
 <div class="form-group">
   
            <label for="nombre">Ingrese Tipo Producto</label>
            <select class="form-control" name="tipo">        
                         <option>Limpieza</option>
                         <option>Almacen</option>
                         <option>Carniceria</option>
                         <option>Perfumeria</option>
                         <option>Ferreteria</option>
                         <option>Verduleria</option>        
              
            </select>
 </div>

<button type="submit" class="btn btn-primary mb-2">Registrar Producto </button>
</form>


@stop
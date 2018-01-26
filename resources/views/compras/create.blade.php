@extends('app')
@section('content')


<form action="{{ route('compras.store') }}" method="POST">
  <div class="form-group">
    <label for="nombre">Ingrese Nombre Producto:</label>
    <input type="nombre" class="form-control" id="nombre">
  </div>
  <div class="form-group">
    <label for="tipo">Ingrese Tipo Producto:</label>
    <input type="tipo" class="form-control" id="tipo">
  </div>
 
  <button type="submit" class="btn btn-default">Registrar</button>
</form>


@stop


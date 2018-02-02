@extends('app')
@section('content')


   
<br>
<br>
<h3 class="text-primary">Ingrese Nueva Compra</h3>
<br>
<br>



<form class="form-inline" action="{{ route('compras.create') }}" method="GET">

{{ csrf_field() }}
   <div class="form-group">
            <select class="form-control" name="tipos">
                @foreach($tipos as $tipoProd)
                     <option>{{$tipoProd->tipo}}</option>
                @endforeach
            </select>
    </div> 


<button type="submit" class="btn btn-primary mb-2">Buscar Productos</button>
</form>

<br>


<form action="{{ route('compras.store') }}" method="POST">
	{{ csrf_field() }}

    

     <div class="form-group">
     	<br>
            <label for="nombre">Ingrese Nombre Producto</label>
            <select class="form-control" name="producto">
                @foreach($productos as $producto)
                 
                         <option>{{$producto->nombre}}</option>
                    
                @endforeach
            </select>
        </div>

  

  <div class="form-group">
    <label for="tipo">Ingrese Fecha</label>
   <input type="text" class="form-control datepicker" name="fecha">
  </div>

  <div class="form-group">
    <label for="tipo">Ingrese Precio</label>
    <input type="tipo" name="precio" class="form-control" id="precio">
  </div>

   <div class="form-group">
    <label for="tipo">Ingrese Cantidad</label>
    <input type="tipo" name="cantidad" class="form-control" id="cantidad">
  </div>


    <div class="form-group">
    <label for="tipo">Ingrese Descripción</label>
    <input type="tipo" name="descripcion" class="form-control" id="tipo">
  </div>
  <button type="submit" class="btn btn-primary mb-2">Registrar Compra</button>
 
</form>


 <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
    @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    @endif
    </script>

<script>
    $('.datepicker').datepicker({
        format: "yyyy/mm/dd",
        language: "es",
        autoclose: true
    });
</script>

@stop


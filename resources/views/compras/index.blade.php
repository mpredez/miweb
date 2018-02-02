@extends('app')
@section('content')





<br>

<h3 class="text-primary">{{$comprasDesc}}</h3>

 <div class="table table-fixed" style="height: 500px; overflow: scroll">
  <table class="table table-fixed" >
    <thead>
      <tr>
        <th class="text-center">Nro Compra</th>
        <th class="text-center">Producto</th>
        <th class="text-center">Precio</th>
        <th class="text-center">Cantidad</th>
        <th class="text-center">Fecha</th>
        <th class="text-center">Descripción</th>
        <th class="text-center">Precio Total Compra</th>
      </tr>
    </thead>
    <tbody style="height: 5px;">
      @if($compraPer != 'Personalizada')
         @foreach($compras as $compra)
            <tr>
                <td class="text-center">{{ $compra['id_compra']}}</td>
                <td class="text-center">{{ $compra['nombre']}}</td>
                <td class="text-center">{{ $compra['precio'] }}</td>
                <td class="text-center">{{ $compra['cantidad']}}</td>
                <td class="text-center">{{ $compra['fecha']}}</td>
                <td class="text-center">{{ $compra['descripcion']}}</td>    
                <td class="text-center">{{ $compra['Totales']}}</td>   
            </tr>
        @endforeach
    @endif
    </tbody>
  </table>
  </div>

<br>

  <form class="form-inline" action="{{ route('compras.index') }}" method="GET">

{{ csrf_field() }}
   <div class="form-group" style="width:180px;">
            <select class="form-control" name="bcompra" style="width:180px;">
                
                     <option >Compra Del Dia</option>
                     <option >Compra Del Mes</option>
                     <option >Compra Personalizada</option>
                
            </select>
    </div> 

@if($compraPer == 'Personalizada')
    <div class="form-group">
      <label for="tipo"></label>
     <input type="text" class="form-control datepicker" name="fechaInicio" placeholder="Fecha Inicio">
    </div>

     <div class="form-group">
      <label for="tipo"></label>
     <input type="text" class="form-control datepicker" name="fechaFin" placeholder="Fecha Fin">
    </div>
  
@endif

<button type="submit" class="btn btn-primary mb-2" style="width:155px;">Buscar</button>
</form>

<script>
    $('.datepicker').datepicker({
        format: "yyyy/mm/dd",
        language: "es",
        autoclose: true
    });
</script>


@stop
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detalle extends Model
{
    //
       protected $table='detalle';
 
  /**
    Por defecto Eloquent  asume que existe una clave primaria llamada id,
    si este no es nuesto caso lo tenemos que indicar en la variable $primaryKey
  */
  protected $primaryKey = 'id_detalle';
 
  // Denimos los campos de la tabla directamente en la variable de tipo array $fillable
  protected $fillable =  array('id_producto','id_compra','precio','precio_total','cantidad_peso');


}

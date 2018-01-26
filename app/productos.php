<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productos extends Model
{
    //
      protected $table='productos';
 
  /**
    Por defecto Eloquent  asume que existe una clave primaria llamada id,
    si este no es nuesto caso lo tenemos que indicar en la variable $primaryKey
  */
  protected $primaryKey = 'id_producto';
 
  // Denimos los campos de la tabla directamente en la variable de tipo array $fillable
  protected $fillable =  array('nombre','tipo');

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class compra extends Model
{
    //
    protected $table='compra';
 
  /**
    Por defecto Eloquent  asume que existe una clave primaria llamada id,
    si este no es nuesto caso lo tenemos que indicar en la variable $primaryKey
  */
  protected $primaryKey = 'id_compra';
 
  // Denimos los campos de la tabla directamente en la variable de tipo array $fillable
  protected $fillable =  array('total', 'fecha');


}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Productos extends Model
{
    
  protected $table = 'productoweb';
  protected $primaryKey = 'id';
  public $timestamps = false;


}
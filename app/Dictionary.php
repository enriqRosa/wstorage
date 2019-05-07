<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    protected $table = "dictionary";
    //campos que se puede traer de la tabla
    protected $fillable = ['nombre'];

}

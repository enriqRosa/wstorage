<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    protected $table = "storages";
    //campos que se puede traer de la tabla
    protected $fillable = ['ruta_local','ruta_servidor','tamano','user_id'];

    //relación 1:1
    public function user()
    {
        return $this->hasOne('App\Users');
    }
}

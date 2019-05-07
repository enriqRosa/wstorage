<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    protected $table = "licenses";
    //campos que se puede traer de la tabla
    protected $fillable = ['modelo','tipo','tiempo','status','fecha_inicio','fecha_fin','tamano_total','licencia_total','tamano_restante','licencia_restante'];

    //relación de 1:1
    public function company()
    {
        return $this->hasOne('App\Company');
    }
}

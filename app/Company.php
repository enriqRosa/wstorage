<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = "companies";
    //campos que se puede traer de la tabla
    protected $fillable = ['nombre','alias','rfc','telefono','direccion','logo','licence_id'];

    //relación 1:1
    public function license()
    {
        return $this->belongsTo('App\License');
    }

    //relación 1:N
    public function contacts()
    {
        return $this->hasMany('App\Contact');
    }

    //relación 1:N
    public function users()
    {
        return $this->hasMany('App\User');
    }
}

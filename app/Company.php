<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = "companies";
    //campos que se puede traer de la tabla
    protected $fillable = ['nombre','alias','rfc','direccion','logo','licence_id'];

    //relación 1:1
    public function license()
    {
        return $this->belongsTo('App\License');
    }

    //relación 1:N
    public function contacts()
    {
        return $this->hasMany('App\Contacts');
    }

    //relación 1:N
    public function users()
    {
        return $this->hasMany('App\Users');
    }

    //relación de 1:N
    public function dictionaries()
    {
        return $this->hasMany('App\Dictionary');
    }
}

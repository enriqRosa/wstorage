<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = "contacts";
    //campos que se puede traer de la tabla
    protected $fillable = ['nombre','apellidos','email','telefono','ocupacion','company_id'];

    //relación de N:1
    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}

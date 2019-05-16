<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //
    //relación N:1
    public function company()
    {
     return $this->belongsTo('App\Company');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyLicense extends Model
{
    protected $table = "company_license";
    //campos que se puede traer de la tabla
    protected $fillable = ['license_id'];
}

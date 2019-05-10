<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCatalog extends Model
{
    protected $table = "users_catalog";
    protected $fillable = ['cantidad'];
}

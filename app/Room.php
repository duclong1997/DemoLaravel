<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    // create connect Class model -> name table
    protected $table ="room";

    protected $fillable = ['nameroom','value','gender','price','id_type'];

}

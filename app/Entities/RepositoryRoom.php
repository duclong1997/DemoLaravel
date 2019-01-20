<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class RepositoryRoom.
 *
 * @package namespace App\Entities;
 */
class RepositoryRoom extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // create connect Class model -> name table
    protected $table ="room";

    protected $fillable = ['nameroom','value','gender','price','id_type'];

}

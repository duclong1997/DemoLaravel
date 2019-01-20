<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\RepositoryRoomRepository;
use App\Entities\RepositoryRoom;
use App\Validators\RepositoryRoomValidator;

/**
 * Class RepositoryRoomRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class RepositoryRoomRepositoryEloquent extends BaseRepository implements RepositoryRoomRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return RepositoryRoom::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return RepositoryRoomValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}

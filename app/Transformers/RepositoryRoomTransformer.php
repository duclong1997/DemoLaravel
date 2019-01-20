<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\RepositoryRoom;

/**
 * Class RepositoryRoomTransformer.
 *
 * @package namespace App\Transformers;
 */
class RepositoryRoomTransformer extends TransformerAbstract
{
    /**
     * Transform the RepositoryRoom entity.
     *
     * @param \App\Entities\RepositoryRoom $model
     *
     * @return array
     */
    public function transform(RepositoryRoom $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

<?php

namespace App\Presenters;

use App\Transformers\RepositoryRoomTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class RepositoryRoomPresenter.
 *
 * @package namespace App\Presenters;
 */
class RepositoryRoomPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new RepositoryRoomTransformer();
    }
}

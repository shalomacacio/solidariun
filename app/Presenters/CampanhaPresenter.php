<?php

namespace Solidariun\Presenters;

use Solidariun\Transformers\CampanhaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CampanhaPresenter.
 *
 * @package namespace Solidariun\Presenters;
 */
class CampanhaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CampanhaTransformer();
    }
}

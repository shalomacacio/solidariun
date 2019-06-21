<?php

namespace Solidariun\Presenters;

use Solidariun\Transformers\PaymentTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PaymentPresenter.
 *
 * @package namespace Solidariun\Presenters;
 */
class PaymentPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PaymentTransformer();
    }
}

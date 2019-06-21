<?php

namespace Solidariun\Transformers;

use League\Fractal\TransformerAbstract;
use Solidariun\Entities\Payment;

/**
 * Class PaymentTransformer.
 *
 * @package namespace Solidariun\Transformers;
 */
class PaymentTransformer extends TransformerAbstract
{
    /**
     * Transform the Payment entity.
     *
     * @param \Solidariun\Entities\Payment $model
     *
     * @return array
     */
    public function transform(Payment $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

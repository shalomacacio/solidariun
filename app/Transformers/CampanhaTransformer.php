<?php

namespace Solidariun\Transformers;

use League\Fractal\TransformerAbstract;
use Solidariun\Entities\Campanha;

/**
 * Class CampanhaTransformer.
 *
 * @package namespace Solidariun\Transformers;
 */
class CampanhaTransformer extends TransformerAbstract
{
    /**
     * Transform the Campanha entity.
     *
     * @param \Solidariun\Entities\Campanha $model
     *
     * @return array
     */
    public function transform(Campanha $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */
            'percentual' => percent($model),
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];

    }
}

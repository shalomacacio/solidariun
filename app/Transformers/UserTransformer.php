<?php

namespace Solidariun\Transformers;

use League\Fractal\TransformerAbstract;
use Solidariun\Entities\User;

/**
 * Class UserTransformer.
 *
 * @package namespace Solidariun\Transformers;
 */
class UserTransformer extends TransformerAbstract
{
    /**
     * Transform the User entity.
     *
     * @param \Solidariun\Entities\User $model
     *
     * @return array
     */
    public function transform(User $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

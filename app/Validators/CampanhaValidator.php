<?php

namespace Solidariun\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class CampanhaValidator.
 *
 * @package namespace Solidariun\Validators;
 */
class CampanhaValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            // 'img' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
        ],
        ValidatorInterface::RULE_UPDATE => [],
    ];
}

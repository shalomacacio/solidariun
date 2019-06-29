<?php

namespace Solidariun\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Support\Str;

/**
 * Class Payment.
 *
 * @package namespace Solidariun\Entities;
 */
class Payment extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'campanha_id',
        'code',
        'status',
        'payment_link',
        'payment_method',
        'item_amount',

		'sender_name',
        'sender_phone',
        'sender_email',
        'sender_cpf',
    ];

}

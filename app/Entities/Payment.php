<?php

namespace Solidariun\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

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
		'senderName',
        'senderPhone',
        'senderEmail',
        'senderHash',
        'senderCPF',
        'creditCardHolderName',
        'creditCardHolderPhone',
        'creditCardHolderCPF',
        'creditCardHolderBirthDate',
        'shippingAddressStreet',
        'shippingAddressNumber',
        'shippingAddressDistrict',
        'shippingAddressPostalCode',
        'shippingAddressCity',
        'shippingAddressState',
        'itemId',
        'itemDescription',
        'itemAmount',
        'itemQuantity',
        'paymentMethod',
        'creditCardToken',
        'installmentQuantity',
        'installmentValue'
	];

}

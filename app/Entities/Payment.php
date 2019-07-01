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
        'sender_hash',
        'creditcard_token',

        'creditcard_holderbirthdate',
        'shippigaddress_street',
        'shippigaddress_number',
        'shippigaddress_district',
        'shippigaddress_postalcode',
        'shippigaddress_city',
        'shippigaddress_state',

    ];
    //mutators
    public function setItemAmountAttribute($value) {
        $valor = str_replace("." , "" , $value ); // Primeiro tira os pontos
        $valor = str_replace("," , "." , $value); // Substitui a virgular por ponto
        return $this->attributes['item_amount'] = number_format($valor,2,".","");
    }


    //relationships
    public function campanha()
    {
        return $this->belongsTo('Solidariun\Entities\Campanha');
    }

    //casts
    // protected $casts = [
    //     'item_amount' => 'decimal',
    // ];

}

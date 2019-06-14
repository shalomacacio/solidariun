<?php

namespace Solidariun\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Campanha.
 *
 * @package namespace Solidariun\Entities;
 */
class Campanha extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'desctiption',
        'goal',
        'reached',
        'dt_final',
        'img',
        'movie',
        'flg_active',
        'category_id',
        'user_id'
    ];

}

<?php

namespace Solidariun\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Support\Str;
use Carbon\Carbon;

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
        'description',
        'goal',
        'reached',
        'dt_final',
        'img',
        'movie',
        'flg_active',
        'category_id',
        'user_id',
        'created_at'
    ];

    public function getDescriptionShortAttribute()
    {
        return Str::limit($this->description, 120);
    }

    public function getFormattedGoalAttribute()
    {
        return $this->attributes['goal'] = number_format($this->goal, 2);
    }

    public function getPercentAttribute()
    {
        return (100/$this->goal ) * $this->reached;
    }

    public function getTempoAttribute()
    {
        $dataFinal = Carbon::createFromFormat('Y-m-d H:i:s', $this->dt_final );
        $tempo = $dataFinal->diffInDays(Carbon::now());
        if($tempo <= 0){
            $tempo = $dataFinal->diffInHours(Carbon::now());
            return "Faltam:".$tempo." horas";
        }
        return "Faltam:".$tempo." dias";
    }

    // protected $casts = [
    //     'goal' => 'decimal:2',
    // ];


}

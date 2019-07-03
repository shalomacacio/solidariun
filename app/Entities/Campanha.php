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

    // caso queira usar titulo como chave primária
    // public function getTitletAttribute()
    // {
    //     return Str::slug($this->title, '-');
    // }

    public function getDescriptionShortAttribute()
    {
        return Str::limit($this->description, 120);
    }

    public function getMetaAttribute()
    {
        $value = $this->attributes['goal'];
        $result = number_format($value,2, ',','.');
         return $result;
    }

    public function getArrecadadoAttribute()
    {
        $result = $this->payments->where('status','3')->sum('item_amount');
         return number_format($result,2, ',','.');
    }

        public function getReachedAttribute()
    {
        $result = $this->payments->where('status','3')->sum('item_amount');
         return $result;
    }

    public function setGoalAttribute($value) {
        $result = Str::replaceArray('.', [''], $value );
        $this->attributes['goal'] = Str::replaceArray(',',['.'], $result);
    }

    public function getPercentAttribute()
    {
        $result = (100/$this->goal ) * $this->reached;
        return number_format($result,1);
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

    protected $casts = [
        'goal' => 'float',
    ];

    //relationships
    public function payments(){
        return $this->hasMany('Solidariun\Entities\Payment', 'campanha_id');
    }

}

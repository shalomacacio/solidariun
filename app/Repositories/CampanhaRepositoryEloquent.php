<?php

namespace Solidariun\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Solidariun\Repositories\CampanhaRepository;
use Solidariun\Entities\Campanha;
use Solidariun\Validators\CampanhaValidator;

/**
 * Class CampanhaRepositoryEloquent.
 *
 * @package namespace Solidariun\Repositories;
 */
class CampanhaRepositoryEloquent extends BaseRepository implements CampanhaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Campanha::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return CampanhaValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}

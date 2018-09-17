<?php

namespace App\Repositories;

use App\Modelos;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ModelosRepository
 * @package App\Repositories
 * @version July 9, 2018, 11:50 am UTC
 *
 * @method Modelos findWithoutFail($id, $columns = ['*'])
 * @method Modelos find($id, $columns = ['*'])
 * @method Modelos first($columns = ['*'])
*/
class ModelosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'marca'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Modelos::class;
    }
}

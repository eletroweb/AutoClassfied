<?php

namespace App\Repositories;

use App\Marca;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MarcaRepository
 * @package App\Repositories
 * @version July 9, 2018, 1:13 am UTC
 *
 * @method Marca findWithoutFail($id, $columns = ['*'])
 * @method Marca find($id, $columns = ['*'])
 * @method Marca first($columns = ['*'])
*/
class MarcaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Marca::class;
    }
}

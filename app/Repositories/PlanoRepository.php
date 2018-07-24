<?php

namespace App\Repositories;

use App\Plano;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PlanoRepository
 * @package App\Repositories
 * @version July 24, 2018, 2:07 am UTC
 *
 * @method Plano findWithoutFail($id, $columns = ['*'])
 * @method Plano find($id, $columns = ['*'])
 * @method Plano first($columns = ['*'])
*/
class PlanoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'descricao',
        'anuncios',
        'preco'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Plano::class;
    }
}

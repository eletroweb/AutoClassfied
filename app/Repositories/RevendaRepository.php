<?php

namespace App\Repositories;

use App\Revenda;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RevendaRepository
 * @package App\Repositories
 * @version August 24, 2018, 1:02 pm UTC
 *
 * @method Revenda findWithoutFail($id, $columns = ['*'])
 * @method Revenda find($id, $columns = ['*'])
 * @method Revenda first($columns = ['*'])
*/
class RevendaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'razaosocial',
        'nomefantasia',
        'cnpj',
        'user',
        'ativo',
        'endereco',
        'destaques'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Revenda::class;
    }
}

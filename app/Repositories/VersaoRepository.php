<?php

namespace App\Repositories;

use App\Versao;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class VersaoRepository
 * @package App\Repositories
 * @version July 9, 2018, 11:56 am UTC
 *
 * @method Versao findWithoutFail($id, $columns = ['*'])
 * @method Versao find($id, $columns = ['*'])
 * @method Versao first($columns = ['*'])
*/
class VersaoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'modelo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Versao::class;
    }
}

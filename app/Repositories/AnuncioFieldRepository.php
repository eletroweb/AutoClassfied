<?php

namespace App\Repositories;

use App\AnuncioField;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AnuncioFieldRepository
 * @package App\Repositories
 * @version July 10, 2018, 12:34 pm UTC
 *
 * @method AnuncioField findWithoutFail($id, $columns = ['*'])
 * @method AnuncioField find($id, $columns = ['*'])
 * @method AnuncioField first($columns = ['*'])
*/
class AnuncioFieldRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'meta_nome',
        'type',
        'place_holder',
        'step',
        'helpText'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AnuncioField::class;
    }
}

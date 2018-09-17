<?php

namespace App\Repositories;

use App\Models\NewsletterUser;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class NewsletterUserRepository
 * @package App\Repositories
 * @version August 28, 2018, 3:53 pm UTC
 *
 * @method NewsletterUser findWithoutFail($id, $columns = ['*'])
 * @method NewsletterUser find($id, $columns = ['*'])
 * @method NewsletterUser first($columns = ['*'])
*/
class NewsletterUserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'email',
        'nome'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return NewsletterUser::class;
    }
}

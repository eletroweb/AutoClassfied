<?php

namespace App\Repositories;

use App\Models\TransactionItem;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TransactionItemRepository
 * @package App\Repositories
 * @version September 13, 2018, 5:08 pm UTC
 *
 * @method TransactionItem findWithoutFail($id, $columns = ['*'])
 * @method TransactionItem find($id, $columns = ['*'])
 * @method TransactionItem first($columns = ['*'])
*/
class TransactionItemRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'pagseguro_id',
        'description',
        'quantity',
        'amount',
        'transaction_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TransactionItem::class;
    }
}

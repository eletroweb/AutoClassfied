<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model
{
    protected $fillable = ['pagseguro_id', 'description', 'quantity', 'amount', 'transaction_id'];
  
    public function transaction()
    {
        return $this->belongsTo('App\Transaction');
    }
}

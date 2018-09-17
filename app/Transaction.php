<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['code', 'date', 'type', 'status', 'lasteventdate', 'grossamount', 'netamount', 'feeamount',
                           'extraamount', 'discountamount', 'installmentcount', 'itemcount', 'payment_code', 'payment_type'];

    public function items(){
        return $this->hasMany('App\TransactionItem');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['code', 'date', 'type', 'status', 'lasteventdate', 'grossamount', 'netamount', 'feeamount',
                           'extraamount', 'discountamount', 'installmentcount', 'itemcount', 'payment_code', 'payment_type',
                           'paymentLink'];
  
    public static $status_pagseguro = [
      '1' => 'Aguardando pagamento',
      '2' => 'Em análise',
      '3' => 'Paga',
      '4' => 'Disponível',
      '5' => 'Em disputa',
      '6' => 'Devolvida',
      '7' => 'Cancelada'
    ];
  
    public static $bandeiras= [
      '101'=>	'Crédito Visa',
      '102'=>	'Crédito MasterCard',
      '103'=>	'Crédito American Express',
      '104'=>	'Crédito Diners',
      '105'=>	'Crédito Hipercard',
      '106'=>	'Crédito Aura',
      '107'=>	'Crédito Elo',
      '108'=>	'Crédito PLENOCard',
      '109'=>	'Crédito PersonalCard',
      '110'=>	'Crédito JCB',
      '111'=>	'Crédito Discover',
      '112'=>	'Crédito BrasilCard',
      '113'=>	'Crédito FORTBRASIL',
      '114'=>	'Crédito CARDBAN',
      '115'=>	'Crédito VALECARD',
      '116'=>	'Crédito Cabal',
      '117'=>	'Crédito Mais!',
      '118'=>	'Crédito Avista',
      '119'=>	'Crédito GRANDCARD',
      '120'=>	'Crédito Sorocred',
      '122'=>	'Crédito Up Policard',
      '123'=>	'Crédito Banese Card',
      '201'=>	'Boleto Bradesco',
      '202'=>	'Boleto Santander',
      '301'=>	'Débito online Bradesco',
      '302'=>	'Débito online Itaú',
      '303'=>	'Débito online Unibanco',
      '304'=>	'Débito online Banco do Brasil',
      '305'=>	'Débito online Banco Real',
      '306'=>	'Débito online Banrisul',
      '307'=>	'Débito online HSBC',
      '401'=>	'Saldo PagSeguro',
      '501'=>	'Oi Paggo. *',
      '701'=>	'Depósito em conta - Banco do Brasil',
      '801'=> 'Visa Electron',
      '802'=> 'Maestro',
      '803'=> 'Elo Débito',
    ];

    public function items(){
        return $this->hasMany('App\TransactionItem');
    }
}

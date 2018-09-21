<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Repositories\TransactionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Transaction;
use App\TransactionItem;

class TransactionController extends AppBaseController
{
    /** @var  TransactionRepository */
    private $transactionRepository;

    public function __construct(TransactionRepository $transactionRepo)
    {
        $this->transactionRepository = $transactionRepo;
    }

    /**
     * Display a listing of the Transaction.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->transactionRepository->pushCriteria(new RequestCriteria($request));
        $transactions = $this->transactionRepository->all();

        return view('transactions.index')
            ->with('transactions', $transactions);
    }

    /**
     * Show the form for creating a new Transaction.
     *
     * @return Response
     */
    public function create()
    {
        return view('transactions.create');
    }

    /**
     * Store a newly created Transaction in storage.
     *
     * @param CreateTransactionRequest $request
     *
     * @return Response
     */
    public function store(CreateTransactionRequest $request)
    {
        $input = $request->all();

        $transaction = $this->transactionRepository->create($input);

        Flash::success('Transaction saved successfully.');

        return redirect(route('transactions.index'));
    }

    /**
     * Display the specified Transaction.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $transaction = $this->transactionRepository->findWithoutFail($id);

        if (empty($transaction)) {
            Flash::error('Transaction not found');

            return redirect(route('transactions.index'));
        }

        return view('transactions.show')->with('transaction', $transaction);
    }

    /**
     * Show the form for editing the specified Transaction.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $transaction = $this->transactionRepository->findWithoutFail($id);

        if (empty($transaction)) {
            Flash::error('Transaction not found');

            return redirect(route('transactions.index'));
        }

        return view('transactions.edit')->with('transaction', $transaction);
    }

    /**
     * Update the specified Transaction in storage.
     *
     * @param  int              $id
     * @param UpdateTransactionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransactionRequest $request)
    {
        $transaction = $this->transactionRepository->findWithoutFail($id);

        if (empty($transaction)) {
            Flash::error('Transaction not found');

            return redirect(route('transactions.index'));
        }

        $transaction = $this->transactionRepository->update($request->all(), $id);

        Flash::success('Transaction updated successfully.');

        return redirect(route('transactions.index'));
    }

    /**
     * Remove the specified Transaction from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $transaction = $this->transactionRepository->findWithoutFail($id);

        if (empty($transaction)) {
            Flash::error('Transaction not found');

            return redirect(route('transactions.index'));
        }

        $this->transactionRepository->delete($id);

        Flash::success('Transaction deleted successfully.');

        return redirect(route('transactions.index'));
    }

    public function transactionNotification(Request $request){
      //Função pra ser feita...
    }

    public static function transactionFromXml($xml){
      $data['payment_type'] = (string)$xml->paymentMethod->type;
      $data['payment_code'] = (string)$xml->paymentMethod->code;
      $data['code'] = (string)$xml->code;
      $data['date'] = (string)$xml->date;
      $data['type'] = (string)$xml->type;
      $data['status'] = (string)$xml->status;
      $data['lasteventdate'] = (string)$xml->lastEventDate;
      $data['grossamount'] = (string)$xml->grossAmount;
      $data['netamount'] = (string)$xml->netAmount;
      $data['feeamount'] = (string)$xml->feeAmount;
      $data['extraamount'] = (string)$xml->extraAmount;
      $data['discountamount'] = (string)$xml->discountAmount;
      $data['installmentcount'] = (string)$xml->installmentCount;
      $data['itemcount'] = (string)$xml->itemCount;
      $data['paymentLink'] = (string)$xml->paymentLink;
      $transaction = Transaction::create($data);
      if($xml->items){
        foreach ($xml->items->item as $item){
          $i = array();
          $i['pagseguro_id'] = (string)$item->id;
          $i['description'] = (string)$item->description;
          $i['transaction_id'] = $transaction->id;
          $i['quantity'] = (string)$item->quantity;
          $i['amount'] = (string)$item->amount;
          TransactionItem::create($i);
        }
      }
      return $transaction;
    }
}

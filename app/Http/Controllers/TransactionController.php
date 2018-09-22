<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Repositories\TransactionRepository;
use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\PagseguroController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Transaction;
use App\TransactionItem;
use App\Notification;

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
      $notification = Notification::where('notificationCode', $request->input('notificationCode'))->first();
      if(!$notification){
        $notification = new Notification();
        $notification->notificationCode = $request->input('notificationCode');
        $notification->notificationType = $request->input('notificationType');
        $notification->save();
      }
      $notification->save();
      $xml = PagseguroController::getTransactionFromNotification($notification);
      $this::transactionFromXml($xml);
    }

    public static function transactionFromXml($xml){
      $transaction = Transaction::where('code', (string)$xml->code)->first();
      $transaction = $transaction?$transaction:new Transaction();
      $transaction->payment_type = (string)$xml->paymentMethod->type;
      $transaction->payment_code = (string)$xml->paymentMethod->code;
      $transaction->code = (string)$xml->code;
      $transaction->date = (string)$xml->date;
      $transaction->type = (string)$xml->type;
      $transaction->status = (string)$xml->status;
      $transaction->lastEventDate = (string)$xml->lastEventDate;
      $transaction->grossAmount = (string)$xml->grossAmount;
      $transaction->netAmount = (string)$xml->netAmount;
      $transaction->feeAmount = (string)$xml->feeAmount;
      $transaction->extraAmount = (string)$xml->extraAmount;
      $transaction->discountAmount = (string)$xml->discountAmount;
      $transaction->installmentCount = (string)$xml->installmentCount;
      $transaction->itemCount = (string)$xml->itemCount;
      $transaction->paymentLink = (string)$xml->paymentLink;
      $transaction->save();
      if($transaction->status == 3){
        $anuncio = Anuncio::where('transaction_id', $transaction->id)->first();
        $anuncio->ativo = true;
      }
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

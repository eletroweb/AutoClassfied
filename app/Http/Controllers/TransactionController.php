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

    public static function payment(Request $request){
      $http = new Client();
      $email = env('PAGSEGURO_EMAIL', 'PAGSEGURO_EMAIL');
      $token = env('PAGSEGURO_TOKEN', 'PAGSEGURO_TOKEN');
      $cpf = $request->input('cpf');
      $cpf = str_replace(".", "", $cpf);
      $tel_exploded = explode(")", $request->input('telefone'));
      $ddd = str_replace("(", "", $tel_exploded[0]);
      $telefone = str_replace("-", "", $tel_exploded[1]);
      $cep = str_replace("-", "", $request->input('cep'));
      $response = $http->request('POST',
          "https://ws.sandbox.pagseguro.uol.com.br/v2/transactions/?email=$email&token=$token&paymentMode=default&paymentMethod=creditCard&receiverEmail=jsantos.class@gmail.com&currency=BRL&extraAmount=0.00&itemId1=0001&itemDescription1=AnuncioParticularUNICODONO&itemAmount1=79.90&itemQuantity1=1&notificationURL=https://sualoja.com.br/notifica.html&reference=REF1234&senderName={$request->input('nome')}&senderCPF={$cpf}&senderAreaCode={$ddd}&senderPhone={$telefone}&senderEmail={$request->input('email')}&senderHash={$request->input('senderHash')}&shippingAddressRequired=false&creditCardToken={$request->input('cardtoken')}&installmentQuantity=1&installmentValue=79.90&creditCardHolderName={$request->input('nome')}&creditCardHolderCPF={$request->input('cpf')}&creditCardHolderBirthDate={$request->input('nascimento')}&creditCardHolderAreaCode={$ddd}&creditCardHolderPhone={$telefone}&billingAddressStreet={$request->input('logradouro')}&billingAddressNumber={$request->input('numero')}&billingAddressComplement=5oandar&
          billingAddressDistrict={$request->input('logradouro')}&billingAddressPostalCode={$cep}&billingAddressCity={$request->input('cidade')}&billingAddressState={$request->input('uf')}&billingAddressCountry=BRA"
        );
      $xml = simplexml_load_string($response->getBody());
      return $xml;
    }
}

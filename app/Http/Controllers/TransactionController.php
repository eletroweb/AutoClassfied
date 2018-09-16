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
use Carbon\Carbon;

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
      $cpf = trim(str_replace("-", "", str_replace(".", "", $cpf)));
      $tel_exploded = explode(") ", $request->input('telefone'));
      $ddd = str_replace("(", "", $tel_exploded[0]);
      $telefone = str_replace("-", "", $tel_exploded[1]);
      $cep = str_replace("-", "", $request->input('cep'));
      $data['token'] = $token;
      $data['email'] = $email;
      $data['paymentMode']='default';
      $data['paymentMethod']='creditCard';
      $data['receiverEmail']='jsantos.class@gmail.com';
      $data['currency']='BRL';
      $data['extraAmount']='0.00';
      $data['itemId1']='0001';
      $data['itemDescription1']='Anúncio Particular UnicoDono';
      $data['itemAmount1']= '79.00';
      $data['itemQuantity1']='1';
      $data["notificationURL"]="http://www.danielsilva.esy.es/tlek/pagseguro/testenotification.php";
      $data['reference']='REF1234';
      $data['senderName']= $request->input('nome');
      $data['senderCPF']= $cpf;
      $data['senderAreaCode']= $ddd;
      $data['senderPhone']= "9$telefone";
      $data["senderEmail"]= "c93245650383806312796@sandbox.pagseguro.com.br";
      $data['senderHash']= $request->input('senderHash');
      $data['shippingAddressStreet']='Avenida Giovani Rinaldi';
      $data['shippingAddressNumber']='176';
      $data['shippingAddressComplement']='a';
      $data['shippingAddressDistrict']='Parque Vitoria';
      $data['shippingAddressPostalCode']='07854120';
      $data['shippingAddressCity']='Sao Paulo';
      $data['shippingAddressState']='SP';
      $data['shippingAddressCountry']='BRA';
      $data['shippingType']='3';
      $data['creditCardToken']= $request->input('cardtoken');
      $data['installmentQuantity']='1';
      $data['installmentValue']= '79.00';
      $data['noInterestInstallmentQuantity']='2';
      $data['creditCardHolderName']= $request->input('nome');
      $data['creditCardHolderCPF']= $cpf;
      $data['creditCardHolderBirthDate']= Carbon::parse($request->input('nascimento'))->format('d/m/Y');
      $data['creditCardHolderAreaCode']= $ddd;
      $data['creditCardHolderPhone']= $telefone;
      $data['billingAddressStreet']='Av. Brig. Faria Lima';
      $data['billingAddressNumber']='1384';
      $data['billingAddressComplement']='5o andar';
      $data['billingAddressDistrict']='Jardim Paulistano';
      $data['billingAddressPostalCode']= $cep;
      $data['billingAddressCity']='Sao Paulo';
      $data['billingAddressState']='SP';
      $data['billingAddressCountry']='BRA';
      $curl = curl_init();
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
      curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded; charset=ISO-8859-1'));
      //curl_setopt($curl, CURLOPT_URL, "https://ws.sandbox.pagseguro.uol.com.br/v2/transactions/");
      curl_setopt($curl, CURLOPT_URL, "https://ws.sandbox.pagseguro.uol.com.br/v2/transactions");
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      $resp = curl_exec($curl);
      curl_close($curl);
      return $resp;
    }
}

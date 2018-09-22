<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Option;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Carbon\Carbon;
use App\Notification;

class PagseguroController extends Controller
{

    public function startSession(Request $request){
      $http = new Client();
      $link = Option::getOptionValor('pagseguro_endereco');
      $email = Option::getOptionValor('pagseguro_email');
      $token = Option::getOptionValor('pagseguro_token');
      $response = $http->request('POST', "$link/v2/sessions/?email=$email&token=$token");
      $xml = simplexml_load_string($response->getBody());
      return response()->json($xml->id);
    }

    public static function getTransactionFromNotification(Notification $notification){
      $http = new Client();
      $link = Option::getOptionValor('pagseguro_endereco');
      $email = Option::getOptionValor('pagseguro_email');
      $token = Option::getOptionValor('pagseguro_token');
      $response = $http->request('POST', "$link/v2/transactions/notifications/{$notification->notificationCode}/?email=$email&token=$token");
      $xml = simplexml_load_string($response->getBody());
      return $xml;
    }

    public static function payment(Request $request){
      $link = Option::getOptionValor('pagseguro_endereco');
      $cpf = $request->input('cpf');
      $cpf = trim(str_replace("-", "", str_replace(".", "", $cpf)));
      $tel_exploded = explode(") ", $request->input('telefone'));
      $ddd = str_replace("(", "", $tel_exploded[0]);
      $telefone = str_replace("-", "", $tel_exploded[1]);
      $cep = str_replace("-", "", $request->input('cep'));
      $curl = curl_init();
      $data = null;
      if($request->input('tipo_pagamento') == 'boleto'){
        $data = PagseguroController::dataBoleto($request, $cpf, $ddd, $telefone, $cep);
      }else{
        $data = PagseguroController::dataCreditCard($request, $cpf, $ddd, $telefone, $cep);
      }
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
      curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded; charset=ISO-8859-1'));
      //curl_setopt($curl, CURLOPT_URL, "https://ws.sandbox.pagseguro.uol.com.br/v2/transactions/");
      curl_setopt($curl, CURLOPT_URL, "$link/v2/transactions");
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      $resp = curl_exec($curl);
      $resp= simplexml_load_string($resp);
      curl_close($curl);
      return $resp;
    }

    private static function dataCreditCard(Request $request, $cpf, $ddd, $telefone, $cep){
      $email = Option::getOptionValor('pagseguro_email');
      $token = Option::getOptionValor('pagseguro_token');
      $data['token'] = $token;
      $data['email'] = $email;
      $data['paymentMode']='default';
      $data['paymentMethod']='creditCard';
      $data['receiverEmail']='jsantos.class@gmail.com';
      $data['currency']='BRL';
      $data['extraAmount']='0.00';
      $data['itemId1']='0001';
      $data['itemDescription1']='Anúncio Particular UnicoDono';
      $data['itemAmount1']= str_replace(',', '.', Option::getOptionValor('pagseguro_endereco'));
      $data['itemQuantity1']='1';
      $data["notificationURL"]="http://www.danielsilva.esy.es/tlek/pagseguro/testenotification.php";
      $data['reference']='REF1234';
      $data['senderName']= $request->input('nome');
      $data['senderCPF']= $cpf;
      $data['senderAreaCode']= $ddd;
      $data['senderPhone']= "9$telefone";
      $data["senderEmail"]= "c93245650383806312796@sandbox.pagseguro.com.br";
      $data['senderHash']= $request->input('senderHash');
      $data['shippingAddressRequired'] = false;
      /*$data['shippingAddressStreet']='Avenida Giovani Rinaldi';
      $data['shippingAddressNumber']='176';
      $data['shippingAddressComplement']='a';
      $data['shippingAddressDistrict']='Parque Vitoria';
      $data['shippingAddressPostalCode']='07854120';
      $data['shippingAddressCity']='Sao Paulo';
      $data['shippingAddressState']='SP';
      $data['shippingAddressCountry']='BRA';*/
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
      return $data;
    }

    private static function dataBoleto(Request $request, $cpf, $ddd, $telefone, $cep){
      $email = Option::getOptionValor('pagseguro_email');
      $token = Option::getOptionValor('pagseguro_token');
      $data['token'] = $token;
      $data['email'] = $email;
      $data['paymentMode']='default';
      $data['paymentMethod']='boleto';
      $data['receiverEmail']= $email; //Aqui é o email de quem vai receber o pagamento
      $data['currency']='BRL';
      $data['extraAmount']='0.00';
      $data['itemId1']='0001';
      $data['itemDescription1']='Anúncio Particular UnicoDono';
      $data['itemAmount1']= str_replace(',', '.', Option::getOptionValor('preco_anuncio'));
      $data['itemQuantity1']='1';
      $data["notificationURL"]="http://www.danielsilva.esy.es/tlek/pagseguro/testenotification.php";
      $data['reference']='REF1234';
      $data['senderName']= $request->input('nome');
      $data['senderCPF']= $cpf;
      $data['senderAreaCode']= $ddd;
      $data['senderPhone']= "9$telefone";
      $data["senderEmail"]= "c93245650383806312796@sandbox.pagseguro.com.br"; //Aqui é o e-mail do comprador
      $data['senderHash']= $request->input('senderHash');
      $data['shippingAddressRequired'] = false;
      /*$data['shippingAddressStreet']='Avenida Giovani Rinaldi';
      $data['shippingAddressNumber']='176';
      $data['shippingAddressComplement']='a';
      $data['shippingAddressDistrict']='Parque Vitoria';
      $data['shippingAddressPostalCode']='07854120';
      $data['shippingAddressCity']='Sao Paulo';
      $data['shippingAddressState']='SP';
      $data['shippingAddressCountry']='BRA';*/
      return $data;
    }

    public function admin(Request $request){
      return view('pagseguro.admin');
    }

}

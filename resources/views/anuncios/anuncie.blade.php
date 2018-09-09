@extends('layouts.app')
@section('content')

  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">Crie o seu anúncio</h1>
      <p class="lead">Preencha o formulário abaixo e anuncie o seu veículo.</p>
    </div>
  </div>  
  @include('elements.anuncios.anuncie_form')
  <script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
  <script type="text/javascript" src="{{asset('js/anuncio/pagseguro.js')}}"></script>
@endsection

@extends('layouts.app')
@section('content')
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">Crie o seu anúncio</h1>
      <p class="lead">Preencha o formulário abaixo e anuncie o seu veículo.</p>
    </div>
  </div>
  @include('elements.anuncios.anuncie_form')
@endsection

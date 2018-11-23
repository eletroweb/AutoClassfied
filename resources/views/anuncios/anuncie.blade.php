@extends('layouts.app')
@section('content')
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
    @isset($anuncio)
      <h1 class="display-4">Editar anúncio</h1>
      <p class="lead">Preencha o formulário abaixo e edite o seu veículo.</p>
    @else
      <h1 class="display-4">Crie o seu anúncio</h1>
      <p class="lead">Preencha o formulário abaixo e anuncie o seu veículo.</p>
    @endisset
    </div>
  </div>
  @include('elements.anuncios.anuncie_form')
@endsection

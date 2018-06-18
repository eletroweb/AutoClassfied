@extends('layouts.app')

@section('content')
<div class="container-fluid" id="banner_principal">
    @include('elements.homepage.anuncios_pesquisa')
</div>
<div class="container-fluid bg-primary text-white p-4">
  <div class="row mt-3">
      <div class="col-sm-12 text-center">
          <h1>Procure o seu veículo pela carroceria</h1>
          <hr>
      </div>
      <div class="col-sm-12 mx-auto">
          @include('elements.homepage.carrocerias')
      </div>
  </div>
</div>
<div class="container">

    <div class="row mt-4">
      <div class="col-sm-8">
        @include('elements.homepage.chamada_ofertas')
      </div>
      <div class="col-sm-4">
        @include('elements.homepage.concessionaria')
      </div>
    </div>
</div>
@endsection

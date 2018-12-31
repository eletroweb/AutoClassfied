@extends('layouts.app')
@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Minha conta</h1>
    <p class="lead">Veja os seus anúncios, contatos e atualize as configurações da sua conta.</p>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-3">
      <nav class="nav flex-column">
        <li class="nav-item">
          <a href="{{route('meusanuncios')}}" class="nav-link btn btn-light btn-lg">Meus anúncios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-light btn-lg" href="{{route('configuracoes_conta')}}">Configurações</a>
        </li>
        @if(Auth::user()->isRevenda())
        <li class="nav-item">
          <a class="nav-link" href="{{Auth::user()->isRevenda()->getUrl()}}">Minha revenda</a>
        </li>
        @endif
        <li class="nav-item">
          <a href="/anuncie" class="nav-link btn btn-warning btn-lg">Anunciar veículo</a>
        </li>
      </nav>
    </div>
    <div class="col-sm-9">
      @yield('subcontent')
    </div>
  </div>
</div>
@endsection

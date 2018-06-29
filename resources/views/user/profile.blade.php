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
        <a class="nav-link" href="{{route('meusanuncios')}}">Meus anúncios</a>
        <a class="nav-link" href="#">Meus contatos</a>
        <a class="nav-link" href="#">Configurações</a>
      </nav>
    </div>
    <div class="col-sm-9">
      @yield('subcontent')
    </div>
  </div>
</div>
@endsection

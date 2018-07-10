@extends('layouts.app')
@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
  <a class="navbar-brand" href="#">Painel Administrativo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Resumo</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/marcas">Marcas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/modelos">Modelos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/versaos">Versões</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Anúncios
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/anuncioFields">Campos personalizados</a>
          <a class="dropdown-item" href="#">Anúncios #N</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
@yield('subcontent')
<div class="container-fluid">
  <!--<div class="row">
    <div class="col-sm-3 p-4 mt-3">
      <nav class="nav flex-column">
        <a class="nav-link btn btn-secondary mb-1" href="/marcas">Marcas</a>
        <a class="nav-link btn btn-secondary mb-1" href="/modelos">Modelos</a>
        <a class="nav-link btn btn-secondary mb-1" href="/versaos">Versões</a>
        <div class="dropdown">
          <button class="btn btn-secondary btn-block dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Anúncios
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="/anuncioFields">Campos personalizados</a>
            <a class="dropdown-item" href="#">Anúncios</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </div>
      </nav>
    </div>
    <div class="col-sm-9">-->


</div>
@endsection

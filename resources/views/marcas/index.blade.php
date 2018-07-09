@extends('layouts.app')

@section('content')
<div class="jumbotron">
  <h1 class="display-4">Marcas</h1>
  <p class="lead">Marcas de veículos.</p>
  <hr class="my-4">
  <a class="btn btn-primary btn-lg" href="{!! route('marcas.create') !!}" role="button">Adicionar</a>
</div>
<div class="container text-center m-auto">
  @include('flash::message')
  @include('marcas.table')
</div>
@endsection

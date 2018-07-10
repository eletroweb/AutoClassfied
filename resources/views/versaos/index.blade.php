@extends('admin.dashboard')

@section('subcontent')
<div class="jumbotron">
  <h1 class="display-4">Versões</h1>
  <p class="lead"></p>
  <hr class="my-4">
  <a class="btn btn-primary btn-lg" href="{!! route('versaos.create') !!}" role="button">Adicionar</a>
</div>
<div class="container">
  @include('flash::message')
  @include('versaos.table')
</div>
@endsection

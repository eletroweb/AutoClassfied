@extends('admin.dashboard')

@section('subcontent')
<div class="jumbotron">
  <h1 class="display-4">Modelos</h1>
  <p class="lead"></p>
  <hr class="my-4">
  <a class="btn btn-primary btn-lg" href="{!! route('modelos.create') !!}" role="button">Adicionar</a>
</div>
<div class="container">
  @include('flash::message')
  @include('modelos.table')
</div>
@endsection

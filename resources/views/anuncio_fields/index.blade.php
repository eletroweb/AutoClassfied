@extends('admin.dashboard')

@section('subcontent')
<div class="jumbotron">
  <h1 class="display-4">Anúncios - Campos personalizados</h1>
  <p class="lead"></p>
  <hr class="my-4">
  <a class="btn btn-primary btn-lg" href="{!! route('anuncioFields.create') !!}" role="button">Adicionar</a>
</div>
<div class="container">
  @include('flash::message')
  @include('anuncio_fields.table')
</div>
@endsection

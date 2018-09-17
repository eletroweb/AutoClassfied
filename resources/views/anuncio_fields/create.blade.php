@extends('admin.dashboard')

@section('subcontent')
<div class="jumbotron">
  <h1 class="display-4">Anúncios - Campos personalizados</h1>
  <p class="lead"></p>
  <hr class="my-4">
</div>
<div class="container">
  {!! Form::open(['route' => 'anuncioFields.store']) !!}
      {{csrf_field()}}
      @include('anuncio_fields.fields')

  {!! Form::close() !!}
</div>
@endsection

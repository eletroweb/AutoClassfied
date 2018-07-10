@extends('admin.dashboard')

@section('subcontent')
<div class="jumbotron">
  <h1 class="display-4">Versao</h1>
  <p class="lead"></p>
  <hr class="my-4">
</div>
<div class="container">
  {!! Form::open(['route' => 'versaos.store']) !!}
      {{csrf_field()}}
      @include('versaos.fields')

  {!! Form::close() !!}
</div>
@endsection

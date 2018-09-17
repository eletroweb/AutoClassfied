@extends('layouts.app')

@section('content')
<div class="jumbotron">
  <h1 class="display-4">Revenda</h1>
  <p class="lead"></p>
  <hr class="my-4">
</div>
<div class="container">
  {!! Form::open(['route' => 'revendas.store']) !!}

      @include('revendas.fields')

  {!! Form::close() !!}
</div>
@endsection

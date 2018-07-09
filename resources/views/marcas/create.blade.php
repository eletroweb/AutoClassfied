@extends('layouts.app')

@section('content')
<div class="jumbotron">
  <h1 class="display-4">Marcas</h1>
  <p class="lead">Crie uma nova marca.</p>
  <hr class="my-4">
</div>
<div class="container">
  {!! Form::open(['route' => 'marcas.store']) !!}

      @include('marcas.fields')

  {!! Form::close() !!}
</div>
@endsection

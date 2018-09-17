@extends('layouts.app')

@section('content')
<div class="jumbotron">
  <h1 class="display-4">Transaction Item</h1>
  <p class="lead"></p>
  <hr class="my-4">
</div>
<div class="container">
  {!! Form::open(['route' => 'transactionItems.store']) !!}

      @include('transaction_items.fields')

  {!! Form::close() !!}
</div>
@endsection

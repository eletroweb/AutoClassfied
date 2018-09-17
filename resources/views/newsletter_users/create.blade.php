@extends('layouts.app')

@section('content')
<div class="jumbotron">
  <h1 class="display-4">Newsletter User</h1>
  <p class="lead"></p>
  <hr class="my-4">
</div>
<div class="container">
  {!! Form::open(['route' => 'newsletterUsers.store']) !!}

      @include('newsletter_users.fields')

  {!! Form::close() !!}
</div>
@endsection

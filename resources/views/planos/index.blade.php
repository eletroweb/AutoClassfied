@extends('admin.index')
@section('content')
<div class="container">
  @include('flash::message')
  @include('planos.table')
</div>
@endsection

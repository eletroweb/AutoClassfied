@extends('admin.index')
@section('content')
<div class="container">
  @include('flash::message')
  @include('transactions.table')
</div>
@endsection

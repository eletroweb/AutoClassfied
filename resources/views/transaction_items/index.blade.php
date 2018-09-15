@extends('admin.index')
@section('content')
<div class="container">
  @include('flash::message')
  @include('transaction_items.table')
</div>
@endsection

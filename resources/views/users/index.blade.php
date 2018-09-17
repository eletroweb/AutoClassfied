@extends('admin.index')
@section('content')
<div class="container">
  @include('flash::message')
  @include('users.table')
</div>
@endsection

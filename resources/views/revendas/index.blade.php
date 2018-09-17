@extends('admin.index')
@section('content')
<div class="container">
  @include('flash::message')
  @include('revendas.table')
</div>
@endsection

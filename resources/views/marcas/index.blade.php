@extends('admin.index')

@section('content')
<div class="container-fluid">
  @include('flash::message')
  @include('marcas.table')
</div>
@endsection

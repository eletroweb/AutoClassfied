@extends('admin.index')
@section('content')
<div class="container">
  @include('flash::message')
  @include('elements.filtro.filtro')
  @include('revendas.table')
</div>
@endsection

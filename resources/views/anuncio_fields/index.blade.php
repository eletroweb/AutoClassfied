@extends('admin.index')

@section('content')
<div class="container-fluid">
  @include('flash::message')
  @include('anuncio_fields.table')
</div>
@endsection

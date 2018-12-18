@extends('admin.index')
@section('content')
@include('elements.filtro.filtro', ['placeholder'=> 'Digite o nome ou o e-mail do usuário'])
<div class="container">
  @include('flash::message')
  @include('users.table')
</div>
@endsection

@extends('admin.index')
@section('content')
<div class="container">
  @include('flash::message')
  @include('newsletter_users.table')
</div>
@endsection

@extends('layouts.app')
@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Torne-se um revendedor</h1>
    <p class="lead">Você poderá publicar anúncios com destaque e ter uma página no site.</p>
  </div>
</div>
<div class="container">
  @include('elements.revendas.form.create')
</div>
</div>
@endsection

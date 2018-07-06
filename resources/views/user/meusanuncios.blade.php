@extends('user.profile')
@section('subcontent')
<div class="row">
  <div class="col-sm-12">
    @foreach($anuncios as $a)
      @include('elements.anuncios.anuncio', ['anuncio' => $a])
    @endforeach
  </div>
</div>
@endsection
@extends('user.profile')
@section('subcontent')
<div class="row">
  <div class="col-sm-12">
    @forelse($anuncios as $a)
      @include('elements.anuncios.anuncio', ['anuncio' => $a, 'is_my'=> true])
    @empty
      <div class="alert alert-primary" role="alert">
        Você não tem nenhum anúncio ativo
      </div>
    @endforelse
  </div>
</div>
@endsection

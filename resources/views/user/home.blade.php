@extends('user.profile')
@section('subcontent')
<div class="row">
  <div class="col-sm-12">
    <h2>Olá {{Auth::user()->name}}, bem-vindo(a) ao Único dono!</h2>
    <hr>
  </div>
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Anúncios</h5>
        <p class="card-text">{{Auth::user()->anuncios->count() > 0?Auth::user()->anuncios->count()." anúncios publicados":"Nenhum anúncio ativo"}}</p>
      </div>
    </div>
  </div>
</div>
@endsection

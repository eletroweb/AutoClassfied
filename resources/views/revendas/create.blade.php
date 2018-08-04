@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-8 m-auto">
      <div class="card mt-5">
        <div class="card-body">
          <h3>Selecione o plano</h3>
          <div class="row">
            @foreach(App\Plano::all() as $plano)
            <div class="col-sm-6 card">
              <h5 class="card-header">{{$plano->nome}}</h5>
              <div class="card-body">
                <h5 class="card-title">Por apenas R${{$plano->preco}}!</h5>
                <p class="card-text">{{$plano->descricao}}</p>
                <a href="#" class="btn btn-primary">Selecionar</a>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

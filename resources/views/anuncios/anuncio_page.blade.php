@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-7" style="margin-top: 40px;">
      @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
      @endif
      <div class="row">
        <div class="col-sm-12">
          <img src="http://via.placeholder.com/700x500" class="img-fluid" alt="Responsive image">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-2">
          <img src="http://via.placeholder.com/100x100" alt="imagem" class="img-thumbnail">
        </div>
      </div>
    </div>
    <div class="col-sm-5">
      <div class="card" style="border: none">
        <div class="card-body">
          <h5 class="card-title" style="font-size: 30px"><span class="badge badge-success">R${{$anuncio->valor}}</span></h5>
          <h5 class="card-title" style="font-size: 30px">{{$anuncio->nome}}</h5>
          <h6 class="card-subtitle mb-2 text-muted">{{$anuncio->created_at->format('d/m/Y H:i')}}</h6>
          <p class="card-text">
            {{$anuncio->descricao}}
          </p>
          <a class="btn btn-primary" data-toggle="collapse" href="#contato" role="button" aria-expanded="false" aria-controls="contato" class="card-link">Entrar em contato</a>
          <div class="collapse mt-3" id="contato">
            <div class="card card-body">
              <form>
                <div class="form-group">
                  <label for="nome">Nome completo:</label>
                  <input type="text" class="form-control" id="nome" aria-describedby="nomeHelp" placeholder="Digite o seu nome">
                  <small id="nomeHelp" class="form-text text-muted">Nome usado para identificarmos você.</small>
                </div>
                <div class="form-group">
                  <label for="email">E-mail:</label>
                  <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Digite o seu email">
                  <small id="emailHelp" class="form-text text-muted">Utilizaremos para entrar em contato com você.</small>
                </div>
                <div class="form-group">
                  <label for="telefone">Telefone</label>
                  <input type="text" class="form-control" id="telefone" aria-describedby="telefoneHelp" placeholder="Digite o seu telefone">
                  <small id="telefoneHelp" class="form-text text-muted">Utilizaremos para entrar em contato com você.</small>
                </div>
                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" id="whatsapp">
                  <label class="form-check-label" for="whatsapp">Prefiro contato via WhatsApp</label>
                </div>
                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" id="financiamento">
                  <label class="form-check-label" for="financiamento">Desejo realizar financiamento</label>
                </div>
                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" id="veiculo_troca">
                  <label class="form-check-label" for="veiculo_troca">Desejo dar veículo na troca</label>
                </div>
                <div class="form-group">
                  <label for="mensagem">Mensagem</label>
                  <textarea class="form-control" id="mensagem" rows="3" placeholder="Tire as dúvidas sobre o anúncio e faça a sua proposta ao anunciante"></textarea>
                </div>
                <button type="submit" class="btn btn-secondary">Enviar contato</button>
              </form>
            </div>
          </div>
        </div>
      </div>
        <div class="card" style="border: none">
          <div class="card-body">
            <h5 class="card-title">Anunciado por {{App\User::find($anuncio->user)->name}}</h5>
            <h6 class="card-subtitle mb-2 text-muted">Dados do vendedor</h6>
            <p class="card-text">
              <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Telefone</h5>
                    <small class="text-muted"></small>
                  </div>
                  <p class="mb-1">(71)90000-0000</p>
                  <small class="text-muted"></small>
                </a>
              </div>
            </p>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection

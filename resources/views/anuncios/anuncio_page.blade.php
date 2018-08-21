@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-7" style="margin-top: 40px;">
      @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
      @endif
      <div class="row">
        <div class="col-sm-12">
          <a class="col-sm-2 mr-1" href="{{$imagens[0]}}" data-lightbox="roadtrip"><img src="{{$imagens[0]}}" class="img-fluid main-img m-auto" alt="Responsive image"></a>

        </div>
      </div>
      <div class="row">
          <div class="col-sm-12 text-left mt-2">
          @foreach($imagens as $img)
            <a class="col-sm-2 mr-1" href="{{$img}}"data-lightbox="roadtrip"> <img class="rounded float-left  mr-1" width="100" src="{{$img}}"> </a>
          @endforeach
          </div>
      </div>
    </div>
    <div class="col-md-5">
      <div class="card" style="border: none">
        <div class="card-body">
          <h5 class="card-title" style="font-size: 30px"><span class="badge badge-success">R${{number_format(substr($anuncio->valor.'0', 0, -3), 2, ",", ".")}}</span></h5>
          <h5 class="card-title" style="font-size: 30px">{{$anuncio->nome}}</h5>
          <h6 class="card-subtitle mb-2 text-muted">{{$anuncio->created_at->format('d/m/Y H:i')}}</h6>
          <p class="card-text">
            {{$anuncio->descricao}}
          </p>
          <a class="btn btn-primary" data-toggle="collapse" href="#contato" role="button" aria-expanded="false" aria-controls="contato" class="card-link">Entrar em contato</a>
          <div class="collapse mt-3" id="contato">
            <div class="card card-body">
              <form action="{{route('contato_anuncio')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                  <label for="nome">Nome completo:</label>
                  <input type="text" class="form-control" id="nome" name="nome" aria-describedby="nomeHelp" placeholder="Digite o seu nome">
                  <small id="nomeHelp" class="form-text text-muted">Nome usado para identificarmos você.</small>
                </div>
                <input type="hidden" name="anuncio" value="{{$anuncio->id}}">
                <div class="form-group">
                  <label for="email">E-mail:</label>
                  <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Digite o seu email">
                  <small id="emailHelp" class="form-text text-muted">Utilizaremos para entrar em contato com você.</small>
                </div>
                <div class="form-group">
                  <label for="telefone">Telefone</label>
                  <input type="text" class="form-control" id="telefone" name="telefone" aria-describedby="telefoneHelp" placeholder="Digite o seu telefone">
                  <small id="telefoneHelp" class="form-text text-muted">Utilizaremos para entrar em contato com você.</small>
                </div>
                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" id="whatsapp" value="1" name="contato_whatsapp">
                  <label class="form-check-label" for="whatsapp">Prefiro contato via WhatsApp</label>
                </div>
                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" id="financiamento" value="1" name="desejo_financiamento">
                  <label class="form-check-label" for="financiamento">Desejo realizar financiamento</label>
                </div>
                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" id="veiculo_troca" value="1" name="veiculo_troca">
                  <label class="form-check-label" for="veiculo_troca">Desejo dar veículo na troca</label>
                </div>
                <div class="form-group">
                  <label for="mensagem">Mensagem</label>
                  <textarea class="form-control" id="mensagem" name="mensagem" rows="3" placeholder="Tire as dúvidas sobre o anúncio e faça a sua proposta ao anunciante"></textarea>
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
                  <p class="mb-1">{{App\User::find($anuncio->user)->telefone()->valor}}</p>
                  <small class="text-muted"></small>
                </a>
              </div>
            </p>
          </div>
        </div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-sm-7">
      <ul class="nav nav-pills" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active white" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Mais informações</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Adicionais</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Acessórios</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          <div class="row pt-2 bg-primary">
          @foreach($anunciodados as $dado)
            <div class="col-sm-6">
              <p class="text-white"><b>{{ucfirst($dado->nome)}}</b>: {{$dado->valor}}</p>
            </div>
          @endforeach
          </div>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          <div class="row pt-2 bg-primary">
            <div class="col-sm-12">
              <p class="text-white"><b>Adicionais do veículo</b></p>
              <hr>
            </div>
            @foreach($adicionais as $adicional)
            <div class="col-sm-6">
              <p class="text-white">{{ucfirst($adicional->nome)}}</p>
            </div>
            @endforeach
          </div>
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
          <div class="row bg-primary pt-2">
            @foreach($acessorios as $acessorio)
              <div class="col-sm-6">
                <p class="text-white">{{ucfirst($acessorio->nome)}}</p>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-7 mt-4">
      @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
      @endif
      <div class="row">
        <div class="col-sm-12" style="margin-left: inherit;">
          <a class="col-sm-2 mr-1" href="{{$anuncio->urlImagemFirst()}}" data-lightbox="roadtrip"><img src="{{$anuncio->urlImagemFirst()}}" class="img-fluid main-img m-auto" alt="Responsive image"></a>
        </div>
      </div>
      <div class="d-flex flex-row bd-highlight mb-3 flex-wrap">
        @foreach($imagens as $img)
        <div class="p-2 bd-highlight">
          <a href="{{$img}}"data-lightbox="roadtrip"> <img class="rounded float-left  mr-1" width="100" src="{{$img}}"> </a>
        </div>
        @endforeach
      </div>
    </div>
    <div class="col-sm-5">
      <div class="card" style="border: none">
        <div class="card-body">
          <h4 class="card-title" style="font-size: 30px"><span class="badge badge-success">R${{number_format(substr($anuncio->valor.'0', 0, -3), 2, ",", ".")}}</span></h4>
          <h3 class="card-title" style="font-size: 30px">{{$anuncio->titulo}}</h3>
          <h6 class="card-subtitle mb-2 text-muted">{{$anuncio->created_at->format('d/m/Y H:i')}}</h6>
          <p class="card-text">
            {{$anuncio->descricao}}
          </p>
        </div>
    </div>
  </div>
  </div>
  <div class="row">
    <div class="col-md-7">

      <!-- Tabs -->
      <section id="tabs">
      	<div class="container">
      		<!--<h6 class="section-title h1">Tabs</h6>-->
      		<div class="row">
      			<div class="col-xs-12 text-center">
      				<nav>
      					<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
      						<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Informações</a>
      						<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Adicionais do veículo</a>
      						<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Acessórios</a>
      					</div>
      				</nav>
      				<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
      					<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                  <div class="d-flex flex-row bd-highlight mb-3 flex-wrap text-center">
                    <div class="p-2 bd-highlight">
                      <p style="font-size: 14px;"><b style="font-size: 18px;">Quilometragem</b><br> {{$anuncio->km}}KM</p>
                    </div>
                    <div class="p-2 bd-highlight">
                      <p style="font-size: 14px;"><b style="font-size: 18px;">Blindado</b><br> {{$anuncio->blindagem?'Sim':'Não'}}</p>
                    </div>
                    @foreach($anunciodados as $dado)
                      <div class="p-2 bd-highlight">
                        <p style="font-size: 14px;"><b style="font-size: 18px;">{{ucfirst($dado->nome)}}</b><br> {{$dado->valor}}</p>
                      </div>
                    @endforeach
                  </div>
      					</div>
      					<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                  <div class="d-flex flex-row bd-highlight mb-3 flex-wrap">
                    @foreach($adicionais as $adicional)
                    <div class="p-2 bd-highlight">
                      <p>{{ucfirst($adicional->nome)}}</p>
                    </div>
                    @endforeach
                  </div>
      					</div>
      					<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                  <div class="d-flex flex-row bd-highlight mb-3 flex-wrap">
                    @foreach($acessorios as $acessorio)
                      <div class="p-2 bd-highlight">
                        <p>{{ucfirst($acessorio->nome)}}</p>
                      </div>
                    @endforeach
                  </div>
      					</div>
      				</div>
      			</div>
      		</div>
      	</div>
      </section>
      <!-- ./Tabs -->
    </div>
    <div class="col-md-5">
      <div class="card w-100" style="border: none">
        <div class="card-body">
          <a class="btn btn-primary btn-lg btn-block" data-toggle="collapse" href="#contato" role="button" aria-expanded="false" aria-controls="contato" class="card-link">Entrar em contato</a>
          <div class="collapse mt-3" id="contato">
            <div class="card card-body">
              <form action="{{route('contato_anuncio')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                  <label for="nome">Nome completo:</label>
                  <input type="text" class="form-control" id="nome" name="nome" value="{{Auth::check()?Auth::user()->name:''}}" aria-describedby="nomeHelp" placeholder="Digite o seu nome">
                  <small id="nomeHelp" class="form-text text-muted">Nome usado para identificarmos você.</small>
                </div>
                <input type="hidden" name="anuncio" value="{{$anuncio->id}}">
                <div class="form-group">
                  <label for="email">E-mail:</label>
                  <input type="email" class="form-control" id="email" value="{{Auth::check()?Auth::user()->email:''}}" name="email" aria-describedby="emailHelp" placeholder="Digite o seu email">
                  <small id="emailHelp" class="form-text text-muted">Utilizaremos para entrar em contato com você.</small>
                </div>
                <div class="form-group">
                  <label for="telefone">Telefone</label>
                  <input type="text" class="form-control" id="telefone" value="{{Auth::check()?Auth::user()->telefone():''}}" name="telefone" aria-describedby="telefoneHelp" placeholder="Digite o seu telefone">
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
        <div class="card w-100" style="border: none">
          <div class="card-body">
            <h5 class="card-title">Anunciado por {{$anuncio->users->isRevenda()?$anuncio->users->isRevenda()->nomefantasia:$anuncio->users->name}}</h5>
            <h6 class="card-subtitle mb-2 text-muted">
              @if($r = $anuncio->users->isRevenda())
                <a href="{{$r->getUrl()}}">Ver estoque completo desta revenda</a>
              @else
                Dados do vendedor
              @endif
            </h6>
            <p>
              <button class="btn btn-primary" type="button"
                 onclick="contabilizarVisualizacao({{$anuncio->id}}, {{Auth::check()?Auth::user()->id:null}})"
                 data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Ver informações do anunciante
              </button>
            </p>
            <div class="collapse" id="collapseExample">
              <p class="card-text">
                <ul class="list-group">
                  <li class="list-group-item"><i class="fa fa-phone"></i> {{$anuncio->users->telefone()}}</li>
                  <li class="list-group-item"><i class="fa fa-map-marker-alt"></i>
                    {{$anuncio->users->isRevenda()?$anuncio->users->isRevenda()->end->logradouro:$anuncio->users->end->logradouro}} {{$anuncio->users->isRevenda()?$anuncio->users->isRevenda()->end->numero:$anuncio->users->end->numero}},
                    {{$anuncio->users->isRevenda()?$anuncio->users->isRevenda()->end->cidade:$anuncio->users->end->cidade}} - {{$anuncio->users->isRevenda()?$anuncio->users->isRevenda()->end->uf:$anuncio->users->end->uf}}
                  </li>
                </ul>
              </p>
            </div>
          </div>
        </div>
        <div class="card w-100" style="border: 0px;">
          <div class="card-body">
            <ul class="list-group">
              <li class="list-group-item d-flex justify-content-between align-items-center" style="font-size: 18px">
                <b>Financie o seu veículo</b>
                <span ><i class="fa fa-dollar-sign fa-2x"></i></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center" style="font-size: 18px">
                <b>Venda o seu veículo</b>
                <span ><i class="fa fa-car fa-2x"></i></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center" style="font-size: 18px">
                <b>Catálogo 0km</b>
                <span ><i class="fa fa-search fa-2x"></i></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center" style="font-size: 18px">
                <b>Seguro online</b>
                <span ><i class="fa fa-lock fa-2x"></i></span>
              </li>
            </ul>
          </div>
        </div>
    </div>
  </div>
  <div class="row mt-4">

  </div>
  <!-- Anúncios relacionados -->
  <div class="row">
    <div class="col-sm-12">
      <hr>
      <h1 class="mb-3 text-center">Anúncios sugeridos</h1>
    </div>
    @include('elements.anuncios.carousel', ['recentes' => $relacionados])
  </div>
</div>
@endsection

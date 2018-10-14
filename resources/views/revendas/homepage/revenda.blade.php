@extends('layouts.app')
@section('content')
<main role="main">
  <section class="jumbotron text-center modifiable" id="revenda-top" style="background-image: url(
    {{$revenda->capa?Storage::url($revenda->capa):asset('images/placeholder.jpg')
  }})">
    <div class="container">
      <div class="row">
        <form class="col-sm-5 m-auto" style="z-index: 10;">
          <div id="avatar-revenda">
            @if($revenda->logo)
            <img src="{{Storage::url($revenda->logo)}}" width="300" class="mx-auto d-block" alt="
            {{$revenda->nomefantasia}}">
            @else
              <h1 class="jumbotron-heading">{{$revenda->nomefantasia}}</h1>
            @endif
            <!--<h1 class="jumbotron-heading">{{$revenda->nomefantasia}}</h1>-->
            <!--<p class="lead text-muted">Aqui você encontrará todos os anúncios desta revenda</p>-->
          </div>
          <div class="input-group mb-3 mt-2">
            <input type="text" class="form-control" name="titulo" placeholder="Pesquise pelo anúncio" aria-label="Pesquise pelo anúncio" aria-describedby="button-addon2">
            <div class="input-group-append">
              <a class="btn btn-primary" type="button" data-toggle="collapse" href="#pesquisa_avancada" role="button" aria-expanded="false" aria-controls="pesquisa_avancada"><i class="fa fa-arrows-alt-v"></i></a>
              <button class="btn btn-secondary" type="submit"><i class="fa fa-search"></i></button>
            </div>
          </div>
          <div class="collapse" id="pesquisa_avancada">
            <div class="card card-body bg-primary" style="border: 3px solid black;">
              <div class="form-group">
                <select class="form-control select2" id="marca" name="marca"></select>
              </div>
              <div class="form-group">
                <select class="form-control select2" id="modelo" name="modelo"></select>
              </div>
              <div class="form-group">
                <select class="form-control select2" id="versao" name="versao"></select>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section> 
  <div class="container">
  	<h2>Últimos vídeos</h2>
  	<hr>
  	<div class="row">
  		<div class="col-sm-12 m-auto pb-2">
        <div id="video-gallery">
          @forelse($videos as $v)
            <a href="https://www.youtube.com/watch?v=meBbDqAXago" data-poster="video-poster1.jpg" >
                <img src="https://via.placeholder.com/150x150" />
            </a>
          @empty
            <div class="alert alert-primary" role="alert">
              Ainda não há videos publicados por aqui
            </div>
          @endforelse
        </div>	  			
  		</div>
  		<script>
  			$('#video-gallery').lightGallery({
  				thumbnail:true,
  			    animateThumb: true,
  			    showThumbByDefault: true
  	  		}); 
  		</script>
  	</div>
  </div>
  <div class="album py-5">
    @if(Auth::check())
      @if($revenda->user == Auth::user()->id)
      <div class="alert alert-primary text-center" role="alert">
        Você pode alterar a imagem e a logo da sua revenda acessando as <a href="/revenda/{{$revenda->id}}/configuracoes" class="alert-link">Configurações da revenda</a>
      </div>
      <div class="alert alert-primary text-center" role="alert">
        Que tal compartilhar seus próprios videos com os seus clientes? <a href="{{$revenda->getVideoUrl()}}" class="alert-link">conheça o seu próprio canal da revenda</a>
      </div>
      @endif
    @endif
    <div class="container">
      <div class="row">
        @forelse($anuncios as $anuncio)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <img class="card-img-top" src="{{$anuncio->urlImagemFirst()}}" alt="{{$anuncio->titulo}}">
            <div class="card-body">
              <h5 class="card-title"><a href="{{$anuncio->getUrl()}}" style="color: black">{{$anuncio->titulo}}</a></h4>
              <p class="card-text">{{str_limit($anuncio->descricao, 150)}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="{{$anuncio->getUrl()}}" class="btn btn-sm btn-outline-secondary">Ver anúncio</a>
                  <!--<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>-->
                </div>
                <span class="badge badge-success" style="font-size: 16px;">R${{number_format(substr($anuncio->valor.'0', 0, -3), 2, ",", ".")}}</span>
              </div>
            </div>
          </div>
        </div>
        @empty
        <div class="card col-sm-6 m-auto">
          <div class="card-body text-center">
            <i class="fa fa-frown fa-3x"></i>
            <p class="mt-2">Nenhum anúncio foi encontrado</p>
          </div>
        </div>
        @endforelse
      </div>
      <div class="row">
        <div class="col-sm-4">
          {{$anuncios->links()}}
        </div>
      </div>
    </div>
  </div>
</main>
@endsection

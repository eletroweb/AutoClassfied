@extends('layouts.app')
@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Procurando por algo?</h1>
    <p class="lead">Explore os anúncios e encontre o que precisa</p>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-3">

    </div>
    <div class="col-sm-9">
      <form>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="search" placeholder="Digite o que está procurando" aria-label="Digite o que está procurando" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-outline-primary" type="button">Procurar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-3">
       <ul class="nav flex-column">
        <li class="nav-item">
          <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Categorias
          </button>
          <div class="mt-2 collapse" id="collapseExample">
            <div class="card card-body">
              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
            </div>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">#</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">#</a>
        </li>
      </ul>
    </div>
    <div class="col-sm-9">
      <div class="list-group">
        @foreach($anuncios as $anuncio)
          @include('elements.anuncios.anuncio', ['anuncio'=> $anuncio])
        @endforeach
      </div>
      {{$anuncios->links()}}
    </div>
</div>
</div>

@endsection

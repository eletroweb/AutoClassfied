@extends('layouts.app')
@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Encontre uma revenda</h1>
    <p class="lead">Através dos filtros você pode buscar revendas próximas à você.</p>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-6 m-auto">
      @foreach($revendas as $r)
        <div class="card  mb-2">
          <div class="card-body">
            <h5 class="card-title">{{$r->nomefantasia}}</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection

@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-10 m-auto">
      <div class="box mt-4">
          <h1 class="display-3"><i class="fa fa-car mr-4"></i>Ops! Revenda não ativada</h1>
          <p>
            A revenda "<b class="">{{$revenda->nomefantasia}}</b>" não está ativada. Se você é proprietário da revenda, por favor, entre em contato conosco para que possamos ativá-la.
          </p>
      </div>
    </div>
  </div>
</div>
@endsection

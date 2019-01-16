@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-10 m-auto">
      <div class="box mt-4">
          <h1 class="display-3">Conta não confirmada</h1>
          <p>
            Você precisa ativar a sua conta através do link enviado para o seu e-mail.
            Caso queira reenviar o link com a confirmação do seu cadastro para o seu e-mail clique no botão abaixo.
            <form  action="/reenviar-confirmacao" method="post">
              {{ csrf_field() }}
              <button type="submit" class="btn btn-primary">Reenviar e-mail de confirmação</button>
            </form>
          </p>
      </div>
    </div>
  </div>
</div>
@endsection

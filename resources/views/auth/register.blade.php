@extends('layouts.app')

@section('content')
<style>
    .form-signup {
      width: 100%;
      max-width: 330px;
      padding: 15px;
      margin: auto;
    }
    .form-signup .checkbox {
      font-weight: 400; 
    }
    .form-signup .form-control {
      position: relative;
      box-sizing: border-box;
      height: auto;
      padding: 10px;
      font-size: 16px;
    }
    .form-signup .form-control:focus {
      z-index: 2;
    }

</style>
<div class="row text-center">
    <div class="col-sm-12">
      <img class="mb-4" src="https://www.unicodono.com.br/web/img/topo/01.png" alt="" width="200">    
    </div>
  </div>
  <form class="form-signup {{ $errors->has('name') ? ' has-error' : '' }}" method="POST" action="{{ route('register') }}">
    {{ csrf_field() }}
      <h1 class="h3 mb-3 font-weight-normal">Acesse a sua conta</h1>
      <div class="form-group">
        <label for="inputName">Nome</label>
        <input type="text" id="inputName" class="form-control" name="name" value="{{ old('name') }}" placeholder="Digite o seu nome" required="" autofocus="">
      </div>
      <div class="form-group">
        <label for="inputEmail">Email</label>
        <input type="email" id="inputEmail" class="form-control" name="email" value="{{ old('email') }}" placeholder="Digite o seu e-mail" required="" autofocus="">
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group">
        <label for="inputPassword {{ $errors->has('password') ? ' has-error' : '' }}">Senha</label>
        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Digite a sua senha" required="">
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group">
        <label for="inputConfirmPassword">Confirmar senha</label>
        <input type="password" id="inputConfirmPassword" class="form-control" name="password_confirmation" placeholder="Digite a senha novamente" required="">
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Criar conta</button>
      <p class="mt-5 mb-3 text-muted text-center">Unicodono © Todos os direitos reservados</p>
    </form>
</div>

@endsection

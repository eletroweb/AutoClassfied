@extends('user.profile')
@section('subcontent')
<div class="row">
  <div class="col-sm-12">
    <h1 class="h3 mb-3 font-weight-normal text-left">Altere sua conta</h1>
    <hr>
  </div>
  <form class="form-signup col-sm-6 {{ $errors->has('name') ? ' has-error' : '' }}" method="POST" action="/users/update/{{Auth::user()->id}}">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="inputName">Nome</label>
      <input type="text"  class="form-control" name="name" value="{{ Auth::user()->name }}" placeholder="Digite o seu nome" required="" autofocus="">
    </div>
    <div class="form-group">
      <label for="inputEmail">Email</label>
      <input type="email"  class="form-control" name="email" value="{{Auth::user()->email }}" placeholder="Digite o seu e-mail" required="" autofocus="">
      @if ($errors->has('email'))
          <span class="help-block">
              <strong>{{ $errors->first('email') }}</strong>
          </span>
      @endif
    </div>
    <div class="form-group">
      <label for="telefone">Telefone</label>
      <input class="form-control telefone" type="text" id="telefone" name="telefone" value="{{Auth::user()->telefone()->valor}}" placeholder="Digite o seu telefone" value="" required>
    </div>
    <div class="form-group">
      <label for="documento" id="info_documento">CPF</label>
      <input class="form-control" type="text" id="documento" name="documento" value="{{Auth::user()->documento}}" required>
      @if ($errors->has('documento'))
          <span class="help-block">
              <strong>{{ $errors->first('documento') }}</strong>
          </span>
      @endif
    </div>
    <div class="row text-center mb-2">
      <div class="form-check col-sm-6">
        <input class="form-check-input" type="radio" name="pessoa_fisica" id="cpf" value="1" {{Auth::user()->pessoa_fisica?'checked':''}}>
        <label class="form-check-label" for="cpf">
          CPF
        </label>
      </div>
      <div class="form-check col-sm-6">
        <input class="form-check-input" type="radio" name="pessoa_fisica" id="cnpj" value="0" {{Auth::user()->pessoa_fisica?'':'checked'}}>
        <label class="form-check-label" for="cnpj">
          CNPJ
        </label>
      </div>
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
    <button class="btn btn-lg btn-primary btn-block" type="submit">Atualizar conta</button>
  </form>
</div>
@endsection

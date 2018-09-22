@extends('user.profile')
@section('subcontent')
<div class="row">
  <div class="col-sm-12">
    <h1 class="h3 mb-3 font-weight-normal text-left">Altere sua conta</h1>
    <hr>
    @include('flash::message')
  </div>
  <form class="form-signup box col-sm-12 {{ $errors->has('name') ? ' has-error' : '' }}" method="POST" action="{{route('atualizar_conta', ['id'=> Auth::user()->id])}}">
    {{ csrf_field() }}
    <div class="row">
      <div class="form-group col-sm-6">
        <label for="inputName">Nome</label>
        <input type="text"  class="form-control" name="name" value="{{ Auth::user()->name }}" placeholder="Digite o seu nome" required="" autofocus="">
      </div>
      <div class="form-group col-sm-6">
        <label for="inputEmail">Email</label>
        <input type="email"  class="form-control" name="email" value="{{Auth::user()->email }}" placeholder="Digite o seu e-mail" required="" autofocus="">
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>
    </div>
    <div class="row">
      <div class="form-group col-sm-6">
        <label for="telefone">Telefone</label>
        <input class="form-control telefone" type="text" id="telefone" name="telefone" value="{{Auth::user()->telefone()->valor}}" placeholder="Digite o seu telefone" value="" required>
      </div>
      <div class="form-group col-sm-6">
        <label for="documento" id="info_documento">CPF</label>
        <input class="form-control" type="text" id="documento" name="documento" value="{{Auth::user()->documento}}" required>
        @if ($errors->has('documento'))
            <span class="help-block">
                <strong>{{ $errors->first('documento') }}</strong>
            </span>
        @endif
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">

      </div>
      <div class="col-sm-6">
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
      </div>
    </div>
    <input type="hidden" name="uid" value="{{Auth::user()->id}}">
    <div class="row">
      <div class="form-group col-sm-6">
        <label for="inputPassword {{ $errors->has('password') ? ' has-error' : '' }}">Senha</label>
        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Digite a sua senha" required="">
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
      </div>
    </div>
    <button class="btn btn-lg btn-primary" type="submit">Atualizar conta</button>
  </form>
</div>
@endsection

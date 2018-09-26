@extends('layouts.app')

@section('content')

<div class="container mt-5">
<style>
.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>
    <!--<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>-->

  <div class="row text-center">
    <div class="col-sm-12">
      <img class="mb-4" src="https://www.unicodono.com.br/web/img/topo/01.png" alt="" width="200">
    </div>
  </div>
  <form method="post" class="form-signin h-100" action="{{route('login')}}">
      {{csrf_field()}}
      <h1 class="h3 mb-3 font-weight-normal text-center">Acesse a sua conta</h1>
      @if ($errors->has('email'))
          <span class="help-block">
              <strong>{{ $errors->first('email') }}</strong>
          </span>
      @endif
      <label for="email" class="sr-only">Email</label>
      <input type="email" id="email" name="email" class="form-control" placeholder="Digite o seu e-mail" required="" autofocus="">
      <label for="password" class="sr-only">Senha</label>
      @if ($errors->has('password'))
          <span class="help-block">
              <strong>{{ $errors->first('password') }}</strong>
          </span>
      @endif
      <input type="password" id="password" name="password" class="form-control" placeholder="Digite a sua senha" required="">
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Lembrar de mim
        </label>
      </div>
      <button class="btn btn-primary btn-block" type="submit">Entrar</button>
      <a class="btn btn-secondary btn-block" href="{{ route('register') }}">Criar Conta</a>
      <a class="btn btn-light btn-block" href="{{ url('/auth/facebook') }}"><i style="color: #3b5998" class="fab fa-facebook"></i> Facebook</a>
      <p class="mt-5 mb-3 text-muted text-center">Unicodono © Todos os direitos reservados</p>
    </form>
</div>
@endsection

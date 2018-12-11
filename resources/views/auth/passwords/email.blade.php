@extends('layouts.app')
@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Esqueceu sua senha?</h1>
    <p class="lead">Informe o seu e-mail para que possamos enviar-lhe um link e você consiga acessar a sua conta.</p>
  </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6 box">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">Digite o seu E-mail</label>

                    <div class="col-md-12">
                        <input id="email" placeholder="Enviaremos um e-mail contendo os próximas passos" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">
                            Enviar link
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')
@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Fale conosco</h1>
    <p class="lead">Entre em contato conosco para solucionar dúvidas, enviar sugestões ou reclamações.</p>
  </div>
</div>
<div class="container-fluid fale_conosco">
  <div class="row">
    <div class="col-sm-6">
      <form action="{{route('fale_conosco_post')}}" class="bg-light p-4 m-4" method="post">
        {{csrf_field()}}
        <div class="form-group">
          <label for="nome">Nome:</label>
          <input type="text" class="form-control" id="nome" aria-describedby="nomeHelp" placeholder="Qual o seu nome?" required>
          <small id="nomeHelp" class="form-text text-muted">Digite o seu nome completo.</small>
        </div>
        <div class="form-group">
          <label for="email">E-mail:</label>
          <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Digite o seu CPF" required>
          <small id="emailHelp" class="form-text text-muted">Entraremos em contato com você através do e-mail informado.</small>
        </div>
        <div class="form-group">
          <label for="cpf">CPF:</label>
          <input type="text" class="form-control" id="cpf" aria-describedby="cpfHelp" placeholder="Digite o seu CPF" required>
          <small id="cpfHelp" class="form-text text-muted">O seu CPF será usado para identificá-lo.</small>
        </div>
        <div class="form-group">
          <label for="telefone">Telefone:</label>
          <input type="text" class="form-control" id="telefone" aria-describedby="telefoneHelp" placeholder="Digite o seu telefone" required>
          <small id="telefoneHelp" class="form-text text-muted">Utilizaremos o seu telefone para um possível retorno.</small>
        </div>
        <div class="form-group">
          <label for="celular">Celular(Opcional):</label>
          <input type="text" class="form-control" id="celular" aria-describedby="celularHelp" placeholder="Digite o seu número de celular">
          <small id="celularHelp" class="form-text text-muted">Caso utilize o celular, você pode informá-lo aqui.</small>
        </div>
        <div class="form-group">
          <label for="assunto">Assunto:</label>
          <input type="text" class="form-control" id="assunto" aria-describedby="assuntoHelp" placeholder="Qual o motivo do seu contato?" required>
          <small id="assuntoHelp" class="form-text text-muted">Seja curto e objetivo para o fácil entendimento.</small>
        </div>
        <div class="form-group">
          <label for="mensagem">Mensagem:</label>
          <textarea class="form-control" id="mensagem" rows="5" placeholder="Olá, estou entrando em contato para..." required></textarea>
          <small id="mensagemHelp" class="form-text text-muted">Escreva sua dúvida, consulta ou sugestão.</small>
        </div>
        <button type="submit" class="btn btn-primary">Enviar contato</button>
      </form>
    </div>
  </div>
</div>
@endsection

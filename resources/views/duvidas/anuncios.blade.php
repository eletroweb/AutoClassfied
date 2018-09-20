@extends('layouts.app')
@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Como comprar o seu veículo</h1>
    <p class="lead">Dúvidas relacionadas a compras no Unicodono.</p>
  </div>
</div>
<div class="container">
  <div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Ao tentar fazer um anúncio, não encontrei a versão do meu veículo. Como fazer para anunciar?
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        Não tem no catálogo? Entre em contato conosco por email e mande, se possível, as seguintes informações:
        › Marca

        › Modelo

        › Versão

        › Ano/versão


        Para acelerar o seu atendimento, se possível envie-nos uma cópia “escaneada” do documento ou nota fiscal do veículo, ou por fax no telefone.

        Aguarde, pois temos uma equipe esperando pra te responder sempre!
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          É possível excluir meu anúncio? Como desativar o anúncio?
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        <p>Não é possível excui-lo, mas você pode desativa-lo em&nbsp;"Meu UNICODONO". Não sabe como? Siga as instruções:</p>
        <ol style="margin-left:40px; margin-right:0px !important">
        	<li>Clique em “Login” no menu superior e informe seu e-mail e senha cadastrados;</li>
        	<li>Em Meu UNICODONO, no menu “Meus anúncios” escolha “Carro” ou “Moto”;</li>
        	<li>Localize seu anúncio. À esquerda, passe o mouse sobre o ícone de chave de manutenção e clique em “Desativar”.</li>
        </ol>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Esqueci meu e-mail cadastrado no UNICODONO Como posso recuperá-lo?
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        Para resetar a sua senha basta clicar em "Esqueci a minha senha", no formulário de login, em seguida, informar o seu e-mail.
        Os próximos passos serão enviados para você.
      </div>
    </div>
  </div>
</div>
</div>
@endsection

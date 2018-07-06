@extends('layouts.app')
@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Como vender o seu veículo</h1>
    <p class="lead">Dúvidas relacionadas à venda de veículos na Unicodono.</p>
  </div>
</div>
<div class="container">
  <div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Como anuncio meu veículo? Quais são os preços dos anúncios?
        </button>
      </h5>
    </div>
    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        <p>Para anunciar ou ver os preços dos anúncios, siga os passos abaixo:</p>
        <ol style="margin-left:40px; margin-right:0px !important">
        	<li>Na homepage, clique na opção desejada em “VENDA seu carro ou moto!” ao lado da Busca Rápida, ou clique em “Anuncie seu carro” ou “Anuncie sua moto” no submenu em "Vender”.</li>
        	<li>Na seção Vender, preencha os primeiros dados do seu veículo e digite seu CEP.</li>
        	<li>Se tiver um cupom de desconto, insira o código. Confira as vantagens de cada tipo de anúncio e escolha o que mais atende às suas necessidades.</li>
        	<li>Cadastro do Veículo: preencha os campos com os dados do veículo.</li>
        	<li>Cadastro pessoal: se você não possui cadastro no UNICODONO, inicie com seu e-mail em “Quero me cadastrar”. Se já possui, insira e-mail e senha em “Já sou cadastrado”.</li>
        	<li>Confirmação do seu anúncio: confira os dados de seu anúncio, escolha a forma de pagamento, aceite o "Termo de adesão" e clique em "Confirmar".</li>
        </ol>
        <p>Você receberá um e-mail informando que o cadastro do seu anúncio foi efetuado com êxito.</p>
        <p>Atenção: para realizar o pagamento é necessário que seu navegador esteja com bloqueador de pop-up desativado. Caso contrário, você não verá o sistema de pagamento. Para saber como desativar o bloqueador de pop-up clique aqui.</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Como atualizar meus dados pessoais?
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        <p>Para alterar os dados pessoais, siga as instruções:</p>
        <ol style="margin-left:40px; margin-right:0px !important">
        	<li>Clique no menu superior "Login";</li>
        	<li>Informe seu e-mail e senha cadastrados e clique em "Acessar";</li>
        	<li>Em “Configurações”, clique em "Alterar dados";</li>
        	<li>Altere os campos desejados e clique em "Salvar".</li>
        </ol>
      </div>
    </div>
  </div>
</div>
</div>
@endsection

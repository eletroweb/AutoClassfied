@extends('layouts.app')
@section('content')
<div class="jumbotron">
  <div class="container">
    <h1 class="display-3">Perguntas frequentes (FAQ)</h1>
    <p class="lead">Principais dúvidas em relação a utilização do site únicodono.</p>
  </div>

</div>
<div class="container">
  <div class="row">
    <div class="accordion col-sm-12" id="accordionExample">
      <div class="card">
        <div class="card-header" id="headingOne">
          <h5 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Como eu faço para alterar o meu anúncio?
            </button>
          </h5>
        </div>
        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
          <div class="card-body">
            <div class="editor taj"><p>Para alterar os dados do seu anúncio, siga as instruções:</p>
              <ol style="margin-left:40px; margin-right:0px !important">
              	<li>Clique em “Login” no menu superior e informe seu e-mail e senha cadastrados;</li>
              	<li>Vá até o seu anúncio e clique no botão "Editar anúncio";</li>
              	<li>Altere os campos desejados e clique em "Salvar".</li>
              </ol>
              <p>Atenção: após publicação do anúncio não podem ser alterados os campos “marca”, “modelo”, "versão”, ”ano modelo” e "CEP”. O prazo para alteração dos outros dados do anúncio é de 15 (quinze) dias, contados da data de publicação.</p>
              <p>Caso o prazo para alteração do anúncio tenha expirado, sua solicitação deverá ser encaminhada pelo formulário do Fale Conosco ao lado. Para analisarmos sua solicitação informe seu CPF, o anúncio que deseja alterar e as informações para alteração.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingTwo">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Como incluir fotos no meu anúncio?
            </button>
          </h5>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
          <div class="card-body">
            Para incluir fotos no seu anúncio você deverá arrastá-las até a zona das imagens que fica do lado direito do seu formulário de publicação
            do anúncio.
            <ol>
              <li>As imagens devem ter o tamanho máximo de 1MB.</li>
              <li>As imagens devem ser preferencialmente horizontais.</li>
              <li>Você poderá inserir no máximo 12 imagens por anúncio.</li>
            </ol>
          </div>
        </div>
    </div>
    </div>
  </div>
</div>
@endsection

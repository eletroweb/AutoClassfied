<!-- Cadastrar endereço se necessário -->
@if(!Auth::user()->endereco)
<div class="modal fade" id="enderecoCadastro" tabindex="-1" role="dialog" aria-labelledby="enderecoCadastro" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <form action="/cadastrar-endereco" method="post" class="modal-content">
      {{csrf_field()}}
      <div class="modal-header">
        <h5 class="modal-title" id="enderecoCadastro">Informe o seu endereço</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="alert alert-primary" role="alert">
          Precisamos saber o seu endereço para que você possa publicar anúncios.
        </div>
        @include('enderecos.form')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Salvar endereço</button>
      </div>
    </form>
  </div>
</div>
@endif
<div class="container">
  <!--<form method="post" action="{{route('anuncieStore')}}"  enctype="multipart/form-data">
  <div class="row">
    <div class="col-sm-6">
        @if (session('status'))
            <div class="alert alert-danger">
                {{ session('status') }}
            </div>
        @endif
        @include('flash::message')
        <input type="hidden" name="user" value="{{Auth::user()->id}}">
        <div class="form-group">
          <label for="descricao">Descrição</label>
          <textarea required class="form-control" value="{{old('descricao')}}" name="descricao" id="descricao" rows="3" placeholder="Descreve detalhadamento o que você está anunciando"></textarea>
          <small id="descricaoHelp" class="form-text text-muted">Seja objetivo, o título será exibido na listagem dos veículos.</small>
        </div>
        <div class="form-group">
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="moto" name="moto" value="1">
            <label class="custom-control-label" for="moto">
              Estou anunciando uma motocicleta
            </label>
          </div>
        </div>
        <div class="row">
        @foreach(App\AnuncioField::all() as $field)
        <div class="form-group col-sm-6">
          <label for="{{$field->nome_prog}}">{{$field->nome}}</label>
          <input required type="{{$field->type}}" value="{{old($field->nome)}}" class="form-control" id="{{$field->nome_prog}}" name="{{$field->nome_prog}}" aria-describedby="{{$field->nome_prog}}Help"
                 placeholder="{{$field->place_holder}}" {{ $field->type=='number'? "step=$field->step" : '' }} >
          <small id="{{$field->nome_prog}}Help" class="form-text text-muted">{{$field->helpText}}</small>
        </div>
        @endforeach
        </div>
        <h2>Informações adicionais e imagens</h2>
        <hr>
        <div class="box">
          <div class="card-body">
            <div class="form-group">
              <label for="adicional">Itens adicionais do veículo</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="adicional" placeholder="Digite o nome do adicional que pretende adicionar" aria-describedby="adicionalHelp" aria-label="Digite o nome do adicional que pretende adicionar" aria-describedby="button-addon2">
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="button" id="addAdicional">Adicionar</button>
                </div>
              </div>
              <small id="adicionalHelp" class="form-text text-muted">Um adicional é um atributo específico do veículo que você deseja citar.</small>
            </div>
            <div class="form-group">
              <div class="list-group" id="adicionais">
              </div>
            </div>
          </div>
        </div>
        <div class="box mt-2">
          <div class="card-body">
            <div class="form-group">
              <label for="acessorio">Acessórios do veículo</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="acessorio" placeholder="Digite o nome do acessório que pretende adicionar" aria-describedby="acessorioHelp" aria-label="Digite o nome do acessório que pretende adicionar" aria-describedby="button-addon2">
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="button" id="addAcessorio">Adicionar</button>
                </div>
              </div>
              <small id="acessorioHelp" class="form-text text-muted">Descreva os acessórios do seu veículo por unidade.</small>
            </div>
            <div class="form-group">
              <div class="list-group" id="acessorios">
              </div>
            </div>
          </div>
        </div>
        @include('elements.anuncios.selecionar_pagamento')
        <div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="checkoutModalLabel">Informações de pagamento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                @include('elements.anuncios.checkout')
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" id="btnPagar" class="btn btn-success">Prosseguir com o pagamento</button>
              </div>
            </div>
          </div>
        </div>
        <script type="text/javascript" src="{{asset('js/anuncio/pagseguro.js')}}"></script>
      </form>
    </div>
    <div class="col-sm-6">
      <h2>Imagens do anúncio</h2>
      <hr>
      <div  id="dropzone" class="row mt-3 mb-3 box">
        <div class="row">
          <div class="col-sm-12">
            <p class="text-center text-muted">
              Clique ou arraste uma imagem para carregá-la
            </p>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="row">
  <div class="col-sm-6">
    <button type="submit" onclick="beforeStoreAnuncio()" class="mt-2 btn btn-primary">Anunciar</button>
  </div>
</div>
</div>-->

<form id="anunciar" method="post" action="{{route('anuncieStore')}}"  enctype="multipart/form-data">
    <div class="container">
        <h3>Informações básicas</h3>
        {{csrf_field()}}
        <section>
          <input type="hidden" name="cardtoken" id="card-token">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="veiculo">Marca</label>
                <select required class="form-control select2" name="marca" id="marca">
                  <option value="">Selecione a marca...</option>
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="veiculo">Modelo</label>
                <select required class="form-control select2" name="modelo" id="modelo">
                  <option value="">Selecione o modelo...</option>
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="veiculo">Versão</label>
                <select required class="form-control select2" name="versao" id="versao">
                  <option value="">Selecione a marca...</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="valor">Valor</label>
                <input required type="text" value="{{old('valor')}}" class="form-control" name="valor" id="valor" aria-describedby="valorHelp" placeholder="Digite o preço">
                <small id="valorHelp" class="form-text text-muted">Este preço será exibido no anúncio</small>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="ano">Ano</label>
                <input required type="text" value="{{old('ano')}}" class="form-control" name="ano" id="ano" aria-describedby="anoHelp" placeholder="Digite o ano do veículo">
                <small id="anoHelp" class="form-text text-muted">O ano será exibido no anúncio</small>
              </div>
            </div>
          </div>
        </section>
        <h3>Mais informações</h3>
        <section>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="ano">Quilometragem</label>
                <input required type="number" value="{{old('km')}}" class="form-control" name="km" id="km" aria-describedby="anoHelp" placeholder="Digite a quilometragem do veículo">
                <small id="kmHelp" class="form-text text-muted">Informe a quilometragem do veículo</small>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="ano">Cambio</label>
                <select class="form-control" name="cambio" required="required">
                  <option value="">Selecione o cambio...</option>
                  <option value="Manual">Manual</option>
                  <option value="Automático">Automático</option>
                </select>
              </div>
            </div>
        </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="combustivel">Combustível</label>
            <select id="combustivel" name="combustivel" class="form-control" required="required">
              <option value="">Selecione o combustível...</option>
              <option value="Gasolina">Gasolina</option>
              <option value="Alcool">Alcool</option>
              <option value="Diesel">Diesel</option>
              <option value="Elétrico">Elétrico</option>
            </select>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="cor">Cor</label>
            <input type="text" name="cor" value="{{old('cor')}}" class="form-control" id="cor" placeholder="Digite o nome da cor" required="required">
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="cor">Portas</label>
              <input type="number" class="form-control" value="{{old('portas')}}" name="portas" id="portas" placeholder="Digite o número de portas" required="required">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="usado" name="usado" value="1">
                <label class="custom-control-label" for="usado">
                  Veículo usado
                </label>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="blindagem" name="blindagem" value="1">
                <label class="custom-control-label" for="blindagem">
                  Blindado
                </label>
              </div>
            </div>
          </div>
        </div>
        </section>
        <h3>Imagens</h3>
        <section>
          <div class="col-sm-12">
            <div  id="dropzone" class="row mt-3 mb-3 box">
              <div class="row">
                <div class="col-sm-12">
                  <p class="text-center text-muted">
                    Clique ou arraste uma imagem para carregá-la
                  </p>
                </div>
              </div>
            </div>
          </div>
        </section>
        <h3>Pagamento</h3>
        <section>
          @include('elements.anuncios.selecionar_pagamento')
          <div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="checkoutModalLabel">Informações de pagamento</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  @include('elements.anuncios.checkout')
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <button type="button" id="btnPagar" class="btn btn-success">Prosseguir com o pagamento</button>
                </div>
              </div>
            </div>
          </div>
        </section>
    </div>

</form>
<script type="text/javascript">
  var form = $("#anunciar");
  form.validate({
      errorPlacement: function errorPlacement(error, element) { element.before(error); },
      rules: {
          confirm: {
              equalTo: "#password"
          }
      }
  });
  form.children("div").steps({
      headerTag: "h3",
      bodyTag: "section",
      transitionEffect: "slideLeft",
      next: 'Próximo',
      onStepChanging: function (event, currentIndex, newIndex)
      {
          form.validate().settings.ignore = ":disabled,:hidden";
          return form.valid();
      },
      onFinishing: function (event, currentIndex)
      {
          form.validate().settings.ignore = ":disabled";
          return form.valid();
      },
      onFinished: function (event, currentIndex)
      {
          alert("Submitted!");
      }
  });
</script>

<input type="hidden" id="endereco" value="{{Auth::user()->endereco}}">
<script type="text/javascript">
  $(document).ready(function(){
    if($('#endereco').val() == ''){
      $('#enderecoCadastro').modal();
    }
    $('#enderecoCadastro').on('hidden.bs.modal', function (e) {
      window.location.href = "/";
    });
  });
</script>

<!-- Erro no anúncio -->
<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="errorModalLabel">Você precisa preencher as informações de pagamento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Atenção, para destacar um anúncio você deve <b>selecionar e preencher</b> a forma de pagamento
        com informações válidas.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

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
  @if (session('status'))
    <div class="alert alert-danger">
      {{ session('status') }}
    </div>
  @endif
<form id="anunciar" method="post" action="{{route('anuncieStore')}}"  enctype="multipart/form-data">
  <div class="container">
    <h3>Informações básicas</h3>
    {{csrf_field()}}
    <input type="hidden" name="cardtoken" id="card-token">
    <section>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            {{isset($anuncio)}}
            <label for="veiculo">Marca</label>
            <select required class="form-control select2" name="marca" id="marca">
              <option value="">Selecione a marca...</option>
            </select>
            <script type="text/javascript">
              @isset($anuncio)
                  $('#marca').val({{$anuncio->marca}}).trigger('change');
              @endisset
            </script>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="veiculo">Modelo</label>
            <select required class="form-control select2" name="modelo" id="modelo">
              <option value="">Selecione o modelo...</option>
            </select>
            <script type="text/javascript">
            @isset($anuncio)
              $('#modelo').val({{$anuncio->modelo}}).trigger('change');
            @endisset
            </script>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="veiculo">Versão</label>
            <select required class="form-control versao" name="versao" id="versao">
              <option value="">Selecione a marca...</option>
            </select>
            <script type="text/javascript">
            @isset($anuncio)
              $('#versao').val({{$anuncio->versao}}).trigger('change');
            @endisset
            </script>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="unicodono">Veículo único dono?</label>
            <select required class="form-control" name="unicodono" id="unicodono">
              <option value="">Selecione uma opção...</option>
              <option value="1" {{ isset($anuncio)? $anuncio->unicodono?'selected':'' :'' }}>Sim, veículo único dono</option>
              <option value="0" {{ isset($anuncio)? !$anuncio->unicodono?'selected':'' :'' }}>Não, veículo já pertenceu a mais de um</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="valor">Valor</label>
            <input required type="text" value="{{ old('valor')? old('valor'): isset($anuncio)? $anuncio->valor:'' }}" class="form-control" name="valor" id="valor" aria-describedby="valorHelp" placeholder="Digite o preço">
            <small id="valorHelp" class="form-text text-muted">Este preço será exibido no anúncio</small>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="ano">Ano de fabricação</label>
            <input required type="text" value="{{ old('ano')? old('ano'): isset($anuncio)? $anuncio->ano:'' }}" class="form-control" name="ano" id="ano" aria-describedby="anoHelp" placeholder="Digite o ano do veículo">
            <small id="anoHelp" class="form-text text-muted">O ano será exibido no anúncio</small>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="ano">Ano do modelo</label>
            <input required type="text" value="{{ old('ano_modelo')? old('ano_modelo'): isset($anuncio)? $anuncio->ano_modelo:'' }}" class="form-control" name="ano_modelo" id="ano_modelo" aria-describedby="anoModeloHelp" placeholder="Digite o ano do modelo do veículo">
            <small id="anoModeloHelp" class="form-text text-muted">O ano do modelo será exibido no anúncio</small>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
              <label for="usado">Veículo usado?</label>
              <select class="form-control" name="usado" id="usado" required>
                <option value="">Selecione uma opção...</option>
                <option value="1" {{ isset($anuncio)? $anuncio->usado?'selected':'' :'' }}>Sim, veículo usado</option>
                <option value="0" {{ isset($anuncio)? !$anuncio->usado?'selected':'' :'' }}>Não, veículo novo</option>
              </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
              <label for="blindagem">Veículo blindado?</label>
              <select class="form-control" name="blindagem" id="blindagem" required>
                <option value="">Selecione uma opção...</option>
                <option value="1" {{ isset($anuncio)? $anuncio->blindagem?'selected':'' :'' }}>Sim, veículo blindado</option>
                <option value="0" {{ isset($anuncio)? !$anuncio->blindagem?'selected':'' :'' }}>Sem blindagem</option>
              </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="alert alert-primary" role="alert">
            Dúvidas para definir o seu preço de venda? Consulte a <a target="_blank" href="{{route('fipe')}}" class="alert-link">tabela fipe</a>.
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
            <input required type="number" value="{{ old('km')? old('km'): isset($anuncio)? $anuncio->km:'' }}" class="form-control" name="km" id="km" aria-describedby="anoHelp" placeholder="Digite a quilometragem do veículo">
            <small id="kmHelp" class="form-text text-muted">Informe a quilometragem do veículo</small>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="ano">Cambio</label>
            <select class="form-control" name="cambio" required="required">
              <option value="">Selecione o cambio...</option>
              <option value="Manual" {{ isset($anuncio)? $anuncio->cambio=='Manual'?'selected':'' :'' }}>Manual</option>
              <option value="Automático" {{ isset($anuncio)? $anuncio->cambio=='Automático'?'selected':'' :'' }}>Automático</option>
              <option value="Automatizado" {{ isset($anuncio)? $anuncio->cambio=='Automatizado'?'selected':'' :'' }}>Automatizado</option>
              <option value="Semi-Automático" {{ isset($anuncio)? $anuncio->cambio=='Semi-Automático'?'selected':'' :'' }}>Semi-Automático</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="manual">Possui manual do veículo?</label>
            <select class="form-control" name="manual" id="manual" required>
              <option value="">Selecione uma opção...</option>
              <option value="1"{{ isset($anuncio)? $anuncio->manual?'selected':'' :'' }}>Sim, possuo</option>
              <option value="0"{{ isset($anuncio)? !$anuncio->manual?'selected':'' :'' }}>Não possuo</option>
            </select>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="chave_reserva">Possui chave reserva?</label>
            <select class="form-control" name="chave_reserva" id="chave_reserva" required>
              <option value="">Selecione uma opção...</option>
              <option value="1" {{ isset($anuncio)? !$anuncio->chave_reserva?'selected':'' :'' }}>Sim, possuo</option>
              <option value="0" {{ isset($anuncio)? $anuncio->chave_reserva?'selected':'' :'' }}>Não possuo</option>
            </select>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="comprovante_manutencao">Possui comprovante de manutenção?</label>
            <select class="form-control" name="comprovante_manutencao" id="comprovante_manutencao" required>
              <option value="">Selecione uma opção...</option>
              <option value="1" {{ isset($anuncio)? $anuncio->comprovante_manutencao?'selected':'' :'' }}>Sim, possuo</option>
              <option value="0" {{ isset($anuncio)? !$anuncio->comprovante_manutencao?'selected':'' :'' }}>Não possuo</option>
            </select>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="estuda_troca">Estuda troca?</label>
            <select class="form-control" name="estuda_troca" id="estuda_troca" required>
              <option value="">Selecione uma opção...</option>
              <option value="1" {{ isset($anuncio)? $anuncio->estuda_troca?'selected':'' :'' }}>Sim, pretendo realizar a troca</option>
              <option value="0" {{ isset($anuncio)? !$anuncio->estuda_troca?'selected':'' :'' }}>Não pretendo realizar a troca</option>
            </select>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="estuda_troca">Possui laudo cautelar?</label>
            <select class="form-control" name="laudo_cautelar" id="laudo_cautelar" required>
              <option value="">Selecione uma opção...</option>
              <option value="1" {{ isset($anuncio)? $anuncio->laudo_cautelar?'selected':'' :'' }}>Sim, possuo laudor cautelar</option>
              <option value="0" {{ isset($anuncio)? !$anuncio->laudo_cautelar?'selected':'' :'' }}>Não possuo laudo cautelar</option>
            </select>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="combustivel">Combustível</label>
            <select id="combustivel" name="combustivel" class="form-control" required="required">
              <option value="">Selecione o combustível...</option>
              <option value="Gasolina" {{ isset($anuncio)? $anuncio->combustivel =='Gasolina' ? 'selected':'' :'' }}>Gasolina</option>
              <option value="Alcool" {{ isset($anuncio)? $anuncio->combustivel =='Alcool' ? 'selected':'' :'' }}>Alcool</option>
              <option value="Diesel" {{ isset($anuncio)? $anuncio->combustivel =='Diesel' ? 'selected':'' :'' }}>Diesel</option>
              <option value="Flex" {{ isset($anuncio)? $anuncio->combustivel =='Flex' ? 'selected':'' :'' }}>Flex</option>
              <option value="Hibrido" {{ isset($anuncio)? $anuncio->combustivel =='Híbrido' ? 'selected':'' :'' }}>Híbrido</option>
              <option value="Gás natural" {{ isset($anuncio)? $anuncio->combustivel =='Gás natural' ? 'selected':'' :'' }}>Gás natural</option>
              <option value="Elétrico" {{ isset($anuncio)? $anuncio->combustivel =='Elétrico' ? 'selected':'' :'' }}>Elétrico</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="cor">Cor</label>
            <input type="text" name="cor" value="{{ old('cor')? old('cor'): isset($anuncio)? $anuncio->cor:'' }}" class="form-control" id="cor" placeholder="Digite o nome da cor" required="required">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="cor">Portas</label>
            <input type="number" class="form-control" value="{{ old('portas')? old('portas'): isset($anuncio)? $anuncio->portas:'' }}" name="portas" id="portas" placeholder="Digite o número de portas" required="required">
          </div>
        </div>
      </div>
    </section>
    <h3>Adicionais do veículo</h3>
    <section>
      <h3>O meu veículo tem (selecione):</h3>
      <div class="d-flex flex-row bd-highlight mb-3 flex-wrap">
        @foreach($opcionais as $key => $op)
        <div class="p-2 bd-highlight">
          <div class="form-group">
            <div class="custom-control custom-checkbox">
              <input {{ isset($anuncio)? $anuncio->anuncio_dados->contains($op)? 'checked':'' : '' }}
                type="checkbox" class="custom-control-input" id="opicional_{{$key}}" name="opcionais[]" value="{{$op}}">
              <label class="custom-control-label" for="opicional_{{$key}}">
                {{ $op }}
              </label>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </section>
    <h3>Descrição</h3>
    <section>
      <h3>Fale sobre o seu veículo</h3>
      <div class="row">
        <div class="col-sm-12">
          <div class="form-group">
            <textarea class="form-control" name="descricao" rows="8" placeholder="Conte nos sobre o seu veículo...">
              @if(old('descricao'))
                {{ old('descricao') }}
              @else
                @isset($anuncio)
                  {{ $anuncio->descricao }}
                @endisset
              @endif
            </textarea>
          </div>
        </div>
      </div>
    </section>
    <h3>Imagens e video</h3>
    <section>
      <h3>Selecione as imagens do seu anúncio (Maximo 12):</h3>
      <div class="col-sm-12">
        @isset($anuncio)
          @foreach($anuncio->anuncio_imagens as $a)
          <div id="dropzone" class="row mt-3 mb-3 box">
            <div class="dz-details">
              <div class="dz-filename">
                <span data-dz-name="" class="badge badge-primary">Imagem do anúncio</span>
              </div>
              <img data-dz-thumbnail="" alt="Imagem do anúncio" src="{{ Storage::url($a->imagems->url) }}">
              <button type="button" class="excluir_imagem btn btn-danger">Excluir</button>
            </div>
          </div>
          @endforeach
        @endisset
      </div>
      <div class="row">
        <div class="col-sm-12">
          <button class="btn btn-primary" onclick="drop_anuncio.click()" type="button" name="button">Selecionar imagem...</button>
        </div>
        <div class="form-group">
          <label for="video">Você também pode inserir um vídeo:</label>
          <input class="form-control" type="text" name="video" id="video"
            value="{{ old('video')? old('video'): isset($anuncio) ? isset($anuncio->video->url)?$anuncio->video->url:'':'' }}" placeholder="Insira a url do seu vídeo">
        </div>
      </div>
    </section>
    @isset($anuncio)

    @else
    <h3>Pagamento</h3>
    <section>
      @include('elements.anuncios.selecionar_pagamento')
      @if ($errors->has('g-recaptcha-response'))
      <span class="help-block">
          <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
      </span>
      @endif
      <div class="form-group">
        {!! NoCaptcha::display() !!}
      </div>
    </section>
    @endisset
  </div>
</form>
<script type="text/javascript" src="{{asset('js/anuncio/pagseguro.js')}}"></script>
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
<script type="text/javascript">
var form = $("#anunciar");
form.validate({
  errorPlacement: function errorPlacement(error, element) { element.before(error); },
  rules: {
    confirm: {
      equalTo: "#password"
    }
  },
  messages: {
    marca: "Você precisa selecionar uma marca",
    modelo: "Você precisa selecionar o modelo",
    versao: "Você precisa selecionar a versão",
    ano: "Preencha com o ano do veículo",
    km: "Este campo precisa ser preenchido",
    valor: 'Digite o valor',
    cambio: 'Informe o câmbio do veículo',
    combustivel: 'Informe o tipo de combustível',
    cor: 'Informe a cor do veículo',
    portas: 'Informe o número de portas',
    descricao: 'Você precisa descrever o seu anúncio',
    ano_modelo: 'Informa o ano do modelo',
    unicodono: 'Informe se o veículo é único dono',
    usado: 'O veículo é usado?',
    blindagem: 'Selecione uma opção de blindagem',
    manual: 'Você tem o manual do veículo?',
    chave_reserva: 'Você tem uma chave reserva?',
    comprovante_manutencao: 'Você tem um comprovante de manutenção?',
    estuda_troca: 'Você estuda trocar o veículo?',
    laudo_cautelar: 'Possui o laudo cautelar?'
  }
});
/*form.validator.setDefaults({

});*/
form.children("div").steps({
  headerTag: "h3",
  bodyTag: "section",
  transitionEffect: "slideLeft",
  labels:{
    next: 'Próximo',
    previous: 'Anterior',
    cancel: "Cancelar",
    current: "Etapa:",
    pagination: "Paginação",
    finish: "Concluir",
    loading: "Carregando..."
  },
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
    $('#anunciar').submit();
  }
});
</script>

<script type="text/javascript">
$(document).ready(function(){
  if({{!Auth::user()->endereco}}){
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

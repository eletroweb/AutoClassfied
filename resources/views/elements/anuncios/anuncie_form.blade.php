<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <form class="dropzone" method="post" id="qq-form" action="{{route('anuncieStore')}}"  enctype="multipart/form-data">
        {{csrf_field()}}
        <h2>Informações básicas</h2>
        <hr>
        <div class="form-group">
          <label for="titulo">Titulo do anúncio</label>
          <input type="text" class="form-control" name="nome" id="titulo" aria-describedby="tituloHelp" placeholder="O que você está anunciando?">
          <small id="tituloHelp" class="form-text text-muted">Seja objetivo, o título será exibido na listagem dos veículos.</small>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="veiculo">Marca</label>
              <select class="form-control select2" name="marca" id="marca">
                <option value="">Selecione a marca...</option>
              </select>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="veiculo">Modelo</label>
              <select class="form-control select2" name="modelo" id="modelo">
                <option value="">Selecione o modelo...</option>
              </select>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="veiculo">Versão</label>
              <select class="form-control select2" name="versao" id="versao">
                <option value="">Selecione a marca...</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="valor">Valor</label>
              <input type="text" class="form-control" name="valor" id="valor" aria-describedby="valorHelp" placeholder="Digite o preço">
              <small id="valorHelp" class="form-text text-muted">Este preço será exibido no anúncio</small>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="ano">Ano</label>
              <input type="text" class="form-control" name="ano" id="ano" aria-describedby="anoHelp" placeholder="Digite o ano do veículo">
              <small id="anoHelp" class="form-text text-muted">O ano será exibido no anúncio</small>
            </div>
          </div>
        </div>
        <input type="hidden" name="user" value="{{Auth::user()->id}}">
        <div class="form-group">
          <label for="descricao">Descrição</label>
          <textarea class="form-control" name="descricao" id="descricao" rows="3" placeholder="Descreve detalhadamento o que você está anunciando"></textarea>
          <small id="descricaoHelp" class="form-text text-muted">Seja objetivo, o título será exibido na listagem dos veículos.</small>
        </div>
        <div class="form-group">
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="moto" name="moto" value="true">
            <label class="custom-control-label" for="moto">
              Estou anunciando uma motocicleta
            </label>
          </div>
        </div>
        <div class="row">
        @foreach(App\AnuncioField::all() as $field)
        <div class="form-group col-sm-6">
          <label for="{{$field->nome_prog}}">{{$field->nome}}</label>
          <input type="{{$field->type}}" class="form-control" id="{{$field->nome_prog}}" name="{{$field->nome_prog}}" aria-describedby="{{$field->nome_prog}}Help"
                 placeholder="{{$field->place_holder}}" {{ $field->type=='number'? "step=$field->step" : '' }} >
          <small id="{{$field->nome_prog}}Help" class="form-text text-muted">{{$field->helpText}}</small>
        </div>
        @endforeach
        </div>
        <h2>Informações adicionais e imagens</h2>
        <hr>
        <div class="card">
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
        <div class="card mt-2">
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
        <div class="row">
          <div class="col-sm-12 mt-3 mb-3">
            @include('elements.form.dropzone')
          </div>
        </div>
        <!--<div class="form-group">
          <label for="img_principal">Imagem principal:</label>
          <input type="file" class="form-control-file" name="img_principal" id="img_principal" required>
        </div>
        <div class="form-group">
          <label for="">Mais imagens:</label>
          <input type="file" class="form-control-file img-filter mb-2" name="imagens[]">
          <input type="file" class="form-control-file img-filter mb-2" name="imagens[]">
          <input type="file" class="form-control-file img-filter mb-2" name="imagens[]">
          <input type="file" class="form-control-file img-filter mb-2" name="imagens[]">
        </div>-->
        <button type="submit" class="btn btn-primary">Anunciar</button>
      </form>
    </div>
    <div class="col-sm-6">

    </div>
</div>
</div>

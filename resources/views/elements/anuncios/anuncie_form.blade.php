<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <form method="post" id="anunciar" action="{{route('anuncieStore')}}"  enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
          <label for="titulo">Titulo do anúncio</label>
          <input type="text" class="form-control" name="nome" id="titulo" aria-describedby="tituloHelp" placeholder="O que você está anunciando?">
          <small id="tituloHelp" class="form-text text-muted">Seja objetivo, o título será exibido na listagem dos veículos.</small>
        </div>
        <div class="form-group">
          <label for="veiculo">Marca</label>
          <select class="form-control" name="marca" id="marca">
            <option value="">Selecione a marca...</option>
          </select>
        </div>
        <div class="form-group">
          <label for="veiculo">Modelo</label>
          <select class="form-control" name="modelo" id="modelo">
            <option value="">Selecione o modelo...</option>
          </select>
        </div>
        <div class="form-group">
          <label for="veiculo">Versão</label>
          <select class="form-control" name="versao" id="versao">
            <option value="">Selecione a marca...</option>
          </select>
        </div>
        <div class="form-group">
          <label for="valor">Valor</label>
          <input type="text" class="form-control" name="valor" id="valor" aria-describedby="valorHelp" placeholder="Digite o preço">
          <small id="valorHelp" class="form-text text-muted">Este preço será exibido no anúncio</small>
        </div>
        <div class="form-group">
          <label for="ano">Ano</label>
          <input type="text" class="form-control" name="ano" id="ano" aria-describedby="anoHelp" placeholder="Digite o ano do veículo">
          <small id="anoHelp" class="form-text text-muted">O ano será exibido no anúncio</small>
        </div>
        <input type="hidden" name="user" value="{{Auth::user()->id}}">
        <div class="form-group">
          <label for="descricao">Descrição</label>
          <textarea class="form-control" name="descricao" id="descricao" rows="3" placeholder="Descreve detalhadamento o que você está anunciando"></textarea>
          <small id="descricaoHelp" class="form-text text-muted">Seja objetivo, o título será exibido na listagem dos veículos.</small>
        </div>
        @foreach(App\AnuncioField::all() as $field)
        <div class="form-group">
          <label for="{{$field->nome_prog}}">{{$field->nome}}</label>
          <input type="{{$field->type}}" class="form-control" id="{{$field->nome_prog}}" name="{{$field->nome_prog}}" aria-describedby="{{$field->nome_prog}}Help"
                 placeholder="{{$field->place_holder}}" {{ $field->type=='number'? "step=$field->step" : '' }} >
          <small id="{{$field->nome_prog}}Help" class="form-text text-muted">{{$field->helpText}}</small>
        </div>
        @endforeach
        <div class="form-group">
          <label for="img_principal">Imagem principal:</label>
          <input type="file" class="form-control-file" name="img_principal" id="img_principal" required>
        </div>
        <div class="form-group">
          <label for="">Mais imagens:</label>
          <input type="file" class="form-control-file img-filter mb-2" name="imagens[]">
          <input type="file" class="form-control-file img-filter mb-2" name="imagens[]">
          <input type="file" class="form-control-file img-filter mb-2" name="imagens[]">
          <input type="file" class="form-control-file img-filter mb-2" name="imagens[]">
        </div>
        <button type="submit" class="btn btn-primary">Anunciar</button>
      </form>
    </div>
    <div class="col-sm-6">

    </div>
</div>
</div>

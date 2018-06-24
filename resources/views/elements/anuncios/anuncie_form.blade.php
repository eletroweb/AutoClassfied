<div class="container">
  <div class="row">
    <div class="col-sm-6">
      @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
      @endif
      <form method="post" action="{{route('anuncieStore')}}">
        {{csrf_field()}}
        <div class="form-group">
          <label for="titulo">Titulo do anúncio</label>
          <input type="text" class="form-control" name="nome" id="titulo" aria-describedby="tituloHelp" placeholder="O que você está anunciando?">
          <small id="tituloHelp" class="form-text text-muted">Seja objetivo, o título será exibido na listagem dos veículos.</small>
        </div>
        <input type="hidden" name="veiculo" value="0">
        <input type="hidden" name="valor" value="100">
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
        <button type="submit" class="btn btn-primary">Anunciar</button>
      </form>
    </div>
    <div class="col-sm-6">

    </div>
</div>
</div>

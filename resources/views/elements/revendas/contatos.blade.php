<div class="col-sm-12">
  @forelse($revenda->contatosAnuncios() as $contato)
  <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{$contato->contatante}} enviou um contato no anúncio <b>{{$contato->nome}}</b></h5>
        <p class="card-text"><b>{{$contato->telefone}}</b></p>
        <p class="card-text">"{{$contato->mensagem}}"</p>
        <small class="form-text text-muted">
          {{Carbon\Carbon::parse($contato->realizado_em)->format('d/m/Y H:i')}}
        </small>
        <!--<a href="#" class="btn btn-primary">Go somewhere</a>-->
      </div>
  </div>
  @empty
  <div class="card">
    <div class="card-body">
      Nenhum contato realizado até o momento.
    </div>
  </div>
  @endforelse
</div>

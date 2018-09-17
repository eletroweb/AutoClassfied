<div class="col-sm-12">
  @php
    $contatos = $revenda->contatosAnuncios();
  @endphp
  @forelse($contatos as $contato)
  <div class="card mb-1">
      <div class="card-body">
        <h5 class="card-title"><b>{{$contato->contatante}} enviou um contato no anúncio {{$contato->nome}}</b></h5>
        <p class="card-text">{{$contato->telefone}}</p>
        <p class="card-text">"{{$contato->mensagem}}"</p>
        <hr>
        <div class="row">
          @if($contato->contato_whatsapp)
          <div class="col-sm-4">
            <b>Deseja ser contatado via WhatsApp</b>
          </div>
          @endif
          @if($contato->desejo_financiamento)
          <div class="col-sm-4">
            <b>Deseja comprar veículo por financiamento</b>
          </div>
          @endif
          @if($contato->veiculo_troca)
          <div class="col-sm-4">
            <b>Deseja utilizar um outro veículo na negociação</b>
          </div>
          @endif
        </div>
        <small class="form-text text-muted">
          {{Carbon\Carbon::parse($contato->realizado_em)->format('d/m/Y H:i')}}
        </small>
        <!--<a href="#" class="btn btn-primary">Go somewhere</a>-->
      </div>
  </div>
  {{$contatos->links()}}
  @empty
  <div class="card">
    <div class="card-body">
      Nenhum contato realizado até o momento.
    </div>
  </div>
  @endforelse
</div>

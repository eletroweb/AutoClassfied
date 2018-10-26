@extends('admin.index')
@section('content')
<div class="row">
  <div class="col-lg-12">
  	<div class="card">
  		<div class="card-close"></div>
  		<div class="card-header"><h3 class="h4">Procurar por e-mail ou titulo do anúncio</h3></div>
  		<div class="card-body">
  			<form>
  				<div class="input-group mb-3">
				  <input type="text" class="form-control" name="s" placeholder="Procurar por anúncio" aria-label="Procurar por anúncio" aria-describedby="button-addon2">
				  <div class="input-group-append">
				    <button class="btn btn-outline-primary" type="submit" id="button-addon2">Pesquisar</button>
				  </div>
				</div>	
  			</form>
  		</div>
  	</div>
  </div>
  <div class="col-lg-12">
    <div class="card">
      <div class="card-close">
      </div>
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Contatos de anúncios</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Mensagem</th>
                <th>Telefone</th>
                <th>Anúncio</th>
                <th>Contato WhatsApp</th>
                <th>Financiamento</th>
                <th>Trocar por veículo</th>
              </tr>
            </thead>
            <tbody>
              @foreach($contatos as $c)
                  <tr>
                      <td>{!! $c->nome !!}</td>
                      <td>{!! $c->email !!}</td>
                      <td><button onclick="showModalMessage('{{str_replace('\n', '\\', $c->mensagem)}}')" class="btn btn-info">Ver</button></td>
                      <td>{!! $c->telefone !!}</td>
                      <td><a class="btn btn-info" target="_blank" href="{{ App\Anuncio::find($c->anuncio)->getUrl() }}">Ver</a></td>
                      <td>{!! $c->contato_whatsapp? 'Sim':'Não'!!}</td>
                      <td>{!! $c->desejo_financiamento? 'Sim':'Não' !!}</td>
                      <td>{!! $c->veiculo_troca? 'Sim':'Não' !!}</td>
                  </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
{{$contatos->links()}}
<!-- Modal -->
<div class="modal fade" id="modalMessage" tabindex="-1" role="dialog" aria-labelledby="modalMessageLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalMessageLabel">Mensagem contato</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="messageModal">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
@endsection
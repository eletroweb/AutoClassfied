@extends('admin.index')
@section('content')
<div class="row">
  <div class="col-lg-12">
  	<div class="card">
  		<div class="card-close"></div>
  		<div class="card-header"><h3 class="h4">Procurar por e-mail</h3></div>
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
        <h3 class="h4">Fale conosco</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>Celular</th>
                <th>Assunto</th>
                <th>Mensagem</th>
              </tr>
            </thead>
            <tbody>
              @forelse($contatos as $c)
                  <tr>
                      <td>{!! $c->nome !!}</td>
                      <td>{!! $c->email !!}</td>
                      <td>{!! $c->cpf !!}</td>
                      <td>{!! $c->telefone !!}</td>
                      <td>{!! $c->celular !!}</td>
                      <td>{!! $c->assunto !!}</td>
                      <td><button class="showModalMessage btn btn-info" text="{{$c->mensagem}}" class="btn btn-info">Ver</button></td>
                  </tr>
              @empty
                <tr>
                  <td colspan="6">
                    <label>Nenhum contato encontrado.</label>    
                  </td>
                </tr>
              @endforelse
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

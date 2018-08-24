<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-close">
        <div class="dropdown">
          <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
          <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="/admin/marcas/create" class="dropdown-item"> <i class="fa fa-clone"></i>Criar novo(a)</a></div>
        </div>
      </div>
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Revendas</h3>
      </div>
      <div class="card-body">
        <table class="table table-responsive" id="revendas-table">
            <thead>
                <tr>
                    <th>Razaosocial</th>
                    <th>Nomefantasia</th>
                    <th>Cnpj</th>
                    <th>User</th>
                    <th>Ativo</th>
                    <th>Endereco</th>
                    <th>Destaques</th>
                    <th colspan="3">Ações</th>
                </tr>
            </thead>
            <tbody>
            @foreach($revendas as $revenda)
                <tr>
                    <td>{!! $revenda->razaosocial !!}</td>
                    <td>{!! $revenda->nomefantasia !!}</td>
                    <td>{!! $revenda->cnpj !!}</td>
                    <td>{!! $revenda->user !!}</td>
                    <td>{!! $revenda->ativo !!}</td>
                    <td>{!! $revenda->endereco !!}</td>
                    <td>{!! $revenda->destaques !!}</td>
                    <td>
                        {!! Form::open(['route' => ['revendas.destroy', $revenda->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{!! route('revendas.show', [$revenda->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                            <a href="{!! route('revendas.edit', [$revenda->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
      </div>
    </div>

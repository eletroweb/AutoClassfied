<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-close">
        <div class="dropdown">
          <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
          <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="/admin/planos/create" class="dropdown-item"><i class="fa fa-clone"></i>Criar novo(a)</a></div>
        </div>
      </div>
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Planos</h3>
      </div>
      <div class="card-body">
<table class="table table-responsive" id="planos-table">
    <thead>
        <tr>
            <th>Nome</th>
        <th>Descricao</th>
        <th>Anuncios</th>
        <th>Preço</th>
            <th colspan="3">Ações</th>
        </tr>
    </thead>
    <tbody>
    @foreach($planos as $plano)
        <tr>
            <td>{!! $plano->nome !!}</td>
            <td>{!! $plano->descricao !!}</td>
            <td>{!! $plano->anuncios !!}</td>
            <td>R${!! $plano->preco !!}</td>
            <td>
              {!! Form::open(['route' => ['planos.destroy', $plano->id], 'method' => 'delete']) !!}
              <div class='btn-group'>
                  <a href="{!! route('planos.edit', [$plano->id]) !!}" class='btn btn-default btn-xs'><i class="fas fa-edit"></i></a>
                  {!! Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Deseja realmente excluir?')"]) !!}
              </div>
              {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
</div>
</div>
</div>
</div>

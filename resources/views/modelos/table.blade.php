<div class="row">
  <div class="col-lg-6">
    <div class="card">
      <div class="card-close">
        <div class="dropdown">
          <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
          <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="/admin/modelos/create" class="dropdown-item "><i class="fa fa-clone"></i>Criar novo(a)</a></div>
        </div>
      </div>
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Marcas</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Nome</th>
                <th>Marca</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
              @foreach($modelos as $modelo)
                <tr>
                    <td>{!! $modelo->nome !!}</td>
                    <td>{!! App\Marca::find($modelo->marca)->nome !!}</td>
                    <td>
                        {!! Form::open(['route' => ['modelos.destroy', $modelo->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{!! route('modelos.edit', [$modelo->id]) !!}" class='btn btn-default btn-xs'><i class="fas fa-edit"></i></a>
                            {!! Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
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
{{$modelos->links()}}

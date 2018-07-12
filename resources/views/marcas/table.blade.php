<div class="row">
  <div class="col-sm-6 m-auto">
    <form class="form-inline">
      <div class="input-group mb-3">
        <input type="text" name="s" class="form-control" placeholder="Digite o nome da marca" aria-label="Digite o nome da marca" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="submit">Procurar</button>
        </div>
      </div>
    </form>
  </div>
  <div class="col-sm-12 m-auto">
     <table class="table table-responsive" id="marcas-table">
        <thead>
            <tr>
                <th>Nome</th>
                <th colspan="3">Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach($marcas as $marca)
            <tr>
                <td>{!! $marca->nome !!}</td>
                <td>
                    {!! Form::open(['route' => ['marcas.destroy', $marca->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('marcas.show', [$marca->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('marcas.edit', [$marca->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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

{{$marcas->links()}}

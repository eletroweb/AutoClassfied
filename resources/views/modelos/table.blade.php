<table class="table table-responsive" id="modelos-table">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Marca</th>
            <th colspan="3">Ações</th>
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
                    <a href="{!! route('modelos.show', [$modelo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('modelos.edit', [$modelo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{$modelos->links()}}

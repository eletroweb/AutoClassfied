<table class="table table-responsive" id="modelos-table">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Marca</th>
            <th colspan="3">Ações</th>
        </tr>
    </thead>
    <tbody>
    @foreach($modelos as $modelos)
        <tr>
            <td>{!! $modelos->nome !!}</td>
            <td>{!! App\Marca::find($modelos->marca)->nome !!}</td>
            <td>
                {!! Form::open(['route' => ['modelos.destroy', $modelos->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('modelos.show', [$modelos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('modelos.edit', [$modelos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
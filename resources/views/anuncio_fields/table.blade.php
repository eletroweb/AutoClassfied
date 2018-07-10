<table class="table table-responsive" id="anuncioFields-table">
    <thead>
        <tr>
            <th>Nome</th>
        <th>Meta Nome</th>
        <th>Type</th>
        <th>Place Holder</th>
        <th>Step</th>
        <th>Helptext</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($anuncioFields as $anuncioField)
        <tr>
            <td>{!! $anuncioField->nome !!}</td>
            <td>{!! $anuncioField->meta_nome !!}</td>
            <td>{!! $anuncioField->type !!}</td>
            <td>{!! $anuncioField->place_holder !!}</td>
            <td>{!! $anuncioField->step !!}</td>
            <td>{!! $anuncioField->helpText !!}</td>
            <td>
                {!! Form::open(['route' => ['anuncioFields.destroy', $anuncioField->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('anuncioFields.show', [$anuncioField->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('anuncioFields.edit', [$anuncioField->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
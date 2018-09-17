<table class="table table-responsive" id="newsletterUsers-table">
    <thead>
        <tr>
            <th>Email</th>
        <th>Nome</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($newsletterUsers as $newsletterUser)
        <tr>
            <td>{!! $newsletterUser->email !!}</td>
            <td>{!! $newsletterUser->nome !!}</td>
            <td>
                {!! Form::open(['route' => ['newsletterUsers.destroy', $newsletterUser->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('newsletterUsers.show', [$newsletterUser->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('newsletterUsers.edit', [$newsletterUser->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
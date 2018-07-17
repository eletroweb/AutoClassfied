<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-close">
        <div class="dropdown">
          <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
          <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"><i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"><i class="fa fa-gear"></i>Edit</a></div>
        </div>
      </div>
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Usuários</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Email</th>
              <th colspan="3">Ações</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
            <tr>
              <td>{!! $user->name !!}</td>
              <td>{!! $user->email !!}</td>
              <td>
                {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                  <a href="{!! route('users.edit', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="fas fa-edit"></i></a>
                  {!! Form::button('<i class="fa fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Tem certeza que deseja excluir?')"]) !!}
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
{{$users->links()}}

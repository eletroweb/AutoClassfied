<div class="row">
  <div class="col-lg-6">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">E-mails</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table" id="newsletterUsers-table">
            <thead>
              <tr>
                <th>E-mail</th>
                <th>Nome</th>
                <th>Ações</th>
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

                              <a href="{!! route('newsletterUsers.edit', [$newsletterUser->id]) !!}" class='btn btn-default btn-xs'><i class="fas fa-edit"></i></a>
                              {!! Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Tem certeza que deseja excluir?')"]) !!}
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
{{$newsletterUsers->links()}}

<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-close">
        <div class="dropdown">
          <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
          <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
        </div>
      </div>
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Campos personalizados</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
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
                              <a href="{!! route('anuncioFields.edit', [$anuncioField->id]) !!}" class='btn btn-default btn-xs'><i class="fas fa-edit"></i></a>
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

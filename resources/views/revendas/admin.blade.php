@extends('admin.index')
@section('content')
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
        <h3 class="h4">Importação de revenda</h3>
      </div>
      <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form method="post" action="/admin/revenda/import">
          {{csrf_field()}}
          <div class="form-group">
            <label for="cnpj">CNPJ</label>
            <input type="text" name="cnpj" value="" placeholder="Digite o CNPJ (Sem pontos ou traços)" class="form-control">
          </div>
          <button type="submit" class="btn btn-primary">Importar</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@extends('admin.index')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-close">
      <div class="dropdown">
        <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
        <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
      </div>
    </div>
    <div class="card-header d-flex align-items-center">
      <h3 class="h4">Modelos</h3>
    </div>
    <div class="card-body">
  {!! Form::open(['route' => 'modelos.store']) !!}
      {{csrf_field()}}
      @include('modelos.fields')

  {!! Form::close() !!}
  </div>
  </div>
</div>
@endsection

@extends('admin.index')

@section('content')
<div class="container-fluid">
  <div class="container">
    <div class="card">
      <div class="card-close">
        <div class="dropdown">
          <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
          <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
        </div>
      </div>
      <div class="card-header d-flex align-items-center">
        <h3 class="h4"> Transaction</h3>
      </div>
      <div class="card-body">
               {!! Form::model($transaction, ['route' => ['transactions.update', $transaction->id], 'method' => 'patch']) !!}

                    @include('transactions.fields')

               {!! Form::close() !!}
           </div>
       </div>
    </div>
</div>
@endsection

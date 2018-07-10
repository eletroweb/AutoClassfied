@extends('admin.dashboard')

@section('subcontent')
    <section class="content-header">
        <h1>
            Versao
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($versao, ['route' => ['versaos.update', $versao->id], 'method' => 'patch']) !!}

                        @include('versaos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection

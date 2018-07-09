@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Modelos
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($modelos, ['route' => ['modelos.update', $modelos->id], 'method' => 'patch']) !!}

                        @include('modelos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
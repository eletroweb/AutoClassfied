@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Anúncios - Campos personalizados
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($anuncioField, ['route' => ['anuncioFields.update', $anuncioField->id], 'method' => 'patch']) !!}

                        @include('anuncio_fields.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection

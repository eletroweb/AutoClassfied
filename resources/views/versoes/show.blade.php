@extends('admin.dashboard')

@section('subcontent')
    <section class="content-header">
        <h1>
            Versao
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('versoes.show_fields')
                    <a href="{!! route('versoes.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $versao->id !!}</p>
</div>

<!-- Nome Field -->
<div class="form-group">
    {!! Form::label('nome', 'Nome:') !!}
    <p>{!! $versao->nome !!}</p>
</div>

<!-- Modelo Field -->
<div class="form-group">
    {!! Form::label('modelo', 'Modelo:') !!}
    <p>{!! $versao->modelo !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $versao->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $versao->updated_at !!}</p>
</div>


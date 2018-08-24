<!-- Razaosocial Field -->
<div class="form-group col-sm-6">
    {!! Form::label('razaosocial', 'Razaosocial:') !!}
    {!! Form::text('razaosocial', null, ['class' => 'form-control']) !!}
</div>

<!-- Nomefantasia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomefantasia', 'Nomefantasia:') !!}
    {!! Form::text('nomefantasia', null, ['class' => 'form-control']) !!}
</div>

<!-- Cnpj Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cnpj', 'Cnpj:') !!}
    {!! Form::text('cnpj', null, ['class' => 'form-control']) !!}
</div>

<!-- User Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user', 'User:') !!}
    {!! Form::number('user', null, ['class' => 'form-control']) !!}
</div>

<!-- Ativo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ativo', 'Ativo:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('ativo', false) !!}
        {!! Form::checkbox('ativo', '1', null) !!} 1
    </label>
</div>

<!-- Endereco Field -->
<div class="form-group col-sm-6">
    {!! Form::label('endereco', 'Endereco:') !!}
    {!! Form::number('endereco', null, ['class' => 'form-control']) !!}
</div>

<!-- Destaques Field -->
<div class="form-group col-sm-6">
    {!! Form::label('destaques', 'Destaques:') !!}
    {!! Form::number('destaques', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('revendas.index') !!}" class="btn btn-default">Cancel</a>
</div>

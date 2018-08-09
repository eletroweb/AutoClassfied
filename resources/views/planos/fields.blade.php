<!-- Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
</div>

<!-- Descricao Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('descricao', 'Descricao:') !!}
    {!! Form::textarea('descricao', null, ['class' => 'form-control']) !!}
</div>

<!-- Anuncios Field -->
<div class="form-group col-sm-4">
    {!! Form::label('anuncios', 'Anuncios destacados:') !!}
    {!! Form::number('anuncios', null, ['class' => 'form-control']) !!}
</div>

<!-- Preco Field -->
<div class="form-group col-sm-4">
    {!! Form::label('preco', 'Preco:') !!}
    {!! Form::text('preco', null, ['class' => 'form-control valor']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Criar plano', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('planos.index') !!}" class="btn btn-default">Cancelar</a>
</div>

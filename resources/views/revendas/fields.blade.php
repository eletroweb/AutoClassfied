<!-- Razaosocial Field -->
<div class="form-group col-sm-6">
    {!! Form::label('razaosocial', 'Razaosocial:') !!}
    {!! Form::text('razaosocial', null, ['class' => 'form-control']) !!}
    @if ($errors->has('razaosocial'))
        <span class="help-block">
            <strong>{{ $errors->first('razaosocial') }}</strong>
        </span>
    @endif
</div>

<!-- Nomefantasia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomefantasia', 'Nomefantasia:') !!}
    {!! Form::text('nomefantasia', null, ['class' => 'form-control']) !!}
    @if ($errors->has('nomefantasia'))
        <span class="help-block">
            <strong>{{ $errors->first('nomefantasia') }}</strong>
        </span>
    @endif
</div>

<!-- Cnpj Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cnpj', 'Cnpj:') !!}
    {!! Form::text('cnpj', null, ['class' => 'form-control']) !!}
    @if ($errors->has('cnpj'))
        <span class="help-block">
            <strong>{{ $errors->first('cnpj') }}</strong>
        </span>
    @endif
</div>

<!-- User Field -->
<div class="form-group col-sm-6">
  <label for="usuario">Usuário:</label>
  <input class="form-control" type="text" id="usuario" value="{{isset($revenda)?$revenda->usuario->name:''}}" disabled>
  @if ($errors->has('user'))
      <span class="help-block">
          <strong>{{ $errors->first('user') }}</strong>
      </span>
  @endif
</div>

<!-- Destaques Field -->
<div class="form-group col-sm-6">
    {!! Form::label('destaques', 'Destaques:') !!}
    {!! Form::number('destaques', null, ['class' => 'form-control']) !!}
    @if ($errors->has('destaques'))
        <span class="help-block">
            <strong>{{ $errors->first('destaques') }}</strong>
        </span>
    @endif
</div>

<input type="hidden" name="user" value="{{isset($revenda)?$revenda->usuario->id:''}}">

<!-- User Field -->
<!--<div class="form-group col-sm-6">
    {!! Form::label('user', 'User:') !!}
    {!! Form::number('user', null, ['class' => 'form-control']) !!}
</div>-->

<!-- Ativo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ativo', 'Ativo:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('ativo', false) !!}
        {!! Form::checkbox('ativo', '1', null) !!} Sim
    </label>
</div>

<h2>Endereço</h2>
<hr>
<div class="col-sm-12">
  @include('enderecos.form', ['endereco'=> $revenda->end])
</div>

<!-- Endereco Field -->
<!--<div class="form-group col-sm-6">
    {!! Form::label('endereco', 'Endereco:') !!}
    {!! Form::number('endereco', null, ['class' => 'form-control']) !!}
</div>-->

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('revendas.index') !!}" class="btn btn-default">Cancelar</a>
</div>

<!-- Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
</div>

<!-- Marca Field -->
<div class="form-group col-sm-6">
    {!! Form::label('marca', 'Marca:') !!}
    <select class="form-control" name="marca" required>
      <option value="">Selecione a marca...</option>
      @foreach($marcas as $m)
        <option value="{{$m->id}}">{{$m->nome}}</option>    
      @endforeach
    </select>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('modelos.index') !!}" class="btn btn-default">Cancel</a>
</div>

<!-- Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
</div>

<!-- Modelo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('modelo', 'Modelo:') !!}
    <select class="form-control" name="modelo" required>
      <option value="">Selecione o modelo...</option>
      @foreach($modelos as $m)
        <option value="{{$m->id}}">{{$m->nome}}</option>    
      @endforeach
    </select>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('versaos.index') !!}" class="btn btn-default">Cancel</a>
</div>

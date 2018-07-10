<!-- Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control', 'placeholder'=> 'Digite o nome que será exibido para o usuário', 'required']) !!}
</div>

<!-- Meta Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('meta_nome', 'Meta Nome:') !!}
    {!! Form::text('meta_nome', null, ['class' => 'form-control', 'placeholder' => 'Nome sem caracteres especiais e em minusculo.', 'required']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}
    <select class="form-control" name="type" required>
      <option value="">Selecione o tipo de campo...</option>
      <option value="text">Texto</option>
      <option value="number">Número</option>
      <option value="date">Data</option>
      <option value="datetime">Data e hora</option>
    </select>
</div>

<!-- Place Holder Field -->
<div class="form-group col-sm-6">
    {!! Form::label('placeholder', 'Place Holder:') !!}
    {!! Form::text('place_holder', null, ['class' => 'form-control',  'placeholder'=> 'Texto antes do usuário preencher', 'required']) !!}
</div>

<!-- Step Field -->
<div class="form-group col-sm-6">
    {!! Form::label('step', 'Step:') !!}
    {!! Form::number('step', '0.00', ['class' => 'form-control', 'required', 'step' => '0.00']) !!}
</div>

<!-- Helptext Field -->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('helpText', 'Helptext:') !!}
    {!! Form::text('helpText', null, ['class' => 'form-control', 'placeholder'=> 'Texto que ficará abaixo do campo']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Criar campo personalizado', ['class' => 'btn btn-primary']) !!}
</div>

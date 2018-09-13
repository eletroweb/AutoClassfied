<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', 'Code:') !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::date('date', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::number('type', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::number('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Lasteventdate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lasteventdate', 'Lasteventdate:') !!}
    {!! Form::date('lasteventdate', null, ['class' => 'form-control']) !!}
</div>

<!-- Grossamount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('grossamount', 'Grossamount:') !!}
    {!! Form::number('grossamount', null, ['class' => 'form-control']) !!}
</div>

<!-- Discountamount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('discountamount', 'Discountamount:') !!}
    {!! Form::number('discountamount', null, ['class' => 'form-control']) !!}
</div>

<!-- Feeamount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('feeamount', 'Feeamount:') !!}
    {!! Form::number('feeamount', null, ['class' => 'form-control']) !!}
</div>

<!-- Netamount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('netamount', 'Netamount:') !!}
    {!! Form::number('netamount', null, ['class' => 'form-control']) !!}
</div>

<!-- Extraamount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('extraamount', 'Extraamount:') !!}
    {!! Form::number('extraamount', null, ['class' => 'form-control']) !!}
</div>

<!-- Installmentcount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('installmentcount', 'Installmentcount:') !!}
    {!! Form::number('installmentcount', null, ['class' => 'form-control']) !!}
</div>

<!-- Itemcount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('itemcount', 'Itemcount:') !!}
    {!! Form::number('itemcount', null, ['class' => 'form-control']) !!}
</div>

<!-- Payment Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_code', 'Payment Code:') !!}
    {!! Form::number('payment_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Payment Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_type', 'Payment Type:') !!}
    {!! Form::number('payment_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('transactions.index') !!}" class="btn btn-default">Cancel</a>
</div>

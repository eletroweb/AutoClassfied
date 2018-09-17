<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $transactionItem->id !!}</p>
</div>

<!-- Pagseguro Id Field -->
<div class="form-group">
    {!! Form::label('pagseguro_id', 'Pagseguro Id:') !!}
    <p>{!! $transactionItem->pagseguro_id !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $transactionItem->description !!}</p>
</div>

<!-- Quantity Field -->
<div class="form-group">
    {!! Form::label('quantity', 'Quantity:') !!}
    <p>{!! $transactionItem->quantity !!}</p>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{!! $transactionItem->amount !!}</p>
</div>

<!-- Transaction Id Field -->
<div class="form-group">
    {!! Form::label('transaction_id', 'Transaction Id:') !!}
    <p>{!! $transactionItem->transaction_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $transactionItem->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $transactionItem->updated_at !!}</p>
</div>


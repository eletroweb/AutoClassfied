<table class="table table-responsive" id="transactionItems-table">
    <thead>
        <tr>
            <th>Pagseguro Id</th>
        <th>Description</th>
        <th>Quantity</th>
        <th>Amount</th>
        <th>Transaction Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($transactionItems as $transactionItem)
        <tr>
            <td>{!! $transactionItem->pagseguro_id !!}</td>
            <td>{!! $transactionItem->description !!}</td>
            <td>{!! $transactionItem->quantity !!}</td>
            <td>{!! $transactionItem->amount !!}</td>
            <td>{!! $transactionItem->transaction_id !!}</td>
            <td>
                {!! Form::open(['route' => ['transactionItems.destroy', $transactionItem->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('transactionItems.show', [$transactionItem->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('transactionItems.edit', [$transactionItem->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
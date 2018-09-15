<table class="table table-responsive" id="transactions-table">
    <thead>
        <tr>
            <th>Code</th>
        <th>Date</th>
        <th>Type</th>
        <th>Status</th>
        <th>Lasteventdate</th>
        <th>Grossamount</th>
        <th>Discountamount</th>
        <th>Feeamount</th>
        <th>Netamount</th>
        <th>Extraamount</th>
        <th>Installmentcount</th>
        <th>Itemcount</th>
        <th>Payment Code</th>
        <th>Payment Type</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($transactions as $transaction)
        <tr>
            <td>{!! $transaction->code !!}</td>
            <td>{!! $transaction->date !!}</td>
            <td>{!! $transaction->type !!}</td>
            <td>{!! $transaction->status !!}</td>
            <td>{!! $transaction->lasteventdate !!}</td>
            <td>{!! $transaction->grossamount !!}</td>
            <td>{!! $transaction->discountamount !!}</td>
            <td>{!! $transaction->feeamount !!}</td>
            <td>{!! $transaction->netamount !!}</td>
            <td>{!! $transaction->extraamount !!}</td>
            <td>{!! $transaction->installmentcount !!}</td>
            <td>{!! $transaction->itemcount !!}</td>
            <td>{!! $transaction->payment_code !!}</td>
            <td>{!! $transaction->payment_type !!}</td>
            <td>
                {!! Form::open(['route' => ['transactions.destroy', $transaction->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('transactions.show', [$transaction->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('transactions.edit', [$transaction->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
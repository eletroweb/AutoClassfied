<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-close">
        <div class="dropdown">
          
        </div>
      </div>
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Transações</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
          <thead>
            <tr>
             <tr>
              <th>Código</th>
              <th>Data</th>
              <th>Tipo</th>
              <th>Status</th>
              <th>Atualização</th>
              <th>Bruto</th>
              <th>Desconto</th>
              <th>Taxa</th>
              <th>Líquido</th>
              <th>Extra</th>
              <th>Parcelas</th>
              <th>Quantidade</th>
              <th>Bandeira</th>
              <th>Pagamento</th>
              <th colspan="3">Ações</th>
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
                    <a href="{!! route('transactions.edit', [$transaction->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Tem certeza que deseja excluir?')"]) !!}
                </div>
                {!! Form::close() !!}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>

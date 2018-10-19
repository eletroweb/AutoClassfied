<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-close">
        <div class="dropdown">
          <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
          <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="/admin/marcas/create" class="dropdown-item"> <i class="fa fa-clone"></i>Criar novo(a)</a></div>
        </div>
      </div>
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Revendas</h3>
      </div>
      <div class="card-body">
        <table class="table table-responsive" id="revendas-table">
            <thead>
                <tr>
                    <th>Razaosocial</th>
                    <th>Nomefantasia</th>
                    <th>Cnpj</th>
                    <th>E-mail</th>
                    <th>Ativo</th>
                    <th>Endereco</th>
                    <th>Destaques</th>
                    <th>Status</th>
                    <th colspan="3">Ações</th>

                </tr>
            </thead>
            <tbody>
            @foreach($revendas as $revenda)
                <tr>
                    <td>{!! $revenda->razaosocial !!}</td>
                    <td>{!! $revenda->nomefantasia !!}</td>
                    <td>{!! $revenda->cnpj !!}</td>
                    <td>{!! $revenda->usuario->email !!}</td>
                    <td>{!! $revenda->ativo?'Sim':'Não' !!}</td>
                    <td><button type="button" onclick="showEndereco('{{$revenda->end->logradouro}}', '{{$revenda->end->bairro}}',
                       '{{$revenda->end->cidade}}', '{{$revenda->end->uf}}', '{{$revenda->end->numero}}')" class="btn btn-info">Ver</button></td>
                    <td>{!! $revenda->destaques !!}</td>
                    <td>
                      <div class="form-check checkbox-slider--b-flat">
                        <label>
                          <input type="checkbox" id="status_{{$revenda->id}}" {{$revenda->ativo?'checked':''}}><span id="label_{{$revenda->id}}">.</span>
                        </label>
                      </div>
                      <script>
                        $(document).ready(function(){
                          $('#status_{{$revenda->id}}').change(function(){
                            $.ajax({
                              url: '/admin/revendas/desabilitar',
                              type: 'post',
                              dataType: 'json',
                              data: { revenda: '{{$revenda->id}}', _token: $('meta[name="csrf-token"]').attr('content') },
                              success: function(data){
                                alert(data);
                              }
                            });
                          });
                        });
                      </script>
                    </td>
                    <td>
                        {!! Form::open(['route' => ['revendas.destroy', $revenda->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{!! route('revendas.edit', [$revenda->id]) !!}" class='btn btn-default btn-xs'><i class="fas fa-edit"></i></a>
                            {!! Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Deseja realmente excluir?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
      </div>
      {{$revendas->links()}}
    </div>
    <!-- Modal -->
    <div class="modal fade" id="enderecoModal" tabindex="-1" role="dialog" aria-labelledby="enderecoModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="enderecoModalLabel">Endereço</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p id="endereco"></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          </div>
        </div>
      </div>
    </div>

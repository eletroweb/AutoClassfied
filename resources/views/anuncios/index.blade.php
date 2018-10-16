@extends('admin.index')
@section('content')
<div class="row">
  @include('elements.search')
  <div class="col-lg-12">
    <div class="card">
      <div class="card-close">
        <div class="dropdown">
          <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
          <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="/admin/marcas/create" class="dropdown-item"> <i class="fa fa-clone"></i>Criar novo(a)</a></div>
        </div>
      </div>
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Anúncios</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Titulo</th>
                <th>Usuário</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Versão</th>
                <th>Preço</th>
                <th>Ativo</th>
              </tr>
            </thead>
            <tbody>
              @foreach($anuncios as $anuncio)
                  <tr>
                      <td><a href="{{ $anuncio->getUrl() }}" target="_blank">{{ $anuncio->titulo }}</a></td>
                      <td>{{ $anuncio->users->name }}</td>
                      <td>{{ $anuncio->marcas->nome  }}</td>
                      <td>{{ $anuncio->modelos->nome  }}</td>
                      <td>{{ $anuncio->versaos->nome  }}</td>
                      <td>R${{ $anuncio->getValor() }}</td>
                      <td>
                        <div class="form-check checkbox-slider--b-flat">
                        	<label>
                        		<input type="checkbox" id="status_{{$anuncio->id}}" {{$anuncio->ativo?'checked':''}}><span id="label_{{$anuncio->id}}">.</span>
                        	</label>
                        </div>
                        <script>
                          $(document).ready(function(){
                            $('#status_{{$anuncio->id}}').change(function(){
                              $.ajax({
                                url: '/admin/anuncios/desabilitar',
                                type: 'post',
                                dataType: 'json',
                                data: { anuncio: '{{$anuncio->id}}', _token: $('meta[name="csrf-token"]').attr('content') },
                                success: function(data){
                                  alert(data);
                                }
                              });
                            });
                          });
                        </script>
                      </td>
                  </tr>
              @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  {{$anuncios->links()}}
</div>
@endsection

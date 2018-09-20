@extends('admin.index')
@section('content')
<div class="row">
  <div class="col-lg-12">
    @include('flash::message')
    <form action="{{route('option_update')}}" method="post">
      {{ csrf_field() }}
      <div class="card">
         <div class="card-header d-flex align-items-center">
           <h3 class="h4">Configurações do PagSeguro</h3>
         </div>
         <div class="card-body row">
           <div class="form-group col-sm-6">
             <label for="email">E-mail do PagSeguro</label>
             <input class="form-control" type="email" name="pagseguro_email" value="{{App\Option::getOptionValor('pagseguro_email')}}"
                    placeholder="Digite o e-mail do PagSeguro">
           </div>
           <div class="form-group col-sm-6">
             <label for="email">Digite o token do Pagseguro</label>
             <input class="form-control" type="text" name="pagseguro_token" value="{{App\Option::getOptionValor('pagseguro_token')}}"
                    placeholder="Digite o token do PagSeguro">
           </div>
           <div class="form-group col-sm-6">
             <label for="email">Endereço do PagSeguro</label>
             <input class="form-control" type="text" name="pagseguro_endereco" value="{{App\Option::getOptionValor('pagseguro_endereco')}}"
                    placeholder="Digite o endereço do pagseguro">
           </div>
           <div class="col-sm-12">
              <h3>Valores</h3>
              <hr>
           </div>
           <div class="form-group col-sm-4">
             <label for="email">Preço do anúncio particular</label>
             <input class="form-control" type="number" step="0.01" name="preco_anuncio" value="{{App\Option::getOptionValor('preco_anuncio')}}"
                    placeholder="Digite o preço">
           </div>
           <div class="col-sm-12">
             <button class="btn btn-primary" type="submit">Atualizar informações</button>
           </div>
         </div>
      </div>
    </form>
  </div>
</div>
@endsection

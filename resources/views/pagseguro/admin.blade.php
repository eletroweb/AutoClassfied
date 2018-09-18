@extends('admin.index')
@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
       <div class="card-header d-flex align-items-center">
         <h3 class="h4">Configurações do PagSeguro</h3>
       </div>
       <div class="card-body row">
         <div class="form-group col-sm-6">
           <label for="email">E-mail do PagSeguro</label>
           <input class="form-control" type="email" name="email_pagseguro" value="" placeholder="Digite o e-mail do PagSeguro">
         </div>
         <div class="form-group col-sm-6">
           <label for="email">Digite o token do Pagseguro</label>
           <input class="form-control" type="email" name="text" value="" placeholder="Digite o token do PagSeguro">
         </div>
         <div class="col-sm-12">
            <h3>Valores</h3>
            <hr>
         </div>
         <div class="form-group col-sm-4">
           <label for="email">Preço do anúncio particular</label>
           <input class="form-control" type="number" step="0.01" name="preco" value="" placeholder="Digite o preço">
         </div>
         <div class="col-sm-12">
           <button class="btn btn-primary" type="button" onclick="alert('Esta função está sendo testada')" name="button">Atualizar informações</button>
         </div>
       </div>
    </div>
  </div>
</div>
@endsection

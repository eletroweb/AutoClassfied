@extends('layouts.app')
@section('content')
<form>
<div class="row bg-primary mb-2">
  <div class="col-sm-12 p-2">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <h4 class="text-white pt-1">Ordenar pesquisa</h4>
        </div>
        <div class="col-sm-6">
          <div class="form-inline">
            <select class="form-control mr-2" name="paginate">
              <option value="10">10 anúncios por página</option>
              <option value="20">20 anúncios por página</option>
              <option value="30">30 anúncios por página</option>
              <option value="30">40 anúncios por página</option>
            </select>
            <select class="form-control" name="order">
              <option value="visualizacoes">Ordenar por relevância</option>
              <option value="created_at">Ordenar por data de criação</option>
            </select>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-3">
      <h5>Filtros</h5>
      <small class="text-muted">Personalize a busca aos anúncios</small>
    </div>
    <div class="col-sm-9">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="nome" placeholder="Digite o que está procurando" aria-label="Digite o que está procurando" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-outline-primary" type="submit">Procurar</button>
          </div>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-3">
        <ul class="nav flex-column">
         <li class="nav-item">
           <div class="card card-body">
             <div class="custom-control custom-checkbox">
               <input type="checkbox" class="custom-control-input" id="novos" name="usado[]" value="0"
                {{is_array(old('usado'))? in_array(0, old('usado')) ? ' checked' : ''  : 'checked'}}>
               <label class="custom-control-label" for="novos">Novos</label>
             </div>
             <div class="custom-control custom-checkbox">
               <input type="checkbox" class="custom-control-input" id="usados" name="usado[]" value="1" 
               {{is_array(old('usado'))? in_array(1, old('usado')) ? ' checked' : ''  : 'checked'}}>
               <label class="custom-control-label" for="usados">Usados</label>
             </div>
           </div>
         </li>
         <li class="nav-item">
           <div class="mt-2">
             <div class="card card-body">
               <div class="custom-control custom-checkbox">
                 <input type="checkbox" class="custom-control-input" id="moto" name="tipo[]" value="moto"
                  {{is_array(old('tipo'))? in_array('moto', old('tipo')) ? ' checked' : ''  : 'checked'}}>
                 <label class="custom-control-label" for="moto">Moto</label>
               </div>
               <div class="custom-control custom-checkbox">
                 <input type="checkbox" class="custom-control-input" id="carro" name="tipo[]" value="carro" 
                 {{is_array(old('tipo'))? in_array('carro', old('tipo')) ? ' checked' : ''  : 'checked'}}>
                 <label class="custom-control-label" for="carro">Carro</label>
               </div>
              </div>
           </div>
         </li>
         <li class="nav-item mt-2">
           <div class="card card-body">
             <div class="custom-control custom-checkbox">
               <input type="checkbox" class="custom-control-input" id="blindado" name="blindagem[]" value="1"
                {{is_array(old('blindagem'))? in_array(1, old('blindagem')) ? ' checked' : ''  : 'checked'}}>
               <label class="custom-control-label" for="novos">Com blindagem</label>
             </div>
             <div class="custom-control custom-checkbox">
               <input type="checkbox" class="custom-control-input" id="nao_blindado" name="blindagem[]" value="0" 
               {{is_array(old('blindagem'))? in_array(0, old('blindagem')) ? ' checked' : ''  : 'checked'}}>
               <label class="custom-control-label" for="usados">Sem blindagem</label>
             </div>
           </div>
         </li>
         <li class="nav-item mt-2">
           <div class="input-group">
             <div class="input-group-prepend">
               <span class="input-group-text">Preço</span>
             </div>
             <input type="text" aria-label="Máximo" placeholder="Máximo" name="valor_maximo" value="{{old('valor_maximo')}}" class="form-control valor">
             <input type="text" aria-label="Mínimo" placeholder="Mínimo" name="valor_minimo" value="{{old('valor_minimo')}}" class="form-control valor">
           </div>
         </li>
         <li class="nav-item mt-2">
           <div class="input-group">
             <div class="input-group-prepend">
               <span class="input-group-text">Ano</span>
             </div>
             <input type="number" aria-label="Máximo" placeholder="Máximo" name="ano_maximo" value="{{old('ano_maximo')}}" class="form-control">
             <input type="number" aria-label="Mínimo" placeholder="Mínimo" name="ano_minimo" value="{{old('ano_minimo')}}" class="form-control">
           </div>
         </li>
         <li class="nav-item mt-2">
           <div class="input-group">
             <div class="input-group-prepend">
               <span class="input-group-text">KM</span>
             </div>
             <input type="number" aria-label="Máximo" placeholder="Máximo" name="km_maximo" class="form-control"
              value="{{old('km_maximo')}}">
             <input type="number" aria-label="Mínimo" placeholder="Mínimo" name="km_minimo" class="form-control"
              value="{{old('km_maximo')}}">
           </div>
         </li>
         <li class="nav-item mt-2">
               <select class="form-control select2" name="marca" id="marca">
                       <option value="">Selecione a marca</option>
               </select>
               
                <script type="text/javascript">
                  
                    $('#marca').val("{{old('marca')}}");
                    $('#marca').trigger('change');
                 
                  
                </script>
               
         </li>
         <li class="nav-item mt-2">
               <select class="form-control select2" name="modelo" id="modelo">
                       <option value="">Selecione o modelo</option>
               </select>
               
                <script type="text/javascript">
                  $('#modelo').val("{{old('modelo')}}");
                </script>
               
         </li>
         <li class="nav-item mt-2">
               <select class="form-control select2" name="versao" id="versao">
                       <option value="">Selecione a versão</option>
               </select>
               @if(old('versao'))
                <script type="text/javascript">
                  $('#versao').val("{{old('versao')}}");
                </script>
               @endif
         </li>
         <input type="hidden" name="mais_buscados" value="0">
         <li class="nav-item mt-2">
           <button class="btn btn-primary">
             Filtrar
           </button>
          </li>
       </ul>
      </form>
    </div>
    <div class="col-sm-9">
      <div class="list-group">
        @forelse($anuncios as $anuncio)
          @include('elements.anuncios.anuncio', ['anuncio'=> $anuncio])
        @empty
        <div class="alert alert-primary" role="alert">
          Nenhum anúncio encontrado com as especificações fornecidas.
        </div>
        @endforelse
      </div>
      {{$anuncios->links()}}
    </div>
</div>
</div>

@endsection

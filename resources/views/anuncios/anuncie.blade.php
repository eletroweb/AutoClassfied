@extends('layouts.app')
@section('content')
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">Crie o seu anúncio</h1>
      <p class="lead">Preencha o formulário abaixo e anuncie o seu veículo.</p>
    </div>
  </div>  
  @include('elements.anuncios.anuncie_form')	
	<!-- Modal -->
	<div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="checkoutModalLabel">Pagamento</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        @include('elements.anuncios.checkout')
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
	        <button type="button" id="btnPagar" class="btn btn-secondary" data-dismiss="modal">Prosseguir com o pagamento</button>
	      </div>
	    </div>
	  </div>
	</div>
	<script type="text/javascript" src="{{asset('js/anuncio/pagseguro.js')}}"></script>
@endsection

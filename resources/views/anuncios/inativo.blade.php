@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-10 m-auto">
      <div class="box mt-4">
          <h1 class="display-3"><i class="fa fa-car mr-4"></i>Ops! Anúncio não ativado</h1>
          <p>
            O anúncio "<b class="">{{$anuncio->titulo}}</b>" foi publicado, mas depende de aprovação para ser divulgado.
            Caso este seja um anúncio destacado e o pagamento tenho sido feito através de boleto, você deve aguardar o prazo
            da confirmação do pagamento.
            Para mais informações entre em contato conosco.
          </p>
      </div>
    </div>
  </div>
</div>
@endsection

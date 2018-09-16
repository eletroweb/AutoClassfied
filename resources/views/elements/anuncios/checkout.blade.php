<div class="row">
    <div class="col-sm-12">
      <div class="alert alert-warning" role="alert">
        O pagamento só será efetivado após a realização do anúncio. Nós não armazenamos os seus dados do cartão de crédito.
      </div>
      <div class="form-group">
        <label for="nome">Nome completo</label>
        <input class="form-control" type="text" name="nome" id="nome" value="{{Auth::user()->name}}" placeholder="Digite o seu nome completo">
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group">
        <label for="telefone">Telefone</label>
        <input class="form-control" type="text" name="telefone" id="telefone" class="telefone" value="{{Auth::user()->telefone()->valor}}" placeholder="Digite o telefone">
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group">
        <label for="cpf">CPF</label>
        <input class="form-control" type="text" name="cpf" id="cpf" class="cpf" value="{{Auth::user()->documento}}" placeholder="Digite o CPF">
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group">
        <label for="nascimento">Data de nascimento</label>
        <input class="form-control" type="date" name="nascimento" value="" id="nascimento">
      </div>
    </div>
    <div class="col-sm-12">
      @include('enderecos.form', ['endereco'=> Auth::user()->end])
    </div>
    <div class="col-sm-12">
      <hr>
      <h3>Dados cartão de crédito</h3>
    </div>
    <div class="col-sm-12">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-credit-card"></i></span>
          </div>
          <input type="text" class="form-control" id="cartao" placeholder="Digite o número do seu cartão: xxxx-xxxx-xxxx-xxxx">
        </div>
    </div>
    <div class="col-sm-3">
    	<div class="form-group">
    		<label for="month">Mês</label>
    		<input type="number" class="form-control" id="month" placeholder="MM">
    	</div>
    </div>
    <div class="col-sm-3">
    	<div class="form-group">
    		<label for="year">Ano</label>
    		<input type="number" class="form-control" id="year" placeholder="YYYY">
    	</div>
    </div>
    <div class="col-sm-4">
    	<div class="form-group">
    		<label for="year">CVV</label>
    		<input type="number" class="form-control" id="cvv" placeholder="CVV">
    	</div>
    </div>
</div>

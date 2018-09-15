<div class="row">
    <div class="col-sm-12">
      <div class="form-group">
        <label for="nome">Nome completo</label>
        <input class="form-control" type="text" name="nome" id="nome" value="" placeholder="Digite o seu nome completo">
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group">
        <label for="telefone">Telefone</label>
        <input class="form-control" type="text" name="telefone" id="telefone" class="telefone" value="" placeholder="Digite o telefone">
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group">
        <label for="cpf">CPF</label>
        <input class="form-control" type="text" name="cpf" id="cpf" class="cpf" value="" placeholder="Digite o CPF">
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group">
        <label for="nascimento">Data de nascimento</label>
        <input class="form-control" type="date" name="nascimento" value="" id="nascimento">
      </div>
    </div>
    <div class="col-sm-12">
      @include('enderecos.form')
      <hr>
    </div>
    <div class="col-sm-12">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-credit-card"></i></span>
          </div>
          <input type="text" class="form-control" id="cartao">
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

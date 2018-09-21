<div class="row">
  <div class="form-group col-sm-12">
    <label for="cep">Logradouro</label>
    <input type="text" value="{{isset($endereco)?$endereco->logradouro:''}}" class="form-control" name="logradouro" placeholder="Digite o logradouro" id="logradouro" required>
  </div>
  <div class="form-group col-sm-6">
    <label for="cep">CEP</label>
    <input type="text" value="{{isset($endereco)?$endereco->cep:''}}" class="form-control cep" name="cep" placeholder="Digite o CEP" id="cep">
  </div>
  <div class="form-group col-sm-6">
    <label for="cidade">Cidade</label>
    <input type="text" value="{{isset($endereco)?$endereco->cidade:''}}" name="cidade" placeholder="Digite o nome da sua cidade" class="form-control" id="cidade" required>
  </div>
  <div class="form-group col-sm-6">
    <label for="bairro">Bairro</label>
    <input type="text" value="{{isset($endereco)?$endereco->bairro:''}}" class="form-control" placeholder="Digite o seu bairro" name="bairro" id="bairro" required>
  </div>
  <div class="form-group col-sm-6">
    <label for="estado">Estado</label>
    <select class="form-control" class="uf" name="uf" id="uf" required>
      <option value="">Selecione o seu estado...</option>
      <option value="AC">Acre</option>
      <option value="AL">Alagoas</option>
      <option value="AP">Amapá</option>
      <option value="AM">Amazonas</option>
      <option value="BA">Bahia</option>
      <option value="CE">Ceará</option>
      <option value="DF">Distrito Federal</option>
      <option value="ES">Espírito Santo</option>
      <option value="GO">Goiás</option>
      <option value="MA">Maranhão</option>
      <option value="MT">Mato Grosso</option>
      <option value="MS">Mato Grosso do Sul</option>
      <option value="MG">Minas Gerais</option>
      <option value="PA">Pará</option>
      <option value="PB">Paraíba</option>
      <option value="PR">Paraná</option>
      <option value="PE">Pernambuco</option>
      <option value="PI">Piauí</option>
      <option value="RJ">Rio de Janeiro</option>
      <option value="RN">Rio Grande do Norte</option>
      <option value="RS">Rio Grande do Sul</option>
      <option value="RO">Rondônia</option>
      <option value="RR">Roraima</option>
      <option value="SC">Santa Catarina</option>
      <option value="SP">São Paulo</option>
      <option value="SE">Sergipe</option>
      <option value="TO">Tocantins</option>
    </select>
    @if(isset($endereco))
      <script type="text/javascript">
        $(document).ready(function(){
          var uf = '{{$endereco->uf}}';

            $('#uf').val(uf);
        });
      </script>
    @endif
  </div>
  <div class="form-group col-sm-6">
    <label for="numero">Número</label>
    <input type="number" value="{{isset($endereco)?$endereco->numero:''}}" class="form-control" name="numero" placeholder="Número do estabelecimento" required>
  </div>
</div>

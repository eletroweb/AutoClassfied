<div class="col-sm-5">
    <form action="/anuncios" method="get">
            <div class="card shadow" id="pesquisa-principal">
                <div class="card-body">
                    <h4 class="card-title">Encontre os principais anúncios</h4>
                    <h6 class="card-subtitle mb-2 text-muted">Pesquise por marca, nome, modelo, ano ou tudo isso junto!</h6>
                    <p class="card-text">
                        <div class="row">

                            <!--<div class="col-sm-6">
                              <div class="form-group">
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
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="cidade">Cidade</label>
                                <input type="text" id="cidade" name="cidade" value="" placeholder="Digite a cidade">
                              </div>
                            </div>-->
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                  <select class="form-control select2" name="marca" id="marca">
                                          <option value="">Selecione a marca</option>
                                  </select>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                  <select class="form-control select2" name="modelo" id="modelo">
                                          <option value="">Selecione o modelo</option>
                                  </select>
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 d-none d-sm-block">
                                <div class="form-group">
                                    <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Faixa de preço</span>
                                            </div>
                                            <input type="text" name="valor_minimo" placeholder="Preço mínimo" class="form-control valor">
                                            <input type="text" name="valor_maximo" placeholder="Preço máximo" class="form-control valor">
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 d-none d-sm-block">
                                <div class="form-group ">
                                    <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="">Ano do veículo</span>
                                            </div>
                                            <input type="number" name="ano_minimo" placeholder="Ano mínimo" class="form-control">
                                            <input type="number" name="ano_maximo" placeholder="Ano máximo" class="form-control">
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="custom-control custom-checkbox d-none d-sm-block">
                              <input type="checkbox" class="custom-control-input" id="moto" name="tipo[]" value="moto" checked>
                              <label class="custom-control-label" for="moto">Moto</label>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="custom-control custom-checkbox d-none d-sm-block">
                              <input type="checkbox" class="custom-control-input" id="carro" name="tipo[]" value="carro" checked>
                              <label class="custom-control-label" for="carro">Carro</label>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="usado" name="usado[]" value="1" checked>
                              <label class="custom-control-label" for="usado">Usado</label>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="nao_usado" name="usado[]" value="0" checked>
                              <label class="custom-control-label" for="nao_usado">Novo</label>
                            </div>
                          </div>
                        </div>
                    </p>
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </div>
    </form>
</div>

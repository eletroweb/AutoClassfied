<div class="col-sm-5">
    <form action="/anuncios" method="get">
            <div class="card shadow" id="pesquisa-principal">
                <div class="card-body">
                    <h4 class="card-title">Encontre os principais anúncios</h4>
                    <h6 class="card-subtitle mb-2 text-muted">Pesquise por marca, nome, modelo, ano ou tudo isso junto!</h6>
                    <p class="card-text">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="O que está procurando?" name="nome" id="nome">
                                </div>
                            </div>
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
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Faixa de preço</span>
                                            </div>
                                            <input type="text" name="preco_minimo" placeholder="Preço mínimo" class="form-control valor">
                                            <input type="text" name="preco_maximo" placeholder="Preço máximo" class="form-control valor">
                                        </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
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
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="moto" name="tipo[]" value="moto" checked>
                              <label class="custom-control-label" for="moto">Moto</label>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="carro" name="tipo[]" value="carro" checked>
                              <label class="custom-control-label" for="carro">Carro</label>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="moto" name="usado[]" value="1" checked>
                              <label class="custom-control-label" for="moto">Usado</label>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="carro" name="tipo[]" value="0" checked>
                              <label class="custom-control-label" for="carro">Novo</label>
                            </div>
                          </div>
                        </div>
                    </p>
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </div>
    </form>
</div>

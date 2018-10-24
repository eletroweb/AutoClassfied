<div class="container">
    <div class="row">
        <div class="box col-sm-12 mt-3" id="payment_methods">
          <h3 class="box-title">Selecione a sua opção de anúncio</h3>
          <div class="plan-selection custom-control custom-radio">
              <div class="plan-data">
                  <input id="anuncio_destacado" value="y" class="custom-control-input tipo_anuncio"  name="anuncio_destacado" type="radio"/>
                  <label for="anuncio_destacado" class="custom-control-label" style="font-weight: bold; color: green;">Anúncio destacado</label>
                  <p class="plan-text">
                    Sugestão para usuários | Melhor posição </p>
                  <span class="plan-price">R${{str_replace(".", ",", App\Option::getOptionValor('preco_anuncio'))}}</span>
              </div>
            <div class="collapse" id="tipo_pagamento_destaque">
              <div class="card card-body">
                <div class="custom-control custom-radio">
                  <input type="radio" id="pagamento_cartao" name="tipo_pagamento" class="custom-control-input tipo_pagamento" value="credito">
                  <label class="custom-control-label" for="pagamento_cartao"><i class="fa fa-credit-card mr-1"></i>Pagar com crédito</label>
                </div>
                <div class="custom-control custom-radio">
                  <input type="radio" id="pagamento_boleto" name="tipo_pagamento" class="custom-control-input tipo_pagamento" value="boleto">
                  <label class="custom-control-label" for="pagamento_boleto"><i class="fa fa-file-invoice-dollar mr-1"></i>Pagar com boleto</label>
                </div>
              </div>
            </div>
          </div>
          <!--<div class="plan-selection custom-control custom-radio">
              <div class="plan-data">
                  <input id="anuncio_padrao" class="custom-control-input tipo_anuncio" name="anuncio_destacado" type="radio" value="n" />
                  <label for="anuncio_padrao" class="custom-control-label">Anúncio padrão</label>
                  <p class="plan-text">
                    Não destacar anúncio
                  </p>
                  <span class="plan-price" style="color: gray;">Gratuito</span>
              </div>
          </div>-->
        </div>
    </div>
</div>

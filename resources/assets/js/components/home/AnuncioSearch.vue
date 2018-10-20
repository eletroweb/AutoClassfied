<template lang="html">
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
                                      <input type="text" class="form-control" placeholder="O que está procurando?" name="titulo" id="nome">
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                    <v-select label="nome" v-model="marca_selected" :options="marcas" placeholder="Selecione a marca"></v-select>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                    <v-select taggable label="nome" v-model="modelo_selected" :options="modelos" placeholder="Selecione o modelo"></v-select>
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
                                              <input type="text" name="preco_minimo" placeholder="Preço mínimo" class="form-control valor">
                                              <input type="text" name="preco_maximo" placeholder="Preço máximo" class="form-control valor">
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
                              <div class="custom-control custom-checkbox d-none d-sm-block">
                                <input type="checkbox" class="custom-control-input" id="usado" name="usado[]" value="1" checked>
                                <label class="custom-control-label" for="usado">Usado</label>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="custom-control custom-checkbox d-none d-sm-block">
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
</template>

<script>

import VueSelect from 'vue-select'

export default {
  data(){
    return {
      marcas: [],
      modelos: [],
      marca_selected: '',
      modelo_selected: ''
    }
  },
  props:{
  },
  components:{
      'v-select': VueSelect
  },
  watch:{
    marca_selected: function(val){
      console.log(val)
      this.$http.get('/ajax/veiculos/modelos', {params: {marca: val.id}}).then(response => {
        this.modelos = response.body
      })
    },
  },
  methods:{

  },
  mounted(){
    this.$http.get('/ajax/veiculos/marcas').then(response => {
      this.marcas = response.body
    })
  }

}
</script>

<style lang="css">
</style>

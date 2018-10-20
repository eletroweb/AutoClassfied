<template lang="html">
  <nav id="menu-principal" class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="/">
      <img :src="logo" height="40" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/">Início <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" :href="anuncios">Anúncios</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Comprar carros
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" :href="ofertas_carros">Ofertas de carros</a>
            <a class="dropdown-item" :href="ofertas_motos">Ofertas de moto</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" :href="carros_buscados">Carros mais buscados</a>
            <a class="dropdown-item" :href="motos_bucadas">Motos mais buscadas</a>
            <!--<a class="dropdown-item" href="#">Busca avançada</a>-->
            <a class="dropdown-item" :href="revendas">Encontre um revendedor</a>
            <a class="dropdown-item" :href="avalie_carro">Avalie o seu carro</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Revendedores
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a v-if="logado" class="dropdown-item" :href="login">Fazer login</a>
            <a class="dropdown-item" :href="contratar">Quero contratar</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Vender carros
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" :href="anuncie_carro">Anuncie seu carro</a>
            <a class="dropdown-item" :href="anuncie_moto">Anuncie sua moto</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" :href="planos_revendas">Planos para revendedores</a>
            <a class="dropdown-item" :href="cadastro_revenda">Cadastro para revendas</a>
            <a class="dropdown-item" :href="anuncie_carro">Cadastro anúncio simples</a>
            <a class="dropdown-item" :href="fipe">Avalie o seu veículo</a>
            <a class="dropdown-item" :href="faq">Perguntas Frequentes</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" :href="blog" target="_blank">Blog</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dúvidas
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" :href="faq_comprar_carro">Como comprar seu veículo</a>
            <a class="dropdown-item" :href="faq_vender_carro">Como vender seu veículo</a>
            <a class="dropdown-item" :href="faq_anuncios">Anúncios</a>
            <a class="dropdown-item" :href="fale_conosco">Fale conosco</a>
          </div>
        </li>

          <li v-if="logado" class="nav-item">
            <a class="nav-link" :href="minha_conta">Minha conta</a>
          </li>
          <li v-if="revenda" class="nav-item">
            <a class="nav-link" :href="minha_revenda">Minha revenda</a>
          </li>
          <li v-if="admin" class="nav-item">
            <a class="nav-link" :href="admin">Admin</a>
          </li>
          <li v-if="logado" class="nav-item">
              <a  class="nav-link" :href="logout" @click="logout()">
                  Sair
              </a>
              <form id="logout-form" :action="logout" method="POST" style="display: none;">
                  <input type="hidden" name="_token" :value="csrf">
              </form>
          </li>

        <li v-if="!logado" class="nav-item">
          <a class="nav-link" :href="login">Entrar</a>
        </li>
        <li v-if="!logado" class="nav-item">
          <a class="nav-link" :href="criar_conta">Criar conta</a>
        </li>

      </ul>
    </div>
  </nav>
</template>

<script>
export default {
  props: {
    csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    logo: '',
    logado: false,
    revenda: false,
    admin: false,
    anuncios: '',
    ofertas_motos: '',
    ofertas_carros: '',
    carros_buscados: '',
    motos_bucadas: '',
    revendas: '',
    avalie_carro: '',
    login: '',
    contratar: '',
    anuncie_moto: '',
    anuncie_carro: '',
    planos_revendas: '',
    cadastro_revenda: '',
    fipe: '',
    faq: '',
    blog: '',
    faq_anuncios: '',
    faq_vender_carro: '',
    faq_comprar_carro: '',
    fale_conosco: '',
    minha_conta: '',
    minha_revenda: '',
    admin: '',
    logout: '',
    criar_conta: ''
  },
  methods:{
    sair(){
      event.preventDefault();
      document.getElementById('logout-form').submit();
    }
  }
}
</script>

<style lang="css">
</style>

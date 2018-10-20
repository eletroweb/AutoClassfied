<template lang="html">
  <div class="container mt-5">
    <div class="row text-center">
      <div class="col-sm-12">
        <img class="mb-4" src="http://www.unicodono.com.br/web/img/topo/01.png" alt="" width="200">
      </div>
    </div>
    <form method="post" class="form-signin h-100" :action="action">
        <input type="hidden" name="_token" :value="csrf">
        <h1 class="h3 mb-3 font-weight-normal text-center">Acesse a sua conta</h1>
        <span v-if="err_email" class="help-block">
            <strong>{{ err_email }}</strong>
        </span>
        <label for="email" class="sr-only">Email</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Digite o seu e-mail" required="" autofocus="">
        <label for="password" class="sr-only">Senha</label>
        <span v-if="err_password" class="help-block">
            <strong>{{ err_password }}</strong>
        </span>
        <input type="password" id="password" name="password" class="form-control" placeholder="Digite a sua senha" required="">
        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Lembrar de mim
          </label>
        </div>
        <button class="btn btn-primary btn-block" type="submit">Entrar</button>
        <a class="btn btn-secondary btn-block" :href="register">Criar Conta</a>
        <a class="btn btn-light btn-block" :href="facebook_url"><i style="color: #3b5998" class="fab fa-facebook"></i> Facebook</a>
        <p class="mt-5 mb-3 text-muted text-center">Unicodono © Todos os direitos reservados</p>
      </form>
  </div>
</template>

<script>
export default {
  data(){
    return {
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    }
  },
  props: {
    action: '',
    err_email: '',
    err_password: '',
    register: '',
    facebook_url: '',
    email: '',
    password: '',
  },
  methods:{

  },
}
</script>

<style lang="css">
.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>

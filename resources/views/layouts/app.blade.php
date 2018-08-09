<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Os melhores Carros Usados Seminovos estão aqui" />
    <meta name="KEYWORDS" content="unico dono, automoveis, comprar carro, carro barato, carro sem entrada, carro importado, carro novo, seminovo, usado, revenda, veiculo, financiamento, classificados, tabela-fipe, notícias, vídeos, dicas, garagem, guia automovel, troca carro, fox, onix, hyundai, ford, ka, volkswagen, gol, chevrolet, prisma, renault, sandero, toyota, corolla, fiat, strada, mobi, toro, jeep, compass, up, nissan, kicks" />
    <meta name="SUBJECT" content="Carros Usados, Carros Novos e Carros Usados Unico Dono "/>
    <meta name="Abstract" content="Os melhores Carros Usados Seminovos estão Aqui " />
    <meta name="company" content="Os melhores Carros Usados Seminovos estão Aqui " />
    <meta name="distribution" content="Global" />
    <meta name="RATING" content="General" />
    <meta name="ROBOTS" content="INDEX, FOLLOW" />
    <meta name="Googlebot" content="index,follow" />
    <meta name="MSNBot" content="index,follow,all" />
    <meta name="InktomiSlurp" content="index,follow,all" />
    <meta name="Unknownrobot" content="index,follow,all" />
    <meta name="REVISIT-AFTER" content="2 days" />
    <meta name="language" content="PT-BR" />
    <meta name="Audience" content="all" />
    <meta name="url" content="www.unicodono.com.br" />
    <link rel="shortcut icon" href="{{asset('images/favicon.jpg')}}" type="image/x-icon" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
    <!--<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

    <script>
     (adsbygoogle = window.adsbygoogle || []).push({
          google_ad_client: "ca-pub-2059965508769380",
          enable_page_level_ads: true
     });
     </script>-->
    <title>{{ env('app.name', 'Unicodono') }}</title>
    <link rel="stylesheet" href="{{ asset('css/lightbox.min.css') }}">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/unicodono.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/lightgallery.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        <nav id="menu-principal" class="navbar navbar-expand-lg navbar-dark bg-primary">
          <a class="navbar-brand" href="/">
            <img src="{{asset('images/01.png')}}"  height="40" alt="">
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
                <a class="nav-link" href="{{route('anuncios')}}">Anúncios</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Comprar carros
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="/anuncios?tipo[]=carro&valor_maximo=&valor_minimo=&ano_maximo=&ano_minimo=&marca=&modelo=&versao=">Ofertas de carros</a>
                  <a class="dropdown-item" href="/anuncios?tipo[]=moto&valor_maximo=&valor_minimo=&ano_maximo=&ano_minimo=&marca=&modelo=&versao=">Ofertas de moto</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="/anuncios?tipo[]=carro&mais_buscados=1">Carros mais buscados</a>
                  <a class="dropdown-item" href="/anuncios?tipo[]=moto&mais_buscados=1">Motos mais buscadas</a>
                  <!--<a class="dropdown-item" href="#">Busca avançada</a>-->
                  <a class="dropdown-item" href="/revendas">Encontre um revendedor</a>
                  <a class="dropdown-item" href="{{route('fipe')}}">Tabela FIPE</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Revendedores
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="/login">Fazer login</a>
                  <a class="dropdown-item" href="{{route('contratar_revenda')}}">Quero contratar</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Vender carros
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{route('anuncie')}}">Anuncie seu carro</a>
                  <a class="dropdown-item" href="{{route('anuncie')}}">Anuncie sua moto</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Planos para revendedores</a>
                  <a class="dropdown-item" href="#">Cadastro para revendas</a>
                  <a class="dropdown-item" href="#">Cadastro anúncio simples</a>
                  <a class="dropdown-item" href="{{route('fipe')}}">Tabela FIPE</a>
                  <a class="dropdown-item" href="#">Perguntas Frequentes</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Avalie o seu veículo</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Financie o seu veículo</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://blog.unicodono.com.br" target="_blank">Blog</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Dúvidas
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{route('duvida_comprar_carro')}}">Como comprar seu veículo</a>
                  <a class="dropdown-item" href="{{route('duvida_vender_carro')}}">Como vender seu veículo</a>
                  <a class="dropdown-item" href="{{route('duvida_anuncios')}}">Anúncios</a>
                  <a class="dropdown-item" href="{{route('fale_conosco')}}">Fale conosco</a>
                </div>
              </li>
              @if(Auth::check())
                <li class="nav-item">
                  <a class="nav-link" href="{{route('minhaconta')}}">Minha conta</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/admin">Admin</a>
                </li>
                <li class="nav-item">
                    <a  class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Sair
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
              @else
              <li class="nav-item">
                <a class="nav-link" href="/login">Entrar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/register">Criar conta</a>
              </li>
              @endif
            </ul>
          </div>
        </nav>
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script>
       (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-2059965508769380",
            enable_page_level_ads: true
       });
       </script>
     <!--   <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">


                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>


                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">

                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>


                    <ul class="nav navbar-nav navbar-right">

                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>-->

        @yield('content')
    </div>
    <footer>
      <div class="container-fluid">
        <div class="row bg-primary mt-4 p-5">
          <div class="col-sm-2">
            <ul class="nav flex-column ">
              <li class="nav-item">
                <a class="nav-link text-white" href="#"><b class="text-white">Institucional</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#">Ofertas de carros</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#">Politica de privacidade</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#">Publicidade</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#">Quem pode anunciar?</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#">Sobre nós</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#">Termos de uso</a>
              </li>
            </ul>
          </div>
          <div class="col-sm-2">
            <ul class="nav flex-column ">
              <li class="nav-item">
                <a class="nav-link text-white" href="#"><b class="text-white">Mapa do site</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#">Comprar carro</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#">Comprar moto</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#">Vender carro</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#">Vender moto</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#">Tabela Unicodono</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#">Serviços</a>
              </li>
            </ul>
          </div>
          <div class="col-sm-2">
            <ul class="nav flex-column ">
              <li class="nav-item">
                <a class="nav-link text-white" href="#"><b class="text-white">Atendimento</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#">Fale conosco</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#">Como comprar o seu veículo</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#">Como vender o seu veículo</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#">Painel de controle</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#">Sobre anúncios</a>
              </li>
            </ul>
          </div>
          <div class="col-sm-3">
            <ul class="nav flex-column ">
              <li class="nav-item">
                <a class="nav-link text-white" href="#"><b class="text-white">Sites</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="http://www.detran.sp.gov.br" target="_blank">Detran São Paulo</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="http://veiculos.fipe.gov.br" target="_blank">Tabela Fipe</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="http://detran.mg.gov.br" target="_blank">Detran Minas Gerais</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="http://detran.sc.gov.br" target="_blank">Detran Santa-Catarina</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="http://detran.pr.gov.br" target="_blank">Detran Paraná</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="http://detran.rj.gov.br" target="_blank">Detran Rio de Janeiro</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="http://detran.rs.gov.br" target="_blank">Detran Rio Grande do Sul</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="https://postodevistoria.com.br" target="_blank">Postos de Vistoria no Brasil - Encontre o mais próximo !</a>
              </li>
            </ul>
          </div>
          <div class="col-sm-3">

          </div>
        </div>
        <div class="row bg-secondary p-3">
          <div class="col-sm-12 text-center text-white">
            Unicodono - Todos os direitos reservados.
          </div>
        </div>
      </div>
    </footer>

    <script src="{{asset('js/jquery-3.3.1.min.js')}}" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script src="{{asset('js/jquery.mask.min.js')}}" charset="utf-8"></script>
    <script src="{{asset('js/anuncio/main.js')}}" charset="utf-8"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}" charset="utf-8"></script>
    <script src="{{asset('js/lightbox.min.js')}}" charset="utf-8"></script>
    <script type="text/javascript" src="{{asset('js/select2.full.min.js')}}"></script>
    <script src="{{asset('js/custom.js')}}" charset="utf-8"></script>
    <script src="{{asset('js/fipe.js')}}" charset="utf-8"></script>

    <script src="{{asset('js/cidades_estados.js')}}" charset="utf-8"></script>
</body>
</html>

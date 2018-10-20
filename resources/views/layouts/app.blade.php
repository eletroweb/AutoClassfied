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
    <meta name="csrf-token" content="{{ csrf_token() }}">
     <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-15308183-2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-15308183-2');
    </script>
    <title>ÚNICODONO - Carros novos e usados, carros usados e único dono</title>
    <link rel="stylesheet" href="{{ asset('css/lightbox.min.css') }}">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/unicodono.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dropzone.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/lightgallery.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fine-uploader/fine-uploader-gallery.css') }}">
    <link rel="stylesheet" href="{{ asset('fine-uploader/fine-uploader-new.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Pontano+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script type="text/javascript" src="{{asset('js/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('js/jquery-3.3.1.min.js')}}" charset="utf-8"></script>
    <script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/pagamento.css')}}">
    <link rel="stylesheet" href="{{asset('css/hover-min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.steps.css') }}">
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.steps.min.js') }}"></script>
    <link rel="stylesheet" src=" {{ asset('lightGallery/css/lightgallery.min.css') }}">
    <script type="text/javascript" src="{{ asset('lightGallery/js/lightgallery-all.min.js') }}"></script>
</head>
<body>
  <div id="fb-root"></div>
<div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.1&appId=2296749937007477&autoLogAppEvents=1';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
    <div id="app">
        <navbar logo="{{asset('images/01.png')}}" anuncios="{{route('anuncios')}}"
                ofertas_carros="/anuncios?tipo[]=carro&valor_maximo=&valor_minimo=&ano_maximo=&ano_minimo=&marca=&modelo=&versao="
                ofertas_motos="/anuncios?tipo[]=moto&valor_maximo=&valor_minimo=&ano_maximo=&ano_minimo=&marca=&modelo=&versao="
                carros_buscados="/anuncios?tipo[]=carro&mais_buscados=1"
                motos_bucadas="/anuncios?tipo[]=moto&mais_buscados=1"
                revendas="{{route('revendas')}}"
                avalie_carro="{{route('fipe')}}"
                login="/login"
                contratar_revenda="{{route('contratar_revenda')}}"
                anuncie_moto="{{route('anuncie')}}"
                anuncie_carro="{{route('anuncie')}}"
                fipe="{{route('fipe')}}"
                faq="{{route('faq')}}"
                blog="https://blog.unicodono.com.br"
                faq_comprar_carro="{{route('duvida_comprar_carro')}}"
                faq_vender_carro="{{route('duvida_vender_carro')}}"
                faq_anuncios="{{route('duvida_anuncios')}}"
                fale_conosco="{{route('fale_conosco')}}"
                minha_conta="{{route('minhaconta')}}"
                minha_revenda="{{ Auth::check()? Auth::user()->isRevenda()? Auth::user()->isRevenda()->getUrl() : '' : ''}}"
                logado="{{Auth::check()?true:false}}"
                logout="{{route('logout')}}"
                criar_conta="/register"
                >
         </navbar>
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
                <a class="nav-link text-white" href="/anuncios">Ofertas de carros</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="{{route('termos_uso')}}">Politica de privacidade</a>
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
                <a class="nav-link text-white" href="{{route('termos_uso')}}">Termos de uso</a>
              </li>
            </ul>
          </div>
          <div class="col-sm-2">
            <ul class="nav flex-column ">
              <li class="nav-item">
                <a class="nav-link text-white" href="#"><b class="text-white">Mapa do site</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="/anuncios?paginate=10&order=visualizacoes&nome=&usado%5B%5D=0&usado%5B%5D=1&tipo%5B%5D=carro&blindagem%5B%5D=1&blindagem%5B%5D=0&valor_maximo=&valor_minimo=&ano_maximo=&ano_minimo=&km_maximo=&km_minimo=&marca=&modelo=&versao=&mais_buscados=0">Comprar carro</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="/anuncios?paginate=10&order=visualizacoes&nome=&usado%5B%5D=0&usado%5B%5D=1&tipo%5B%5D=moto&blindagem%5B%5D=1&blindagem%5B%5D=0&valor_maximo=&valor_minimo=&ano_maximo=&ano_minimo=&km_maximo=&km_minimo=&marca=&modelo=&versao=&mais_buscados=0">Comprar moto</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="/anuncie">Vender carro</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="/anuncie">Vender moto</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="/consulta-tabela-fipe">Avalie o seu veículo</a>
              </li>
            </ul>
          </div>
          <div class="col-sm-2">
            <ul class="nav flex-column ">
              <li class="nav-item">
                <a class="nav-link text-white" href="#"><b class="text-white">Atendimento</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="/fale-conosco">Fale conosco</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="/como-comprar-carro">Como comprar o seu veículo</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="/como-vender-carro">Como vender o seu veículo</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="/minha-conta">Painel de controle</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="/faq">Sobre anúncios</a>
              </li>
            </ul>
          </div>
          <div class="col-sm-3">
            <ul class="nav flex-column ">
              <li class="nav-item">
                <a class="nav-link text-white" href="#"><b class="text-white">Sites</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="https://www.detran.sp.gov.br" target="_blank">Detran São Paulo</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="https://veiculos.fipe.gov.br" target="_blank">Tabela Fipe</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="https://detran.mg.gov.br" target="_blank">Detran Minas Gerais</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="https://detran.sc.gov.br" target="_blank">Detran Santa-Catarina</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="https://detran.pr.gov.br" target="_blank">Detran Paraná</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="https://detran.rj.gov.br" target="_blank">Detran Rio de Janeiro</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="https://detran.rs.gov.br" target="_blank">Detran Rio Grande do Sul</a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script src="{{asset('js/jquery.mask.min.js')}}" charset="utf-8"></script>
    <script src="{{asset('js/anuncio/main.js')}}" charset="utf-8"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}" charset="utf-8"></script>
    <script src="{{asset('js/lightbox.min.js')}}" charset="utf-8"></script>
    <script type="text/javascript" src="{{asset('js/select2.full.min.js')}}"></script>
    <script src="{{asset('js/fipe.js')}}" charset="utf-8"></script>
    <script src="{{asset('js/cidades_estados.js')}}" charset="utf-8"></script>
    <script src="{{asset('js/dropzone.js')}}" charset="utf-8"></script>
    <script src="{{asset('js/custom.js')}}" charset="utf-8"></script>
    <script src="{{asset('js/recaptcha.js')}}" charset="utf-8"></script>
    <script src="{{ asset('js/app.js') }}" charset="utf-8"></script>
</body>
</html>

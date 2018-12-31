<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Unicodono - ADM</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="{{asset('css/admin/fontastic.css')}}">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('css/admin/style.blue.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('css/admin/custom.css')}}">
    <link rel="stylesheet" href="/css/titatoggle-dist-min.css">
    <!-- Favicon-->
    <!--<link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <script src="{{asset('js/jquery-3.3.1.min.js')}}" charset="utf-8"></script>
  </head>
  <body>
    <div class="page">
      <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar">
          <!-- Search Box-->
          <div class="search-box">
            <button class="dismiss"><i class="icon-close"></i></button>
            <form id="searchForm" action="#" role="search">
              <input type="search" placeholder="What are you looking for..." class="form-control">
            </form>
          </div>
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Navbar Brand --><a href="index.html" class="navbar-brand d-none d-sm-inline-block">
                  <div class="brand-text d-none d-lg-inline-block"><span>Unicodono  </span><strong>Painel de controle</strong></div>
                  <div class="brand-text d-none d-sm-inline-block d-lg-none"><strong>UN</strong></div></a>
                <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Search-->
                <!--<li class="nav-item d-flex align-items-center"><a id="search" href="#"><i class="fas fa-search"></i></a></li>-->
                <!-- Notifications-->
                <!--<li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell-o"></i><span class="badge bg-red badge-corner">12</span></a>
                  <ul aria-labelledby="notifications" class="dropdown-menu">
                    <li><a rel="nofollow" href="#" class="dropdown-item">
                        <div class="notification">
                          <div class="notification-content"><i class="fa fa-envelope bg-green"></i>You have 6 new messages </div>
                          <div class="notification-time"><small>4 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item">
                        <div class="notification">
                          <div class="notification-content"><i class="fa fa-twitter bg-blue"></i>You have 2 followers</div>
                          <div class="notification-time"><small>4 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item">
                        <div class="notification">
                          <div class="notification-content"><i class="fa fa-upload bg-orange"></i>Server Rebooted</div>
                          <div class="notification-time"><small>4 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item">
                        <div class="notification">
                          <div class="notification-content"><i class="fa fa-twitter bg-blue"></i>You have 2 followers</div>
                          <div class="notification-time"><small>10 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong>view all notifications                                            </strong></a></li>
                  </ul>
                </li>-->
                <!-- Messages                        -->
                <!--<li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-envelope-o"></i><span class="badge bg-orange badge-corner">10</span></a>
                  <ul aria-labelledby="notifications" class="dropdown-menu">
                    <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                        <div class="msg-profile"> <img src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="msg-body">
                          <h3 class="h5">Jason Doe</h3><span>Sent You Message</span>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                        <div class="msg-profile"> <img src="img/avatar-2.jpg" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="msg-body">
                          <h3 class="h5">Frank Williams</h3><span>Sent You Message</span>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                        <div class="msg-profile"> <img src="img/avatar-3.jpg" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="msg-body">
                          <h3 class="h5">Ashley Wood</h3><span>Sent You Message</span>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong>Read all messages   </strong></a></li>
                  </ul>
                </li> -->
                <!-- Languages dropdown    -->
                <!--<li class="nav-item dropdown"><a id="languages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link language dropdown-toggle"><img src="img/flags/16/GB.png" alt="English"><span class="d-none d-sm-inline-block">English</span></a>
                  <ul aria-labelledby="languages" class="dropdown-menu">
                    <li><a rel="nofollow" href="#" class="dropdown-item"> <img src="img/flags/16/DE.png" alt="English" class="mr-2">German</a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item"> <img src="img/flags/16/FR.png" alt="English" class="mr-2">French                                         </a></li>
                  </ul>
                </li> -->
                <!-- Logout    -->
                <li class="nav-item"><a href="/" class="nav-link logout"> <span class="d-none d-sm-inline">Voltar</span><i class="fas fa-chevron-right"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <div class="page-content d-flex align-items-stretch">
        <!-- Side Navbar -->
        <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <!--<div class="avatar"><img src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>-->
            <div class="title">
              <h1 class="h4">{{Auth::user()->name}}</h1>
              <!--<p>Web Designer</p>-->
            </div>
          </div>
          <!-- Sidebar Navidation Menus--><span class="heading">Principal</span>
          <ul class="list-unstyled">
            <li class="active"><a href="/admin"> <i class="fa fa-info-circle"></i>Resumo </a></li>
            <li><a href="/admin/marcas"> <i class="fa fa-bookmark"></i>Marcas </a></li>
            <li><a href="/admin/modelos"> <i class="fa fa-car"></i>Modelos </a></li>
            <li><a href="/admin/versoes"> <i class="fa fa-list-ol"></i>Versões </a></li>
            <li><a href="/admin/revendas"> <i class="fa fa-store"></i>Revendas </a></li>
            <li><a href="/admin/contatos"><i class="fa fa-comments"></i>Contatos</a></li>
            <li><a href="/admin/newsletterUsers"><i class="fas fa-at"></i>E-mails capturados</a></li>
            <li><a href="/admin/fale-conosco"><i class="fa fa-envelope"></i>Fale conosco</a></li>
            <li><a href="#anuncios" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-newspaper"></i>Anúncios</a>
              <ul id="anuncios" class="collapse list-unstyled ">
                <li><a href="/admin/anuncios">Ver todos</a></li>
                <!--<li><a href="/admin/anuncioFields">Campos personalizados</a></li>-->
                <li><a href="/admin/revenda">Importar revenda</a></li>
                <!--<li><a href="#">Pagina</a></li>-->
              </ul>
            </li>
            <li><a href="/admin/planos"> <i class="fa fa-toolbox"></i>Planos </a></li>
            <li><a href="/admin/transactions/"> <i class="fa fa-dollar-sign"></i>Transações </a></li>
            <li><a href="#usuarios" aria-expanded="false" data-toggle="collapse"><i class="fa fa-users"></i>Usuários</a>
              <ul id="usuarios" class="collapse list-unstyled ">
                <li><a href="/admin/users">Usuários cadastrados</a></li>

              </ul>
            </li>
          </ul><span class="heading">Configurações</span>
          <ul class="list-unstyled">
            <li> <a href="{{route('pagseguro_config')}}"> <i class="fa fa-money-check-alt"></i>PagSeguro</a></li>
            <li> <a href="{{route('configuracoes')}}"> <i class="fa fa-cogs"></i>Configurações do site</a></li>
            <li> <a href="#"> <i class="fa fa-envelope"></i>Configurações de e-mail</a></li>
          </ul>
        </nav>
        <div class="content-inner">
          @yield('content')
          <!-- Page Footer-->
          <footer class="main-footer">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                  <p>Unicodono &copy; 2018</p>
                </div>
                <div class="col-sm-6 text-right">
                  <p>Todos os direitos reservados</p>
                  <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                </div>
              </div>
            </div>
          </footer>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->

    <script src="{{asset('js/jquery.mask.min.js')}}" charset="utf-8"></script>
    <script src="{{asset('vendor/popper.js/umd/popper.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('vendor/jquery.cookie/jquery.cookie.js')}}"></script>
    <script src="{{asset('vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <!-- Main File-->
    <script src="{{asset('js/admin/front.js')}}"></script>
    <script src="{{asset('js/admin.js')}}" charset="utf-8"></script>
    <script src="{{asset('js/jquery.mask.min.js')}}" charset="utf-8"></script>
    <script src="{{asset('js/anuncio/main.js')}}" charset="utf-8"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}" charset="utf-8"></script>
    <script src="{{asset('js/lightbox.min.js')}}" charset="utf-8"></script>
    <script type="text/javascript" src="{{asset('js/select2.full.min.js')}}"></script>
    <script src="{{asset('js/custom.js')}}" charset="utf-8"></script>
    <script src="{{asset('js/fipe.js')}}" charset="utf-8"></script>
    <script src="{{asset('js/cidades_estados.js')}}" charset="utf-8"></script>
    <script src="{{asset('js/admin/imports.js')}}" charset="utf-8"></script>
  </body>
</html>

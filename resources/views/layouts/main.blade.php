<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>System Backup</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">
    <link rel="manifest" href="/favicons/manifest.json">
    <link rel="mask-icon" href="/favicons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" type="text/css" href="/assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/lib/material-design-icons/css/material-design-iconic-font.min.css"/><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="/assets/css/style.css" type="text/css"/>
    <script src="/assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
  </head>
  <body>
    <div class="be-wrapper">
      <nav class="navbar navbar-default navbar-fixed-top be-top-header">
        <div class="container-fluid">
          <div class="navbar-header">
              <!--<a href="index.html" class="navbar-brand"></a>-->
              <a href="{{ url('/home') }}" style="display: inline-flex">
                <img src="/img/logo.png" style="width:50px; margin: 10px;"/>
              </a>
          </div>
          <div class="be-right-navbar">
            <ul class="nav navbar-nav navbar-right be-user-nav">
              <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><img src="/assets/img/avatar.png" alt="Avatar"><span class="user-name">{{ Auth::user()->name }}</span></a>
                <ul role="menu" class="dropdown-menu">
                  <li>
                    <div class="user-info">
                      <div class="user-name">{{ Auth::user()->name }}</div>
                      <div class="user-position online">Disponible</div>
                    </div>
                  </li>
                  <li><a href="{{ url('users/' . Auth::user()->user_id . '/edit') }}"><span class="icon mdi mdi-face"></span> Mi cuenta</a></li>
                  <li><a href="{{ url('/logout') }}"><span class="icon mdi mdi-power"></span> Cerrar sesión</a></li>
                </ul>
              </li>
            </ul>
            <div class="page-title"><span>@yield('title')</span></div>
          </div>
        </div>
      </nav>
      <div class="be-left-sidebar">
        <div class="left-sidebar-wrapper">
	  <a href="#" class="left-sidebar-toggle">Escritorio</a>
          <div class="left-sidebar-spacer">
            <div class="left-sidebar-scroll">
              <div class="left-sidebar-content">
                <ul class="sidebar-elements">
                  <li class="divider">Menú</li>
                  @if(Session::has('link'))
                    <li class="parent active open">
                  @else
                    <li class="parent">
                  @endif
                    <a href="#"><i class="icon mdi mdi-home"></i><span>Inicio</span></a>
                    <ul class="sub-menu">
                    @if (Auth::user()->user_type_id == 1)
                      @if(Session::get('link') == 'copias')
                        <li class="active"><a href="{{ url('backups/showfiles') }}"><i class="fa fa-fw fa-files-o"></i> Copias</a></li>
                      @else
                        <li><a href="{{ url('backups/showfiles') }}"><i class="fa fa-fw fa-files-o"></i> Copias</a></li>
                      @endif
                      @if(Session::get('link') == 'registros')
                        <!--<li class="active"><a href="{{ url('logs') }}">Registros</a></li>-->
                      @else
                        <!--<li><a href="{{ url('logs') }}">Registros</a></li>-->
                      @endif
                      @if(Session::get('link') == 'usuarios')
                        <li class="active"><a href="{{ url('users') }}">Usuarios</a></li>
                      @else
                        <li><a href="{{ url('users') }}">Usuarios</a></li>
                      @endif
                    @elseif (Auth::user()->user_type_id == 2)
                        @if(Session::get('link') == 'copias')
                          <li class="active"><a href="{{ url('backups') }}">Copias</a></li>
                        @else
                          <li><a href="{{ url('backups') }}">Copias</a></li>
                        @endif
                    @endif
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="be-content">
        @yield('breadcumbs')
        <div class="main-content container-fluid">
          @yield('content')
        </div>
      </div>
    </div>
    <script src="/assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="/assets/js/main.js" type="text/javascript"></script>
    <script src="/assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      	//initialize the javascript
      	App.init();
      });
      
    </script>
  </body>
</html>

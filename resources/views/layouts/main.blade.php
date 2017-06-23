<!DOCTYPE html>
<html lang="es">

    <head>
    
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
    
        <title>SB Escritorio</title>
    
        <!-- Bootstrap Core CSS -->
        <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
        <!-- Custom CSS -->
        <link href="/css/sb-admin.css" rel="stylesheet">
    
        <!-- Custom Fonts -->
        <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <!-- jQuery -->
        <script src="/vendor/jquery/jquery.js"></script>
    
    </head>

    <body>
    
        <div id="wrapper">
    
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    @if (!Auth::guest())
                        <div>
                            <a class="navbar-brand logo" href="{{ url('/home') }}" style="display: inline-flex">
                                <img src="/img/logo.png" style="width:32px;"/>
                                <p>System Backup</p>
                            </a>
                        </div>
                    @else
                        <div>
                            <a class="navbar-brand logo" href="{{ url('/') }}" style="display: inline-flex">
                                <img src="/img/logo.png" style="width:32px;"/>
                                <p>System Backup</p>
                            </a>
                        </div>
                    @endif
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">
                    @if (!Auth::guest())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ Auth::user()->name }} <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ url('users/' . Auth::user()->user_id . '/edit') }}"><i class="fa fa-fw fa-user"></i> Perfil</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="{{ url('/logout') }}"><i class="fa fa-fw fa-power-off"></i> Cerrar Sesión </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        @if (!Auth::guest())
                            @if (Auth::user()->user_type_id == 1)
                                <li>
                                    <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Usuarios <i class="fa fa-fw fa-caret-down"></i></a>
                                    <ul  id="demo" class="collapse">
                                        <li><a href="{{ url('users') }}">Listar</a></li>
                                        <li><a href="{{ url('users/create') }}">Registrar</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ url('logs') }}"><i class="fa fa-fw fa-file" aria-hidden="true"></i> Logs</a></li>
                                <li><a href=""><i class="fa fa-fw fa-question-circle" aria-hidden="true"></i> Ayuda</a></li>
                            @elseif (Auth::user()->user_type_id == 2)
                                @if(Session::get('copias'))
                                    <li class="active"><a href="{{ url('backups') }}"><i class="fa fa-fw fa-files-o"></i> Copias</a></li>
                                @else
                                    <li><a href="{{ url('backups') }}"><i class="fa fa-fw fa-files-o"></i> Copias</a></li>
                                @endif
                                
                                <li><a href=""><i class="fa fa-fw fa-question-circle" aria-hidden="true"></i> Ayuda</a></li>
                            @endif
                        @endif
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>
    
            <div id="page-wrapper">
                @if (!Auth::guest())
                    <div class="container-fluid">
        
                        <!-- Page Heading -->
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header">
                                    @yield('title')
                                    <small>@yield('subtitle')</small>
                                </h1>
                                <ol class="breadcrumb">
                                    <li>
                                        <i class="fa fa-dashboard"></i>  <a href="{{ url('/home') }}">Escritorio</a>
                                    </li>
                                    <li class="active">
                                        <i class="fa fa-file"></i> @yield('title')
                                    </li>
                                </ol>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                @endif
                
                @yield('content')
                
            </div>
            <!-- /#page-wrapper -->
            
        </div>
        
        <!-- /#wrapper -->
    
        <!-- Bootstrap Core JavaScript -->
        <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
    
    </body>
</html>

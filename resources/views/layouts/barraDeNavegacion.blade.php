<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
	<link rel="stylesheet" href="/css/style.css">
	<link rel="shortcut icon"  href="/img/icono.png">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default">
        	  <div class="container">
        	    <!-- Brand and toggle get grouped for better mobile display -->
        	    <div class="navbar-header">
        	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        	        <span class="sr-only">Toggle navigation</span>
        	        <span class="icon-bar"></span>
        	        <span class="icon-bar"></span>
        	        <span class="icon-bar"></span>
        	      </button>
        	      <a class="navbar-brand" href="#">
        	     	 <i class="fa fa-home blue"></i>
        	      	Inicio
        	      </a>
        	    </div>

        	    <!-- Collect the nav links, forms, and other content for toggling -->
        	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        	      <ul class="nav navbar-nav">

        	        <li>
        	        	<a href="#" >
        	        		<i class="fa fa-envelope blue"></i>
        	        			Mensajes
        	        	</a>
        	        </li>

        	       
        	        <li>
        	        	<a href="">
        	        		<center>
        	        			<i class="fa fa-twitter blue posicion" ></i>
        	        		</center>
        	        	</a>
        	        </li>
        	      </ul>

        	      
        	      <ul class="nav navbar-nav navbar-right">

        	        

        	        <li>
        	        	<a href="" class="">
        	        		<!-- <img src="img/perfil.png" alt="" class="img-profile"> -->
                           Bienvenido: <b> {{Auth::user()->name}}</b>
        	        	</a>
        	        	
        	        </li>

        	        <li>
                        <div class="form-group has-feedback">
                                <input type="text" 
                                    class="form-control search" 
                                    placeholder="Busqueda..." 
                                >
                            <i class="fa fa-search search-icon form-control-feedback"></i>
                        </div>
                    </li>
        	        
        	      </ul>
        	    </div><!-- /.navbar-collapse -->
        	  </div><!-- /.container-fluid -->
        	</nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>

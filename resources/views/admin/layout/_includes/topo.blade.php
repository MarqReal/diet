
 <!DOCTYPE html>
  <html>
    <head>
    	<title>@yield('titulo')</title>
    	
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="/css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="/css/sweetalert2.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    
      <header>
		    <nav>
			    <div class="nav-wrapper deep-orange">
			      <a href="#!" class="brand-logo" style="white-space:nowrap;">Painel administrativo</a>
			      <a href="#" data-activates="mobile" class="button-collapse"><i class="material-icons">menu</i></a>
<!-- 			      <ul class="right hide-on-med-and-down">
			        <li><a href="/">Home</a></li>
			        @if(Auth::guest())
			        <li><a href="{{ route('login')}}">Login</a></li>
			        @else
			        <li><a href="{{ route('admin.cursos')}}">Cursos</a></li>
			        <li><a href="#">{{Auth::user()->name}}</a></li>
			        <li><a href="{{route('site.login.sair')}}">Sair</a></li>
			        @endif
			      </ul> -->
			      <ul class="side-nav" id="mobile">
			        <li><a href="/">Home</a></li>
			        <li><a href="/">Nutricionistas</a></li>
			        <li><a href="/">Alimentos</a></li>
			      </ul>
			    </div>
		  </nav>
      </header>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title></title>
      <link rel="stylesheet" href="/css/app.css">
      <!-- Compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
      {{-- jquery --}}
      {{-- material icons --}}
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


      <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
      crossorigin="anonymous"></script>
      <script src="/js/angular.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-messages/1.6.1/angular-messages.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
      <script src="/js/common-methods.js"></script>
      <!-- Compiled and minified JavaScript -->

      <script type="text/javascript" src="/js/init.js"></script>
      <script type="text/javascript" src="/js/image.preview.js"></script>
   </head>
   <body>
	  <!-- Dropdown Structure -->
{{-- 		<ul id="dropdown1" class="dropdown-content">
		  <li><a href="#!">Perfil</a></li>
		  <li><a href="#!">Salir</a></li>
		  <li class="divider"></li>
		  <li><a href="#!">three</a></li>
		</ul>
		<nav>
		  <div class="nav-wrapper">
		    <a href="#!" class="brand-logo">Logo</a>
		    <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
		    <ul class="right hide-on-med-and-down">
		      <li>
					<nav>
				    	<div class="nav-wrapper  ">
				      	<form>
				      	
				        		<div class="input-field">
				          		<input id="search" type="search" required ng-model="searchTarget" placeholder="Buscar">
				          		<label for="search"><i class="material-icons ">search</i></label>
				          		<i class="material-icons">close</i>
				        		</div>
				      	</form>
				    	</div>
				  	</nav>
		      </li>
		      <li><a href="badges.html">Components</a></li>
		      <!-- Dropdown Trigger -->
		      <li><a class="dropdown-button" href="#!" data-activates="dropdown1">{{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i></a></li>
		    </ul>
		  </div>
		</nav> --}}
      <ul id="slide-out" class="side-nav fixed">
         <li>
            <div class="userView">
               <div class="background">
                  <img src="/img/office.png">
               </div>
              <a href="#">
                <img class="circle" src="{{ Auth::user()->avatar }}">
              </a>
              <a href="#">
                <span class="black-text name">{{ Auth::user()->name }}</span>
              </a>
              <a href="#">
                <span class="black-text email">{{ Auth::user()->email }}</span>
              </a>
            </div>
         </li>
         @yield('navigation')
         <li>
            <a href="{{ url('/logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <i class="material-icons">exit_to_app</i>
            Logout
            </a>

            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
               {{ csrf_field() }}
            </form>
         </li>
      </ul>

      

      <div class="main">
      {{--        / <div class="container">
      --}}           
      @yield('main')
      {{--         </div>
      --}}
      </div>

   </body>
</html>

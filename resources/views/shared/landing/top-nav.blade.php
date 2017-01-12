<div class="top-nav-logos  grey lighten-5">
	<img src="/img/welcome/header.jpg" alt="" class="center">
</div>
<div class="row grey lighten-5 z-depth-1">
	<div class="col m12">
		
		<div class="container">
			<!-- Dropdown Structure -->
			<ul id="dropdown-landing" class="dropdown-content">
			  <li><a href="#!">one</a></li>
			  <li><a href="#!">two</a></li>
			  <li class="divider"></li>
			  <li><a href="#!">three</a></li>
			</ul>
			<!-- Dropdown Structure -->
			<ul id="dropdown-user-info" class="dropdown-content">
			  	<li>
			  		<a href="{{ url('/coordinador') }}">Home</a>
			  	</li>
			  	<li>
                    <a href="{{ url('/logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
			  <li class="divider"></li>
			  <li><a href="#!">three</a></li>
			</ul>
		  <nav class="z-depth-0">
		    <div class="nav-wrapper  grey lighten-5 nav-text ">
		      
		      <ul id="nav-mobile" class="center hide-on-med-and-down red-text">
		        <li><a href="{{ url('/') }}">Inicio</a></li>
		        <li><a href="#">Components</a></li>
		        <li><a href="#">JavaScript</a></li>
		        <li><a class="dropdown-button-landing" href="#!" data-activates="dropdown-landing">Dropdown<i class="material-icons right">arrow_drop_down</i></a></li>
		      </ul>
		      <ul id="nav-mobile" class="right hide-on-med-and-down red-text">
		      	@if (Auth::guest())
		      		<li><a href="{{ url('/login') }}" class="btn light-blue white-text">Acceso</a></li>
                @else
                	<li>
                		<a class="dropdown-button" href="#!" data-activates="dropdown-user-info"> 
                			{{ Auth::user()->name }}
                			<i class="material-icons right">arrow_drop_down</i>
                		</a>
                	</li>
                @endif
		        
		      </ul>
		    </div>
		  </nav>
		</div>
	</div>
	
</div>	
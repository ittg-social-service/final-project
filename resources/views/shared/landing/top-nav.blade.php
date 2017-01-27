<div class="top-nav-logos  grey lighten-5">
	<img src="/img/welcome/header.jpg" alt="" class="center responsive-img">
</div>
<div class="row grey lighten-5 z-depth-1">
	<div class="col m12">
		
		<div class="container">
			<!-- nuestro instituto dropdown -->
			<ul id="dropdown-landing" class="dropdown-content">
			  <li><a href="{{ url('/quienes-somos') }}">Quienes somos</a></li>
{{-- 			  <li><a href="#!">Mensaje del director</a></li>
 --}}			  <li class="divider"></li>
{{-- 			  <li><a href="#!">three</a></li>
 --}}			</ul>
			<!-- Dropdown Structure if user is loged in -->
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
		        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>

				<ul  class="center hide-on-med-and-down red-text">
					<li><a href="{{ url('/') }}">Inicio</a></li>
					<li>
						<a class="dropdown-button-landing" href="#!" data-activates="dropdown-landing">Nuestro instituto
							<i class="material-icons right">arrow_drop_down</i>
						</a>
					</li>
{{-- 					<li><a href="#">Components</a></li>
					<li><a href="#">JavaScript</a></li>
 --}}				</ul>
			    <ul class="right hide-on-med-and-down red-text">
			      	@if (Auth::guest())
			      		<li><a href="{{ url('/login') }}" class="btn light-blue white-text">Acceso</a></li>
	                @else
	                	<li >
	                		<a class="dropdown-button" href="#!" data-activates="dropdown-user-info">
	                			<img src="{{ Auth::user()->avatar }}" alt="" class="responsive-img photo circle landing-user__photo"> 
	                			{{ Auth::user()->name }}
	                			<i class="material-icons right">arrow_drop_down</i>
	                		</a>
	                	</li>
	                @endif
			        
			     </ul>
		        <ul class="side-nav" id="mobile-demo">
			       	<li><a href="{{ url('/') }}">Inicio</a></li>
			       	{{-- NUestrp instituto --}}
				    <li class="no-padding">
				        <ul class="collapsible collapsible-accordion">
				          	<li>
				            	<a class="collapsible-header">Nuestro instituto
				            		<i class="material-icons right">arrow_drop_down</i>
				            	</a>
					            <div class="collapsible-body">
					              	<ul>
					                	<li><a href="{{ url('/nosotros') }}">Quienes somos</a></li>
			  							<li><a href="#!">Mensaje del director</a></li>
{{-- 					                	<li><a href="#!">Third</a></li>
					                	<li><a href="#!">Fourth</a></li>
 --}}					              	</ul>
					            </div>
				          </li>
				        </ul>
				    </li>
				    {{-- Boton acceso o dropdown --}}
				    @if (Auth::guest())
			      		<li><a href="{{ url('/login') }}" class="btn light-blue white-text">Acceso</a></li>
	                @else
	                	<li class="no-padding">
					        <ul class="collapsible collapsible-accordion">
					          	<li>
					            	<a class="collapsible-header"><img src="{{ Auth::user()->avatar }}" alt="" class="responsive-img photo circle landing-user__photo">{{ Auth::user()->name }}
					            		<i class="material-icons right">arrow_drop_down</i>
					            	</a>
						            <div class="collapsible-body">
						              	<ul>
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
						              	</ul>
						            </div>
					          </li>
					        </ul>
				   	 	</li>
	                @endif
{{-- 				    <li><a href="{{ url('/') }}">Inicio</a></li>
 --}}			    </ul>
		    </div>
		  </nav>
		</div>
	</div>
	
</div>	
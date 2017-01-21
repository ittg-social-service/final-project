@extends('layouts.landing')
@section('content')
        <div class="container">
            <div class="row">
               <div class="col m5 offset-m4">
                  <div class="card-panel">
                     <h5 class="general-form__header center">Acceso al sistema</h5>
                     <div class="row">
                        <form class="col m12 s12" role="form" method="POST" action="{{ url('/login') }}">
                           {{ csrf_field() }}
                           <div class="row">
								      <div class="input-field col s12 m12">
								          <input id="username" name="username" type="text" class="validate {{ $errors->has('username') ? ' invalid' : '' }}" required autofocus>
								          <label for="username" data-error="{{ $errors->first('username') }}">Número de control o RFC</label>
								      </div>
								      <div class="input-field col s12 m12">
								          <input id="password" type="password" name="password" class="validate {{ $errors->has('password') ? ' invalid' : '' }}" required>
								          <label for="password" data-error="{{ $errors->first('password') }}">Contraseña</label>
							        	</div>
							      </div>
									<p>
								      <input type="checkbox" id="remember" name="remember" />
								      <label for="remember">Recordarme</label>
								   </p>
									<div class="row">

	                           <button type="submit" class="btn col m6 s6 offset-m3 offset-s3">
	                                Acceder
	                           </button>
									</div>
                           <div class="row">

	                           <div class="col m12 s12 ">
		                            <a class="login-form__reset center-align" href="{{ url('/password/reset') }}">
		                                ¿Olvidaste tu contraseña?
		                            </a>
	                           </div>
                           </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop
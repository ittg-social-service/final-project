@extends('layouts.coordinador')
@section('coord-content')
	<div ng-app="profile">
		<div ng-controller="profileController as vm">
			
			<div class="row">
				<div class="col s12 m12">
						<div class="card-panel white">
							<div class="row">
							 {!! Form::open(['route' => ['coordinator.update', $target], 'files' => true, 'method' => 'PUT'])!!}
								<div class="col s12 m4">
									<img src="{{$target->avatar}}" id="image" class="edit-driver-avatar responsive-img">
									<div class="file-field input-field">
										<div class="btn" class="blue">
											
											<i class="material-icons">file_upload</i>
											<input type="file" name="avatar" id="file" >
										</div>
										<div class="file-path-wrapper">
											<input class="file-path validate" type="text">
										</div>
									</div>
								</div>
								<div class="col s12 m8">
								 
										<div class="row">
											<div class="input-field col m4 s12">
												<input type="text" value="{{ $target->name }}" placeholder="Nombre" id="name" name="name" class="validate{{ $errors->has('name') ? ' invalid' : '' }}">
												<label for="name" data-error="{{ $errors->first('name') }}">Nombre</label>  
											</div>
											<div class="input-field col m4 s12">
												<input type="text" value="{{ $target->first_lastname }}" placeholder="A. paterno" id="first_lastname" name="first_lastname" class="validate{{ $errors->has('first_lastname') ? ' invalid' : '' }}">
												<label for="first_lastname" data-error="{{ $errors->first('first_lastname') }}">A. Paterno</label>  
											</div>
											<div class="input-field col m4 s12">
												<input type="text" value="{{ $target->second_lastname }}" placeholder="A. Materno" id="second_lastname" name="second_lastname" class="validate{{ $errors->has('second_lastname') ? ' invalid' : '' }}">
												<label for="second_lastname" data-error="{{ $errors->first('second_lastname') }}">A. Materno</label>  
											</div>
											
											<div class="input-field col m6 s12">
												<input type="email" value="{{ $target->email }}" placeholder="Correo" id="email" name="email" class="validate{{ $errors->has('email') ? ' invalid' : '' }}">
												<label for="email" data-error="{{ $errors->first('email') }}">Email</label>  
											</div>
											<div class="input-field col m6 s12">
												<input type="number" value="{{ $target->phone }}" placeholder="Telefono" id="phone" name="phone" length="10" class="validate{{ $errors->has('phone') ? ' invalid' : '' }}" >
												<label for="phone" data-error="{{ $errors->first('phone') }}">Telefono</label>  
											</div>
											<div class="input-field col m6 s12">
												<input type="text" value="{{ $target->username }}" placeholder="RFC" id="username" name="username" class="validate{{ $errors->has('username') ? ' invalid' : '' }}">
												<label for="username" data-error="{{ $errors->first('username') }}">RFC</label>  
											</div>
											<div class="col m5">
												<p>
											      <input type="checkbox" id="test5" name="changePassword" value="1" ng-checked="vm.changePassword" ng-click="vm.toggleChangePassword()"/>
											      <label for="test5" class="{{ $errors->has('password') ? '  red-text' : '' }}">Cambiar mi contraseña</label>
											   </p>
											</div>
											<div class="col s12 m12">
												
												<div class="row">

													<div class="input-field col m5 s12" ng-show="vm.changePassword">
														<input type="password" placeholder="Contraseña" id="password" name="password" class="validate{{ $errors->has('password') ? '  invalid' : '' }}">
														<label for="password" data-error="{{ $errors->first('password') }}">Contraseña</label>  
													</div>
													<div class="input-field col m5 s12" ng-show="vm.changePassword">
														<input type="password"" placeholder="Confirmar contraseña" id="password_confirmation" name="password_confirmation" class="validate{{ $errors->has('password_confirmation') ? ' invalid' : '' }}">
														<label for="password_confirmation" data-error="{{ $errors->first('password_confirmation') }}">Confirmar contraseña</label>  
													</div>
												</div>
											</div>
											<div class="input-field col m6 s12 offset-m3">
												<button class="btn waves-effect waves-light" type="submit" name="action">Actualizar
												<i class="material-icons right">send</i>
											</button>
											</div>
											
								
										</div>


								</div>
									{!! Form::close()!!}
							</div>
						</div>
					</div>
				</div>
		</div>
	</div>
		@include('shared.session-status')

	<script src="/js/coordinador/profile.js"></script>
@stop
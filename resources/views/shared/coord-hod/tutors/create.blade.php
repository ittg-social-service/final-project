
{!! Form::open(['route' => 'tutor.store']) !!}
	<div class="row">
		<div class="col m4 s12 card-panel white offset-m4">
			<div class="row">
				<div class="col m12 s12">
					<h5 class="center general-form__header">Nuevo Tutor</h5>
				</div>
		        <div class="input-field col s6 m12"> 
		         	<input id="name" type="text" class="validate {{ $errors->has('name') ? ' invalid' : 'valid' }}" name="name" required>
		         	<label for="name" data-error="{{ $errors->first('name') }}">Nombre</label>
		        </div>
		        <div class="input-field col s6 m12"> 
		         	<input id="first_lastname" type="text" class="validate {{ $errors->has('first_lastname') ? ' invalid' : 'valid' }}" name="first_lastname" required>
		          	<label for="first_lastname" data-error="{{ $errors->first('first_lastname') }}">A.Paterno</label>
		        </div>
		        <div class="input-field col s6 m12"> 
		         	<input id="second_lastname" type="text" class="validate {{ $errors->has('second_lastname') ? ' invalid' : 'valid' }}" name="second_lastname" required>
		          	<label for="second_lastname" data-error="{{ $errors->first('second_lastname') }}">A.Materno</label>
		        </div>
		        <div class="input-field col s6 m12"> 
		          <input id="nc" type="text" class="validate {{ $errors->has('nc') ? ' invalid' : 'valid' }}" name="nc" required>
		          <label for="nc" data-error="{{ $errors->first('nc') }}">RFC</label>
		        </div>
	      		<button class="btn waves-effect waves-light col s12 m6 offset-m3" type="submit" name="action">Guardar
	                <i class="material-icons right">send</i>
	            </button>
			</div>
		</div>
	</div>
{!! Form::close() !!}
@include('shared.session-status')
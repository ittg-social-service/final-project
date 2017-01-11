
@extends('layouts.jefe')
@section('jefe-content')
  {!! Form::open(['route' => 'tutor.store']) !!}
    <div class="row">
		<div class="col m4 s12 card-panel white offset-m4">
			<div class="row">
				<div class="col m12 s12">
					<h5 class="center">Nuevo Tutor</h5>
				</div>
	        <div class="input-field col s6 m12"> 
	          <input id="nc" type="text" class="validate {{ $errors->has('nc') ? ' invalid' : 'valid' }}" name="nc" required>
	          <label for="nc" data-error="{{ $errors->first('nc') }}">N.Tarjeta</label>
	        </div>
	      <button class="btn waves-effect waves-light col s12 m6 offset-m3" type="submit" name="action">Guardar
	                    <i class="material-icons right">send</i>
	                  </button>
			</div>
		</div>
    </div>
  {!! Form::close() !!}
@endsection

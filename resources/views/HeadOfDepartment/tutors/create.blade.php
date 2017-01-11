
@extends('layouts.jefe')
@section('jefe-content')
  {!! Form::open(['route' => 'tutor.store']) !!}
    <div class="row">
        <div class="input-field col s6">
          <input id="name" type="text" class="validate" name="name" required>
          <label for="name">Nombre</label>
        </div>
        <div class="input-field col s6">
          <input id="lastn1" type="text" class="validate" name="lastn1" required>
          <label for="lastn1">Apellido</label>
        </div>
        <div class="input-field col s6">
          <input id="ncontrol" type="text" class="validate" name="ncontrol" required>
          <label for="ncontrol">N.Control</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input  id="phone" type="number" class="validate" name="phone" required>
          <label for="phone">N.telefono</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input  id="email" type="email" class="validate" name="email" required>
          <label for="email">correo</label>
        </div>
      </div>
      <button class="btn waves-effect waves-light" type="submit" name="action">Guardar
                    <i class="material-icons right">send</i>
                  </button>
  {!! Form::close() !!}
@endsection

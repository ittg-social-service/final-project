@extends('layouts.coordinador')
@section('coord-content')
	<div class="row">
          <div class="col s12 m12">
        <div class="card-panel white">
          <div class="row">
           {!! Form::open(['route' => ['coordinator.update', $target], 'files' => true, 'method' => 'PUT'])!!}
            <div class="col s12 m4">
              <img src="{{$target->photo}}" id="image" class="edit-driver-avatar responsive-img">
              <div class="file-field input-field">
                <div class="btn" class="blue">
                  
                  <i class="material-icons">file_upload</i>
                  <input type="file" name="photo" id="file" >
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
                    <input type="text" value="{{ $target->lastn1 }}" placeholder="A. paterno" id="lastn1" name="lastn1" class="validate{{ $errors->has('lastn1') ? ' invalid' : '' }}">
                    <label for="lastn1" data-error="{{ $errors->first('lastn1') }}">A. Paterno</label>  
                  </div>
                  <div class="input-field col m4 s12">
                    <input type="text" value="{{ $target->lastn2 }}" placeholder="A. Materno" id="lastn2" name="lastn2" class="validate{{ $errors->has('lastn2') ? ' invalid' : '' }}">
                    <label for="lastn2" data-error="{{ $errors->first('lastn2') }}">A. Materno</label>  
                  </div>
                  <div class="input-field col m6 s12">
                    <input type="text" value="{{ $target->phone }}" placeholder="Telefono" id="phone" name="phone" class="validate{{ $errors->has('phone') ? ' invalid' : '' }}">
                    <label for="phone" data-error="{{ $errors->first('phone') }}">Telefono</label>  
                  </div>
                  <div class="input-field col m6 s12">
                    <input type="text" value="{{ $target->email }}" placeholder="Direcion" id="email" name="email" class="validate{{ $errors->has('email') ? ' invalid' : '' }}">
                    <label for="email" data-error="{{ $errors->first('email') }}">Email</label>  
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
@stop
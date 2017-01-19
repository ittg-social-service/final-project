<div class="row">
          <div class="col s12 m12">
        <div class="card-panel white">
          <div class="row">
           {!! Form::open(['route' => ['tutor.update', $target], 'files' => true, 'method' => 'PUT'])!!}
            <div class="col s12 m4">
              <img src="{{$target->avatar}}" id="image" class="edit-driver-avatar responsive-img">
              <div class="file-field input-field">
                <div class="btn" class="blue">
                  <span>Foto</span>
                  <input type="file" name="avatar" id="file" >
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text">
                </div>
              </div>
              <span class="red-text center-align">{{ $errors->first('avatar') }}</span>
            </div>
            <div class="col s12 m8">
             
                <div class="row">
                  <div class="input-field col m4 s12">
                    <input type="text" value="{{ $target->name }}"  id="name" name="name" class="validate{{ $errors->has('name') ? ' invalid' : '' }}">
                    <label for="name" data-error="{{ $errors->first('name') }}">Nombre</label>  
                  </div>
                  <div class="input-field col m4 s12">
                    <input type="text" value="{{ $target->first_lastname }}"  id="first_lastname" name="first_lastname" class="validate{{ $errors->has('first_lastname') ? ' invalid' : '' }}">
                    <label for="first_lastname" data-error="{{ $errors->first('first_lastname') }}">A. Paterno</label>  
                  </div>
                  <div class="input-field col m4 s12">
                    <input type="text" value="{{ $target->second_lastname }}" id="second_lastname" name="second_lastname" class="validate{{ $errors->has('second_lastname') ? ' invalid' : '' }}">
                    <label for="second_lastname" data-error="{{ $errors->first('second_lastname') }}">A. Materno</label>  
                  </div>
                  <div class="input-field col m6 s12">
                    <input type="text" value="{{ $target->phone }}"  id="phone" name="phone" class="validate{{ $errors->has('phone') ? ' invalid' : '' }}">
                    <label for="phone" data-error="{{ $errors->first('phone') }}">Telefono</label>  
                  </div>
                  <div class="input-field col m6 s12">
                    <input type="email" value="{{ $target->email }}"  id="email" name="email" class="validate{{ $errors->has('email') ? ' invalid' : '' }}">
                    <label for="email" data-error="{{ $errors->first('email') }}">Email</label>  
                  </div>
                   <div class="input-field col m6 s12">
                    <input type="text" value="{{ $target->username }}" id="username" name="username" class="validate{{ $errors->has('username') ? ' invalid' : '' }}">
                    <label for="username" data-error="{{ $errors->first('username') }}">RFC</label>  
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
@extends('layouts.student-dashboard')
@section('student-dash-content')
  <h4>Información del alumno</h4>
  @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

  {!!Form::model($user,['route'=>['edit.student',Auth::user()],'method'=>'PATCH','files'=>true,'class'=>'col s12'])!!}
    {{csrf_field()}}
    <div class="row">

      <div class="col s5">
        <img src="{{url('/')}}/{{$user->avatar}}" id="image" class="edit-driver-avatar responsive-img">
        <div class="file-field input-field">
          <div class="btn" class="blue">
            <span>Foto</span>
            <input type="file" name="avatar" id="file" accept="img/*">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
          </div>
        </div>
      </div>
      <div class="input-field col s4">
        <i class="material-icons prefix">perm_identity</i>
        {!!form::text('code',Auth::user()->nc,['id'=>'control_number','class'=>'validate','disabled']) !!}
        {!!form::label('control_number', 'Número de control',['class'=>'active'])!!}
      </div>
    </div>
    <div class="row">
      <div class="input-field col s4">
        <i class="material-icons prefix">account_circle</i>
        {!!form::text('name',null,['id'=>'name','class'=>'validate']) !!}
        {!!form::label('name', 'Nombre',['class'=>'active'])!!}
      </div>
      <div class="input-field col s4">
        {!!form::text('first_lastname',null,['id'=>'first_lastname','class'=>'validate']) !!}
        {!!form::label('first_lastname', 'Apellido Paterno',['class'=>'active'])!!}
      </div>
      <div class="input-field col s4">
        {!!form::text('second_lastname',null,['id'=>'second_lastname','class'=>'validate']) !!}
        {!!form::label('second_lastname', 'Apellido Materno',['class'=>'active'])!!}
      </div>
    </div>
    <div class="row">
      <div class="input-field col s6">
        <i class="material-icons prefix">phone</i>
        {!!form::tel('phone',null,['id'=>'phone','class'=>'validate']) !!}
        {!!form::label('celphone', 'Telefono',['class'=>'active'])!!}
      </div>
      <div class="input-field col s6">
        <i class="material-icons prefix">email</i>
        {!!form::email('email',null,['id'=>'email','class'=>'validate']) !!}
        {!!form::label('email', 'E-mail',['class'=>'active'])!!}
      </div>
    </div>
    <div class="row">
      <div class="input-field col s6">
        <select name="career_id">
          <option value="" disabled selected>{{Auth::user()->student->career->name}}</option>
          @foreach ($careers as $career)
            <option value="{{$career->id}}">{{$career->name}}</option>
          @endforeach
        </select>
        <label>Elige tu carrera</label>
      </div>
      <div class="input-field col s6">
        <i class="material-icons prefix">vpn_key</i>
        {!!form::password('password',null,['id'=>'password','class'=>'validate']) !!}
        {!!form::label('password', 'password',['class'=>'active'])!!}
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
        {!!form::submit('Actualizar',['id'=>'update','name'=>'update','class'=>'btn waves-effect waves-light']) !!}
      </div>
    </div>
  {!!Form::close()!!}
  <script type="text/javascript">
  $(document).ready(function() {
  $('select').material_select();
});
  </script>


@endsection

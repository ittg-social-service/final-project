@extends('layouts.teacher-dashboard')
@section('teacher-dash-content')

  <h4>{{$activity->title}}</h4>
  <p>
    {{$activity->description}}
  </p>
  <p class="red-text">
    Esta actividad ya fue asignada con fecha: {{$is_update->finish_date->format('d/m/Y')}}

  </p>
  {!!Form::open(['route'=>['activities.update',$is_update],'method'=>'PATCH','class'=>'col s12'])!!}

      {{csrf_field()}}
      <label for="finish_date">Fecha límite de entrega</label>
      <div class="input-field col m2 ">
        <i class="material-icons prefix">event</i>
        <input id="finish_date" type="date" class="datepicker" name="finish_date" placeholder="Fecha Límite de entrega" required>
      </div>
      <div class="input-field col s12">
        {!!form::submit('Cambiar fecha',['id'=>'update','name'=>'update','class'=>'btn waves-effect waves-light']) !!}
      </div>
      {!!Form::close()!!}

  @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li><strong class="red-text text-darken-2">{{ $error }}</strong></li>

            @endforeach
        </ul>
    </div>
  @endif

  <script type="text/javascript">
      $('.datepicker').pickadate({
      format: 'yyyy-mm-dd 23:59:00',
      selectMonths: true, // Creates a dropdown to control month
      selectYears: 15 // Creates a dropdown of 15 years to control year
    });
  </script>
@endsection

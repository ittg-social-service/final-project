@extends('layouts.teacher-dashboard')
@section('teacher-dash-content')

  <h4>{{$activity->title}}</h4>
  <p>
    {{$activity->description}}
  </p>
  <form class="col s12" action="{{route('activities.store')}}" method="POST">
    {{csrf_field()}}

    <input type="hidden" name="activity_id" value="{{$activity->id}}">
    <input type="hidden" name="teacher_id" value="{{Auth::user()->tutor->id}}">
    <input type="hidden" name="group_id" value="{{$group->id}}">
    <label for="finish_date">Fecha límite de entrega</label>
    <div class="input-field col m2 ">
      <i class="material-icons prefix">event</i>
      <input id="finish_date" type="date" class="datepicker" name="finish_date" placeholder="Fecha Límite de entrega" required>
    </div>
    @if ($is_update)
      <button type="submit" name="button" class="waves-effect waves-light btn blue darken-4" disabled=""><i class="material-icons left">done </i>Activar</button>
      <br>
      <strong class="red-text">Esta actividad ya fue activida con fecha: {{$is_update->finish_date->format('d/m/Y')}}</strong>
    @else
      <button type="submit" name="button" class="waves-effect waves-light btn blue darken-4"><i class="material-icons left">done </i>Activar</button>
    @endif

  </form>
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

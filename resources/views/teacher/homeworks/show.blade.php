@extends('layouts.teacher-dashboard')
@section('teacher-dash-content')
  <div class="row">
    <div class="col s9">
      <h4>Detalles de tarea: @if ($homework->status)
        Aceptada
      @endif</h4>

    </div>
    <div class="col s3">
      <div class="collection ">
        <a href="#" class="collection-item cyan-text"><span class="badge">{{$intents}}</span>Intentos del alumno:</a>
      </div>
  </div>

  <div class="row">
    <div class="col s12">
      <ul class="collapsible" data-collapsible="accordion">
        <li>
          <div class="collapsible-header active"><i class="material-icons">visibility</i>Ver tarea del alumno.</div>
          <div class="collapsible-body">
            <embed src="{{url('/')}}/{{$homework->file}}" width="800" height="500" href="">
          </div>
        </li>
      </ul>
    </div>
  </div>

  <div class="col s12">
    <h5>Observaciones realizadas:</h5>
    <ul class="collapsible" data-collapsible="accordion">
      @foreach ($observations as $observation)
        <li class="black-text">
          <div class="collapsible-header"><i class="material-icons">visibility</i>{{$observation->comments}}</div>
          <div class="collapsible-body">
            @if ($observation->file!=null)
              <embed src="{{url('/')}}/{{$observation->file}}" width="800" height="500" href="{{url('/')}}/{{$observation->file}}">
            @else
              <p>
                El alumno no ha reenviado la actividad.
              </p>
            @endif


          </div>
        </li>

      @endforeach
    </ul>
  </div>

  <div class="fixed-action-btn horizontal">
    <a class="btn-floating btn-large red">
      <i class="large material-icons">mode_edit</i>
    </a>
    <ul>
      <li>
        {!!Form::open(['route'=>['homeworks.update',$homework],'method'=>'PATCH'])!!}
          <button type="submit" class="btn-floating green tooltipped" data-position="top" data-delay="50" data-tooltip="Marcar como aceptada"><i class="material-icons">done</i></button>
        {!!Form::close()!!}
      </li>
      <li>
        <a href="{{route('observations.edit',$homework)}}" class="btn-floating cyan tooltipped" data-position="top" data-delay="50" data-tooltip="Hacer observación"><i class="material-icons">comment</i></a>
      </li>
    </ul>
  </div>
@endsection

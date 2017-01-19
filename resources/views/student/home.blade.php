@extends('layouts.student-dashboard')
@section('student-dash-content')
  <ul class="collection with-header">
    <li class="collection-header"><h4>Material para el alumno</h4></li>
    <li class="collection-item">
      <div>Cuaderno de trabajo de tutoria
        <a href="{{url('/pdf/cuaderno_trabajo.pdf')}}" class="secondary-content blue-text text-darken-4">
          Descargar <i class="fa fa-cloud-download" aria-hidden="true"></i>
        </a>
      </div>
    </li>
  </ul>
  <h3>Mis actividades:</h3>
  <div class="row">
    @foreach ($activities as $activity)
      <div class="col s4">
        <div class="card blue darken-4">
          <div class="card-content white-text">
            <span class="card-title">Nueva tarea:</span>
            <p>

              {{str_limit($activity->title, 25)}}
            </p>
          </div>
          <div class="card-action">
            <a href="activity/{{$activity->id}}/homework/{{$activity->id_activity_tutor}}" class="yelow-text ">Ver datalles de tarea</a>
          </div>
        </div>
      </div>
    @endforeach
    <div class="row">
      <div class="col s9 offset-s3">
        {{ $activities->links() }}
      </div>
    </div>


@endsection

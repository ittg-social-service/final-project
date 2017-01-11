@extends('layouts.teacher-dashboard')
@section('teacher-dash-content')
  <p>
    Filtrar por semestre:
  </p>
  <!-- Dropdown Trigger -->
<a class='dropdown-button btn blue darken-4' href='#' data-activates='dropdown1'>Seleccione semestre:</a>

<!-- Dropdown Structure -->
<ul id='dropdown1' class='dropdown-content'>
  <li><a href="{{url('teacher/group')}}/{{$group_id}}/activities/1">1ero</a></li>
  <li class="divider"></li>
  <li><a href="{{url('teacher/group')}}/{{$group_id}}/activities/2">2do</a></li>
  <li class="divider"></li>
  <li><a href="{{url('teacher/group')}}/{{$group_id}}/activities/3">3ro</a></li>
  <li class="divider"></li>
  <li><a href="{{url('teacher/group')}}/{{$group_id}}/activities/4">4to</a></li>
</ul>

    <table class="highlight">
        <thead>
          <tr>
              <th data-field="title">Nombre de actividad</th>
              <th data-field="description">Descripcion</th>
              <th data-field="options">Opciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($activities as $activity)
            <tr>
              <td>{{$activity->title}}</td>
              <td>{{$activity->description}}</td>
              <td>
                <a class="waves-effect waves-light btn blue darken-4" href="{{url('teacher/group/')}}/{{$group_id}}/activity/{{$activity->id}}">
                  <i class="material-icons">alarm_on</i>
                  Habilitar
                </a>
              </td>
            </tr>

          @endforeach
        </tbody>
      </table>

@endsection

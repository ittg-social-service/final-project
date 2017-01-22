@extends('layouts.student-dashboard')
@section('student-dash-content')
  <ul class="collection with-header z-depth-2">
    <li class="collection-header"><h4>Material para el alumno</h4></li>
    <li class="collection-item">
      <div>Cuaderno de trabajo de tutoria
        <a href="{{url('/pdf/cuaderno_trabajo.pdf')}}" class="secondary-content blue-text text-darken-4">
          Descargar <i class="fa fa-cloud-download" aria-hidden="true"></i>
        </a>
      </div>
    </li>
    <li class="collection-item">
        <div>Plan de acción tutorial 1er semestre.
          <a href="{{url('/pdf/plan_accion_tutorial.pdf')}}" class="secondary-content blue-text text-darken-4"  >
            Descargar <i class="fa fa-cloud-download" aria-hidden="true"></i>
          </a>
        </div>
      </li>
  </ul>
  <h3>Mis actividades:</h3>
    <div class="row">
      <table class="bordered highlight responsive-table z-depth-2 centered">
        <thead>
          <tr>
              <th>
                .
              </th>
              <th data-field="name">Actividad</th>
              <th data-field="date">Fecha límite de entrega</th>

              <th data-field="action">Acción</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($activities as $activity)
            <tr>
              <td>
                @if ($activity->finish_date>$now)
                  <i class="material-icons">info_outline</i>
                @endif
              </td>
              <td>

                {{str_limit($activity->titlee, 25)}}</td>
              <td>
                <i class="material-icons">restore</i>-
                {{str_limit($activity->finish_date, 11)}}

              </td>
              <td>
                <a href="activity/{{$activity->activity_id}}/homework/{{$activity->id}}" class="btn-floating cyan tooltipped green" data-position="top" data-delay="40" data-tooltip="Ver detalles">
                  <i class="material-icons">assignment</i>
                </a>
              </td>
            </tr>
          @endforeach

        </tbody>
      </table>
    </div>
    <div class="row">
      <div class="col s9 offset-s3 ">
        {{ $activities->links() }}
      </div>
    </div>
@endsection

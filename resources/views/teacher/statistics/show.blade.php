@extends('layouts.teacher-dashboard')
@section('teacher-dash-content')
    <h4>Reporte de actividades</h4>
    <h5>
      Total de alumnos: {{$t_students}}
    </h5>
    <table class="striped ">
        <thead>
          <tr>
              <th data-field="title">Actividad</th>
              <th data-field="description">Entregados</th>
              <th data-field="options">% de participiacón</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($activities as $activity)
            <tr>
              <th>
                {{str_limit($activity->title,25)}}
              </th>
              <th>
                {{$activity->total}}/{{$t_students}}
              </th>
              <th>
                <span class="blue-text">
                  @if ($t_students>0)
                    {{str_limit((100/$t_students) *$activity->total, 5)}}%
                  @endif
                </span>
              </th>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="fixed-action-btn horizontal">
        <a class="btn-floating btn-large red">
          <i class="large material-icons">mode_edit</i>
        </a>
        <ul>
          <li>
            <a href="{{url('teacher/group/')}}/{{$group_id}}/statistics" class="btn-floating cyan tooltipped" data-position="top" data-delay="50" data-tooltip="Imprimir información">                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
</a>
          </li>
        </ul>
      </div>


@endsection

@extends('layouts.teacher-dashboard')
@section('teacher-dash-content')
  <h4>Estudiante: {{$student->name}} {{$student->first_lastname}} {{$student->second_lastname}}</h3>
  <table class="striped">
    <thead>
      <tr>
        <th>
          Nombre
        </th>
        <th>
          Entregó
        </th>
        <th>
          Estado
        </th>
        <th>
          Acción
        </th>

      </tr>
    </thead>
    <tbody>
      @foreach ($homeworks as $homework)
        <tr>
          <th>
            Actividad {{$homework->activity_id}}
          </th>

          <th>
            {{$homework->created_at->diffForHumans()}}
          </th>
          <th>
            @if ($homework->status)
              <span class="green-text">Aceptada.</span>
            @else
              <span class="red-text">Aún no aceptada.</span>
            @endif
          </th>
          <th>
            <a href="{{route('homeworks.show',$homework->id)}}" class="btn-floating cyan tooltipped green" data-position="top" data-delay="50" data-tooltip="Revisar"><i class="material-icons">visibility</i></a>
          </th>
        </tr>
      @endforeach

    </tbody>
  </table>
@endsection

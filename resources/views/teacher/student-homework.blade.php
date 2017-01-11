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
            <a href="{{url('/')}}/{{$homework->file}}" class="blue-text text-darken-2">Revisar tarea</a>
          </th>
        </tr>
      @endforeach

    </tbody>
  </table>
@endsection

@extends('layouts.teacher-dashboard')
@section('teacher-dash-content')
  <table class="highlight">
    <thead>
      <tr>
        <th>
          N.C.
        </th>
        <th>
          Apellido P.
        </th>
        <th>
          Apellido M.
        </th>
        <th>
          Nombre
        </th>
        <th>
          Opciones
        </th>
      </tr>
    </thead>
    <tbody>
      @foreach ($students as $student)
        <tr>
          <th>
            {{$student->user->username}}
          </th>
          <th>
            {{$student->user->first_lastname}}
          </th>
          <th>
            {{$student->user->second_lastname}}
          </th>
          <th>
            {{$student->user->name}}
          </th>
          <th>
            <a href="{{url('teacher/student')}}/{{$student->id}}/homeworks" class="blue-text darken-4">ver tareas del alumno</a>
          </th>
        </tr>
      @endforeach

    </tbody>
  </table>
@endsection

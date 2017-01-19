@extends('layouts.student-dashboard')
@section('student-dash-content')
  <div class="col s12 m7">
    <h2 class="header">Mi tutor</h2>
    <div class="card horizontal">
      <div class="card-image">
        <img src="{{url('/')}}/{{$info_teacher->user->avatar}}">
      </div>
      <div class="card-stacked">
        <div class="card-content">
          <p>
              <ul>
                <li>Nombre: {{$info_teacher->user->name}}</li>
                <li>
                  Apellidos: {{$info_teacher->user->first_lastname}} {{$info_teacher->user->second_lastname}}
                </li>

                <li>Email: {{$info_teacher->user->email}}</li>

              </ul>

          </p>
        </div>
        <div class="card-action">
          <a href="/student/home">Regresar</a>
        </div>
      </div>
    </div>
  </div>

@endsection

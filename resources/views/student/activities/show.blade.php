@extends('layouts.student-dashboard')
@section('student-dash-content')
  <div class="col s12 m7">
    <h2 class="header">Enviar tarea</h2>

    <div class="card horizontal">
      <div class="card-image">
        <img src="">
      </div>
      <div class="card-stacked">
        <div class="card-content">
            <strong>Nombre de actividad: {{$activity->title}}</strong><br>
            <strong>Descripción de actividad:
            {{$activity->description}}</strong>
            <br><br>
            @if ($homework->finish_d)
                {!!Form::open(['url'=>'student/activities','method'=>'POST','files'=>true])!!}
                  {{csrf_field()}}
                  {!! Form::label('Selecciona un archivo') !!}
                  <input type="hidden" value="{{$activity->id}}" name="activity_id">
                  <div class="file-field input-field">
                    <div class="btn">
                      <span>archivo</span>
                      {!! Form::file('file',['accept'=>'.pdf']) !!}
                    </div>
                    <div class="file-path-wrapper">
                      <input class="file-path validate" type="text" placeholder="Selecciona tu tarea" required>
                    </div>
                  </div>
                  @if (!$enabled)
                    {!! Form::submit('Enviar',['class'=>'btn']) !!}
                  @else
                    <div class="chip">
                      Tarea entregada.
                      <i class="close material-icons">close</i>
                    </div>
                  @endif
                  <br>

                {!! Form::close() !!}
              @else
                <p>
                  <strong class="red-text">!La fecha de entrega ha finalizado¡</strong>
                </p>
              @endif
        </div>
        <div class="card-action">
          <a href="{{url('student/home')}}" class="red-text">Cancelar</a>
        </div>
      </div>
    </div>
  </div>



@endsection

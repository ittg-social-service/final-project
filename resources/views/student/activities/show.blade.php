@extends('layouts.student-dashboard')
@section('student-dash-content')
  <div class="row">
    <div class="col s7">
      <h4 class="header">Enviar tarea</h4>

      <div class="card horizontal">
        <div class="card-image">
          <img src="">
        </div>
        <div class="card-stacked">
          <div class="card-content">
              <h6><strong>Nombre de actividad: {{$activity->title}}</strong><br><br></h6>
              <strong>Descripción de actividad:
              {{$activity->description}}</strong>

              <blockquote>
                <p>Instrucciones: Descargar el material de apoyo y realiza las actividades que ahí se encuentran, al completar tu actividad sube el archivo en <span class="red-text">formato PDF</span> para que tu actividad sea revisada por tu tutor.
                </p>
              </blockquote>

              <blockquote>Material de apoyo: <a href="{{$activity->file}}" class="blue-text text-darken-4" download="{{$activity->title}}"> descargar <i class="fa fa-cloud-download" aria-hidden="true"></i></a></blockquote>
              
              <br><br>
              @if ($homework->finish_d)
                  {!!Form::open(['url'=>'student/activities','method'=>'POST','files'=>true])!!}
                    {{csrf_field()}}
                    {!! Form::label('Selecciona un archivo') !!}
                    <input type="hidden" value="{{$activity->id}}" name="activity_id">
                    <div class="file-field input-field">
                      <div class="btn">
                        <span>archivo</span>
                        {!! Form::file('file',['accept'=>'.pdf'])!!}
                      </div>
                      <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Selecciona tu tarea" required>
                      </div>
                    </div>
                    @if (!$enabled)
                      {!! Form::submit('Enviar',['class'=>'btn']) !!}
                    @else
                      <div class="chip green">
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
    <div class="col s5">
      <br><br>
      <h4>Observaciones:</h4>

      @if ($extra!=null)

        <ul class="collapsible" data-collapsible="accordion">
          @if ($enabled->status)
            <li>
              <div class="collapsible-header"><i class="material-icons">done</i><strong class="green-text">Aceptada</strong></div>
              <div class="collapsible-body"><p >Tu tarea fue revisada y marcada como aceptada.</p></div>
            </li>
          @endif
          @foreach ($extra as $observation)
            <li>
              <div class="collapsible-header"><i class="material-icons">error_outline</i>Observación</div>
              <div class="collapsible-body"><p>{{$observation->comments}}</p></div>
            </li>
          @endforeach
        </ul>
      @endif
    </div>


  </div>
  @if ($extra!=null)

      <div class="row">
        <p>
          @foreach ($extra as $observation)

            @if ($observation->new_date!=null)
              <blockquote>
                Tu tarea ya fue revisada.<br> Necesitas hacer mejoras, revisa las observaciones y envia tu tarea de nuevo.
              
              </blockquote>
        </p>
            <div class="col s9">
              <h5 class="header">Enviar tarea de nuevo</h5>

              <div class="card horizontal">
                <div class="card-image">
                  <img src="">
                </div>
                <div class="card-stacked">
                  <div class="card-content">
                      <strong>Nombre de actividad: {{$activity->title}}</strong><br>
                      <strong>Descripción de actividad:
                      {{$activity->description}}</strong><br>
                      <blockquote><strong>Puedes renviar esta tarea con fecha limite: {{$observation->new_date->format('d/m/Y')}}</strong></blockquote>
                                            <br><br>

                      {!!Form::open(['route'=>['student.observations.update',$observation->id],'method'=>'PATCH','files'=>true,'class'=>'col s12'])!!}
                        {{csrf_field()}}
                        {!! Form::label('Selecciona un archivo') !!}
                        <div class="file-field input-field">
                          <div class="btn">
                            <span>archivo</span>
                            {!! Form::file('file',['accept'=>'.pdf']) !!}
                          </div>
                          <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Selecciona tu tarea" required>
                          </div>
                        </div>
                        @if ($observation->file!=null)
                          <div class="chip green">
                            Tarea entregada.
                            <i class="close material-icons">close</i>
                          </div>
                        @else
                          @if ($observation->finish_d)
                            {!! Form::submit('Reenviar',['class'=>'btn']) !!}

                          @else

                            <div class="chip">
                              La fecha límite de entrega ha vencido.
                              <i class="close material-icons">close</i>
                            </div>
                          @endif

                        @endif


                      {!!Form::close()!!}
                  </div>
                  <div class="card-action">
                    <a href="{{url('student/home')}}" class="red-text">Cancelar</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          @endif
        @endforeach


  @endif

@endsection

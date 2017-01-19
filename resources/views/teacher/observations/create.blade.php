@extends('layouts.teacher-dashboard')
@section('teacher-dash-content')
  <div class="col s12 m7">
    <h5>Enviar observación</h5>
    <div class="card horizontal">

      <div class="card-stacked">
        <div class="card-content">
          {!!Form::open(['route'=>['observations.update',$homework],'method'=>'PATCH'])!!}
          <div class="input-field col s4">
            <i class="material-icons prefix">comment</i>
            {!!form::text('comments',null,['id'=>'comments','class'=>'validate']) !!}
            {!!form::label('observations', 'Observaciones',['class'=>'active'])!!}
          </div>
          <p class="red-text">
            En caso de que el alumno necesite mejorar el trabajo, por favor asigne una nueva fecha de entrega límite.
          </p>
          <label for="finish_date">Fecha límite de entrega</label>
          <div class="input-field col m2 ">
            <i class="material-icons prefix">event</i>
            <input id="new_date" type="date" class="datepicker" name="new_date" placeholder="Fecha Límite de entrega">
          </div>
          {!!form::submit('Enviar',['id'=>'update','name'=>'update','class'=>'btn waves-effect waves-light']) !!}

          {!!Form::close()!!}
        </div>
        <div class="card-action">
          <a href="/student/home">Regresar</a>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
      $('.datepicker').pickadate({
      format: 'yyyy-mm-dd 23:59:00',
      selectMonths: true, // Creates a dropdown to control month
      selectYears: 15 // Creates a dropdown of 15 years to control year
    });
  </script>

@endsection

@extends('layouts.teacher-dashboard')
@section('teacher-dash-content')
    @if($enabled)
      <p>
        La actividad fue activada correctamente.
      </p>
    @endif

    <ul class="collection with-header">
      <li class="collection-header"><h4>Material para el profesor</h4></li>
      <li class="collection-item">
        <div>Manual del tutor
          <a href="{{url('/pdf/manual_tutor.pdf')}}" class="secondary-content blue-text darken-4"  >
            Descargar <i class="fa fa-cloud-download" aria-hidden="true"></i>
          </a>
        </div>
      </li>
    </ul>
    <h3>Mis Grupos</h3>
    <table class="striped">
        <thead>
          <tr>
              <th>
                ID
              </th>
              <th data-field="title">Clave</th>
              <th data-field="description">Nombre</th>
              <th data-field="options">Opciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($groups as $group)
            <tr>
              <td>{{$group->id}}</td>
              <td>{{$group->key}}</td>
              <td>{{$group->period}}</td>
              <td>
                <!-- Dropdown Trigger -->
                <a class='dropdown-button btn  blue darken-4' href='' data-activates='dropdown{{$group->id}}'>Ver opciones</a>
                <!-- Dropdown Structure -->
                <ul id='dropdown{{$group->id}}' class='dropdown-content  blue darken-4'>
                  <li><a href="group/{{$group->id}}/pdf" class="black-text text-darken-2">
                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                    Lista de alumnos</a>
                  </li>
                  <li><a href="group/{{$group->id}}/activities/1" class="black-text text-darken-2">Asignar tarea</a></li>
                  <li><a href="{{url('teacher/group')}}/{{$group->id}}/students" class="black-text text-darken-2">Revisar tareas</a></li>

                </ul>

              </td>
            </tr>

          @endforeach
        </tbody>
      </table>

      <script type="text/javascript">
      $('.dropdown-button').dropdown({
            inDuration: 300,
            outDuration: 225,
            constrain_width: false, // Does not change width of dropdown to that of the activator
            hover: true, // Activate on hover
            gutter: 0, // Spacing from edge
            belowOrigin: false, // Displays dropdown below the button
            alignment: 'left' // Displays dropdown with edge aligned to the left of button
          }
        );
      </script>

@endsection

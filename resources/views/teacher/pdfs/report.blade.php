<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Lista Alumnos</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <link href="/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <style media="screen">
      table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }

      td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
      }

      tr:nth-child(even) {
        background-color: #dddddd;
      }
          </style>
  </head>
  <body>
    <header>
      <h1>Instituto Tecnológico de Tuxtla Gutierrez</h1>
      <h2>Reporte - Tareas asignadas : {{$group->key}}-{{$group->period->period}}/{{$group->period->year}}</h2>
      <h3>
        Total de alumnos: {{$t_students}}
      </h3>
    </header>

    <div class="container">
      <table>
          <tr>
            <th>
              Nombre de actividad asignada
            </th>
            <th>
              Entregados/Total de alumnos
            </th>
            <th>
              % de participación
            </th>

          </tr>
          @foreach ($activities as $activity)
            <tr>
              <th>
                {{str_limit($activity->title,25)}}
              </th>
              <th>
                {{$activity->total}}/{{$t_students}}
              </th>
              <th>
                <span>{{str_limit((100/$t_students) *$activity->total, 5)}}%</span>
              </th>
            </tr>
          @endforeach
      </table>
    </div>
  </body>
</html>

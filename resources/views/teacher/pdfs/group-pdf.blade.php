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
    </header>
    <h1>Lista de alumnos grupo: {{$info_group->key}} / {{$info_group->period}}/{{$info_group->year}}</h1>
    <div class="container">
      <table>
          <tr>
            <th>
              N.C.
            </th>
            <th>
              Nombre
            </th>
            <th>
              Apellido Paterno
            </th>
            <th>
              Apellido Materno
            </th>
          </tr>
          @foreach ($students as $student)
            <tr>
              <th>
                {{$student->user->username}}
              </th>
              <th>
                {{$student->user->name}}
              </th>
              <th>
                {{$student->user->first_lastname}}
              </th>
              <th>
                {{$student->user->second_lastname}}
              </th>
            </tr>
          @endforeach
      </table>
    </div>
  </body>
</html>

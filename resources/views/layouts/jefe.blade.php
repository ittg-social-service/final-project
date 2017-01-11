@extends('layouts.main')
@section('navigation')
   @include('shared.jefe-navigation')
@endsection
@section('main')
  @yield('jefe-content') 
   <script src="/js/alumno.js"></script>
@endsection


{{-- crear modal con la informacion del elemento s
      seleccionado ya sea tutor o alumno ese mismo modal 
      se podra reutilizar para actualizar el elemento
 --}}

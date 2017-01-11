@extends('layouts.default')
@section('css')
  <link href="/css/dashboard.css" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection
@section('js')
  <script src="/js/time-picker/picker.js"></script>
  <script src="/js/time-picker/picker.time.js"></script>

@endsection
@section('content')

<div class="menu">
   <ul id="out" class="side-nav fixed z-depth-0">
      <div class="client-info">
         <div class="">
            <img src="{{url('img/tutor.jpg')}}" alt="" class="avatar">
         </div>
         <div>
            <span class=" client-name lime-text accent-3" >{{ Auth::user()->name }}</span>
         </div>

      </div>
      <div class="container">
         <div class="divider"></div>
         <li>
            <a href="{{ url('teacher/groups') }}" class="lime-text accent-3">
               <i class="material-icons">supervisor_account</i>
               <span>
                  Mis Grupos
               </span>
            </a>
         </li>
         <!--li>
            <a href="" class="lime-text accent-3">
               <i class="material-icons custom">messages</i>
               <span>
                  Mensajes
               </span>
            </a>
         </li-->
         <li>
           <a class="lime-text accent-3" href="{{url('teacher/information/')}}/{{Auth::user()->id}}/edit">
             <i class="material-icons">settings</i>
             <span>Mi Información</span>
             </a>
         </li>
          <li>
             <a class="lime-text accent-3" href="{{ route('logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                <i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">exit_to_app</i>
                Cerrar sesion
             </a>
             <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                 {{ csrf_field() }}
             </form>
          </li>
      </div>


   </ul>
</div>

      <div id="main-content">
        <div class="container">

            @yield('teacher-dash-content')

        </div>

@endsection

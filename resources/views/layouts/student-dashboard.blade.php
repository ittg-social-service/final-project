@extends('layouts.default')
@section('css')

  <link href="/css/dashboard.css" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection
@section('js')
  <script src="/js/image.preview.js"></script>
  <script src="/js/time-picker/picker.js"></script>
  <script src="/js/time-picker/picker.time.js"></script>

@endsection
@section('content')

      <div class="menu">
         <ul id="out" class="side-nav fixed z-depth-1">
            <div class="client-info">
               <div class="">
                  <img src="{{url('/')}}/{{Auth::user()->avatar}}" alt="" class="avatar">
               </div>
               <div>
                  <a class="dropdown-button client-name lime-text accent-3" data-activates='client-opts'>{{ Auth::user()->name }} <i class="tiny material-icons"></i></a>
               </div>

            </div>
            <div class="container">
               <div class="divider"></div>
               <li>
                  <a href="{{ url('/student/home') }}" class=" lime-text accent-3">
                     <i class="material-icons custom">layers</i>
                     <span>
                        Mis tareas
                     </span>
                  </a>
               </li>
               <li>
                  <a href="{{ url('/student/myteacher') }}" class="lime-text accent-3">
                     <i class="material-icons custom">assignment_ind</i>
                     <span>
                        Mi tutor
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
                <a class="lime-text accent-3" href="{{url('student/information/')}}/{{Auth::user()->id}}/edit">
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
            @include('flash::message')
            @yield('student-dash-content')

        </div>
        </div>

@endsection

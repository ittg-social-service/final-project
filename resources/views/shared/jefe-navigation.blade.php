<li><a  href="{{ url('/jefe-departamento/alumnos') }}"><i class="material-icons">school</i>Alumnos</a></li>
<li><a  href="{{ url('/jefe-departamento/tutores') }}"><i class="material-icons">people</i>Tutores</a></li>
<li><a  href="{{ url('/jefe-departamento/asignaciones') }}"><i class="material-icons">assignment_ind</i>Asignar</a></li>
<li><a  href="{{ url('/jefe-departamento/nuevo-periodo') }}"><i class="material-icons">add_circle</i>Crear periodos</a></li>
<li><a  href="{{ url('/jefe-departamento/perfil') }}"><i class="material-icons">build</i>Perfil</a></li>
@if (Auth::user()->hasRole('tutor'))
	
	<li><a  href="{{ url('/teacher/groups') }}"><i class="material-icons">autorenew</i>Ingresar como tutor</a></li>
@endif

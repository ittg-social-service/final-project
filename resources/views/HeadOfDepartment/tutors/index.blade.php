@extends('layouts.jefe')
@section('jefe-content')
   <div ng-app="tutor">
      <div ng-controller="tutorController as vm">
        	<div class="row">
      		<div class="col m12 s12">
        			@include('shared.searchbar')
      		</div>
      	</div>
        	<div class="row">
        		<div class="col m12 s12">
		         <table class="bordered highlight centered white z-depth-1 responsive-table">
		           <thead>
		             <tr>
		                 <th data-field="id">Foto</th>
		                 <th data-field="name">Nombre</th>
		                 <th data-field="price">Apellido</th>
		                 <th data-field="price">tarjeta</th>
		                 <th data-field="price">Correo</th>
		                 <th data-field="price"></th>
		                 {{-- <th data-field="price">Carrera</th>
		                 <th data-field="price">Semestre</th>
		                 <th data-field="price">Telefono</th>
		                 <th data-field="price">Correo</th> --}}
		             </tr>
		           </thead>

		           <tbody>
		             <tr ng-repeat="tutor in vm.tutors | filter:searchTarget">
		                <td><img ng-src="@{{tutor.avatar}}" alt="" class="circle photo"></td>
		               <td>@{{ tutor.name }}</td>
		               <td>@{{ tutor.first_lastname }}</td>
		               <td>@{{ tutor.nc }}</td>
		               <td>@{{ tutor.email }}</td>
		               <td>
		                	<button class="waves-effect waves-teal btn-flat">
		                 		<i class="material-icons green-text text-accent-4">visibility</i>
		                 	</button>
		                 	<button class="waves-effect waves-teal btn-flat">
		                 		<i class="material-icons orange-text text-accent-4">mode_edit</i>
		                 	</button>
		               </td>
		             </tr>
		           </tbody>
		         </table>
        		</div>
        	</div>
         <div class="fixed-action-btn">
          <a class="btn-floating btn-large red"  href="{{ url('/jefe-departamento/tutores/crear') }}">
            <i class="large material-icons">add</i>
          </a>
        </div>
      </div>
   </div>
    
   <script src="/js/tutor.js"></script>
@endsection

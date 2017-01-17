@extends('layouts.coordinador')
@section('coord-content')
   <div ng-app="assignments">
      <div ng-controller="assignmentController as vm">
      	<div ng-hide="vm.periodForData">
      		
       		@include('shared.coord-hod.period-for-data-dropdown')
      	</div>
       	{{-- @include('shared.errors.no-data-in-period') --}}
         <div ng-show="vm.periodForData">
         	<div class="row">
	           <div class="col s12 m12">
	              {{-- barra de busqueda --}}
	            @include('shared.searchbar')
	           </div>
	         </div>
			<div class="row">
	            <div class="input-field col s12 m2">
		             <select ng-model="vm.filterBy" ng-change="vm.filterData()">
		               <option value="" disabled selected>Filtrar</option>
		               <option value="1">Asignados</option>
		               <option value="2">No asignados</option>
		               <option value="3">ver todo</option>
		             </select>
		             <label>Filtrar</label>
	           </div>
	           	@include('shared.coord-hod.period-for-data-dropdown')
	         </div>
         
	         <div class="row">
	            <div class="col m10 s12">
	               {{-- tabla de alumnos --}}
	               <table class=" bordered highlight centered white z-depth-1 responsive-table">
	                 <thead>
	                   <tr>
	                     <th>Seleccionar</th>
	                       <th data-field="id">Foto</th>
	                       <th data-field="name">Nombre</th>
	                       <th data-field="price">Apellido</th>
	                       <th data-field="price">N.Control</th>
	                       <th data-field="price">Correo</th>
	                       <th data-field="price">Grupo</th>
	                   </tr>
	                 </thead>

	                 <tbody>
	                   <tr ng-repeat="student in vm.students | filter:searchTarget" ng-class="{'red-text lighten-4': !vm.verifyIfAsigned(student), 'green-text lighten-4': vm.verifyIfAsigned(student)}" ng-if="vm.studentsResp">
	                     <td>
	                        <p>
	                           <input type="checkbox" id="@{{'test' + $index}}" ng-checked="vm.verifyIfChecked(student)" ng-click="vm.toggleSelectItem(student)"/>
	                           <label for="@{{'test' + $index}}"></label>
	                        </p>
	                     </td>
	                     <td><img ng-src="@{{student.avatar}}" alt="" class="circle photo"></td>
	                     <td>@{{ student.name }}</td>
	                     <td>@{{ student.first_lastname }}</td>
	                     <td>@{{ student.username }}</td>
	                     <td>@{{ student.email }}</td>
	                     <td>@{{ student.group.key }}</td>
	                   </tr>
	                 </tbody>
	               </table>
	            </div>
	            <div class="col m2 s12">
	               <form ng-submit="vm.asignToGroup()">
	                  <h6>Asignar seleccionados a:</h6>
	                   <p ng-repeat="group in vm.groups">
	                     <input class="with-gap" name="group1" type="radio" id="@{{ 'g' + $index }}" ng-value="@{{ group.id }}" ng-model="vm.groupId" required/>
	                     <label for="@{{ 'g' + $index }}">@{{ group.key }}</label>
	                   </p>
	                  <button type="submit" class="btn" >asignar</button>
	               </form>
	            </div>
	         </div>
	         
			{{-- <div class="loading">	
			  <div class="preloader-wrapper active" ng-show="!vm.studentsResp">
			    <div class="spinner-layer spinner-red-only">
			      <div class="circle-clipper left">
			        <div class="circle"></div>
			      </div><div class="gap-patch">
			        <div class="circle"></div>
			      </div><div class="circle-clipper right">
			        <div class="circle"></div>
			      </div>
			    </div>
			  </div>
			</div> --}}
         
         	@include('shared.coordinator.create-group')
         </div>
         
         
      </div>
   </div>

   {{--  <script>
   var alumnos = {!!json_encode ($alumnos->toArray())!!};
   console.log(alumnos);
   </script>
   <script src="/js/alumno.js"></script> --}}
   <script src="/js/asignacion-coordinador.js"></script>
@endsection


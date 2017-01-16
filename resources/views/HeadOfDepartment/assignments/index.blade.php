@extends('layouts.jefe')
@section('jefe-content')
   	<div ng-app="app">
      <div ng-controller="asigController as vm">
      		{{-- <div class="preloading"></div> --}}
      		<div class="container">
		        @include('shared.coord-hod.period-for-data-dropdown')
		         @include('shared.errors.no-data-in-period')
		         @include('shared.preloader')
		        
		         <div ng-show="vm.groupsResp && vm.groups.length > 0">
		         	
			         <div class="row">
			            <div class="col m12 s12">
			               @include('shared.searchbar')
			               
			            </div>
			         </div>
			         <div class="row">
			            <div class="col m8">
			               <table class=" bordered highlight centered white z-depth-1">
			                 <thead>
			                     <tr>
			                        <th>Seleccionar</th>
			                        <th data-field="clave">Clave de grupo</th>
			                        <th data-field="alumnos">Alumnos</th>
			                        <th data-field="tutor">Tutor</th>
			                      </tr>
			                 </thead>

			                 <tbody>
			                   <tr ng-repeat="group in vm.groups | filter:searchTarget" ng-class="{'red-text lighten-4': !vm.verifyIfAsigned(group), 'green-text lighten-4': vm.verifyIfAsigned(group)}">
			                     <td>
			                        <p>
			                           <input type="checkbox" id="@{{'test' + $index}}" ng-checked="vm.verifyIfChecked(group)" ng-click="vm.toggleSelectItem(group)"/>
			                           <label for="@{{'test' + $index}}"></label>
			                        </p>
			                     </td>
			                   
			                     <td>@{{ group.key }}</td>
			                     <td>@{{ group.students.length }}</td>
			                     <td>@{{ group.tutor.name }}</td>

			                   </tr>
			                 </tbody>
			               </table>
			            </div>
			            <div class="col m4">
			                  <form ng-submit="vm.asignTutor()" name="asignaciones">
			                     <div class="input-field col s12">
			                        <select 
			                        ng-model="vm.tutor" 
			                        ng-if="vm.tutors"
			                        ng-options="item as item.name for item in vm.tutors" 
			                        name="select"
			                        ng-change="vm.groupsForTutor()">
			                        <option value="" disabled selected>Elija un tutor</option>
			                        </select>
			                        <label>Asignar a:</label>
			                     </div>
			                     <button type="submit" class="btn" >asignar</button>
			                  </form>
			                  
			                  <div ng-show="vm.tutor">
			                     Este tutor esta asignado a @{{ vm.tutor.groups }} grupo(s) en este periodo
			                  </div>
			            </div>
			         </div>
		         </div>
      		</div>
      	</div>
   	</div>
  
<script src="/js/asignacion-jefe.js"></script>  
@endsection


{{-- crear modal con la informacion del elemento s
      seleccionado ya sea tutor o alumno ese mismo modal 
      se podra reutilizar para actualizar el elemento
 --}}

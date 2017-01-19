@extends('layouts.coordinador')
@section('coord-content')
	<div ng-app="coordinatorGroups">
		<div ng-controller="coordGroupsController as vm">
			@include('shared.coord-hod.period-for-data-dropdown')
			@include('shared.errors.no-data-in-period')
	        @include('shared.coordinator.create-group')
	         <!-- Modal Structure -->
			  <div id="edit-group-modal" class="modal">
			    <div class="modal-content">
			      <h4 >Editar</h4>
			      <p>A bunch of text</p>
			    </div>
			    <div class="modal-footer">
			      <a href="#!" class="waves-effect waves-green btn-flat" ng-click="vm.toggleEditGroupModal(vm.selectedGroup)">Cancelar</a>
			      <a href="#!" class="waves-effect waves-green btn-flat">Proceder</a>
			    </div>
			  </div>
			  <div id="delete-group-modal" class="modal">
			    <div class="modal-content">
			      <h4> Eliminar grupo</h4>
			      <p>Realmente desea <span class="red-text">eliminar</span> el grupo <span class="blue-text">@{{ vm.selectedGroup.key }}</span> una ves eliminado no podra recuperar la información</p>
			    </div>
			    <div class="modal-footer">
			      <a href="#!" class="waves-effect waves-green btn-flat" ng-click="vm.toggleDeleteGroupModal(vm.selectedGroup)">Cancelar</a>
			      <a href="#!" class="waves-effect waves-green btn-flat" ng-click="vm.deleteGroup(vm.selectedGroup)">Proceder</a>
			    </div>
			  </div>
         
	         <div ng-show="vm.periodForData && vm.groups.length > 0">
	         	<div class="row grey lighten-5">
	         		<div class="col s12 m5" ng-class="{'offset-m3 m7': !vm.groupDisplaying}">
						<table class=" bordered highlight centered white z-depth-1">
					        <thead>
					          <tr>
					              <th data-field="id">Clave</th>
					              <th data-field="name">Tutor</th>
					              <th data-field="price">Alumnos</th>
					              <th data-field="price"></th>
					          </tr>
					        </thead>

					        <tbody>
					          <tr ng-repeat="group in vm.groups" ng-if="vm.groupsReady">
					            <td>@{{ group.key }}</td>
					            <td>@{{ group.tutor.name }}</td>
					            <td>
					            	<a href="" ng-click="vm.showGroupInfo(group)">@{{ group.students.length }}</a>
					            </td>
					            <td>
				                	<a class="waves-effect waves-teal" href="#" ng-click="vm.showGroupInfo(group)">
				                 		<i class="material-icons green-text text-accent-4">send</i>
				                 	</a>
				                
				              {{--    	<a class="waves-effect waves-teal"  ng-click="vm.toggleEditGroupModal(group)">
				                 		<i class="material-icons orange-text text-accent-4">mode_edit</i>
				                 	</a> --}}
				                 	<a class="waves-effect waves-teal"  ng-click="vm.toggleDeleteGroupModal(group)">
				                 		<i class="material-icons red-text text-accent-4">delete_forever</i>
				                 	</a>
				               </td>
					          </tr>
					      
					        </tbody>
					      </table>
	         		</div>
	         		<div class="col s12 m7">
	         			<div class="row" ng-if="vm.groupDisplaying">
	         				<div class="col s12 m10 offset-m1 card-panel">
	         				<h5 class="center">Alumnos del grupo @{{ vm.groupDisplaying.key }}</h5>
	         					<ul class="collection">
									<li class="collection-item avatar" ng-repeat="student in vm.groupDisplaying.students">
										<img ng-src="@{{ student.user.avatar }}" alt="" class="circle">
						      			<span class="title">@{{ student.user.name }}</span>
						      			<p>@{{ student.user.username }} <br>
						         
						      			</p>
						      			<a class="secondary-content" href="#user-info-modal" ng-click="vm.infoFor(student)"><i class="material-icons">visibility</i></a>
									</li>
								</ul>
	         				</div>
	         			</div>
	         		</div>
	         	</div>
	         	{{-- opcion 1 --}}
			{{-- 	<div class="row">
					<div class="col s12 m4" ng-repeat="group in vm.groups" ng-if="vm.groupsReady">
						<div class="card ">
							<div class="card-content">
								<ul class="collection">
									<li class="collection-item avatar" ng-repeat="student in group.students">
										<img ng-src="@{{ student.user.avatar }}" alt="" class="circle">
						      			<span class="title">@{{ student.user.name }}</span>
						      			<p>@{{ student.user.username }} <br>
						         
						      			</p>
						      			<a class="secondary-content" href="#user-info-modal" ng-click="vm.infoFor(student)"><i class="material-icons">visibility</i></a>
									</li>
								</ul>
            

							<span class="card-title activator grey-text text-darken-4">@{{ group.key }}<i class="material-icons right">more_vert</i></span>
							<p><a href="#">@{{ group.tutor.name }}</a></p>
							</div>
							<div class="card-reveal">
							<span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
							<p>Here is some more information about this product that is only revealed once clicked on.</p>
							</div>
						</div>
					</div>
				</div> --}}

				{{-- opcion 2 --}}
	         {{-- 	<div class="row">
	         		<div class="col m3 s12" ng-repeat="group in vm.groups" ng-if="vm.groupsReady">
			         	<ul class="collection with-header">
					        <li class="collection-header">
					        	<h5>
					        		@{{ group.key }}
					        		<a class='dropdown-button ' href='#' data-activates='dropdown1'><i class="material-icons">delete_forever</i></a>
					        	</h5>
					        	Tutor: @{{ group.tutor.name }}
					        </li>
					        <li class="collection-item avatar" ng-repeat="student in group.students">
						      <img ng-src="@{{ student.user.avatar }}" alt="" class="circle">
						      <span class="title">@{{ student.user.name }}</span>
						      <p>@{{ student.user.username }} <br>
						         
						      </p>
						      <a class="secondary-content" href="#user-info-modal" ng-click="vm.infoFor(student)"><i class="material-icons">visibility</i></a>
						    </li>
					    </ul>		
	         		</div>
	         	</div> --}}

	         </div>
	         @include('shared.coord-hod.show-user-info-modal')
		</div>
	</div>

  <script src='/js/coordinador/grupos.js'></script>
@endsection
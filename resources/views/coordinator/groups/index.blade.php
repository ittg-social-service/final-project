@extends('layouts.coordinador')
@section('coord-content')
	<div ng-app="coordinatorGroups">
		<div ng-controller="coordGroupsController as vm">
			@include('shared.coord-hod.period-for-data-dropdown')
			@include('shared.errors.no-data-in-period')
	        @include('shared.coordinator.create-group')
	         <div ng-show="vm.periodForData">
	         	<div class="row">
	         		<div class="col m3 s12" ng-repeat="group in vm.groups" ng-if="vm.groupsReady">
			         	<ul class="collection with-header">
					        <li class="collection-header">
					        	<h5>
					        		@{{ group.key }}
					        		<span class="right"><i class="material-icons">group</i></span>
					        	</h5>
					        	Tutor: @{{ group.tutor.name }}
					        </li>
					        <li class="collection-item avatar" ng-repeat="student in group.students">
						      <img ng-src="@{{ student.avatar }}" alt="" class="circle">
						      <span class="title">@{{ student.name }}</span>
						      <p>@{{ student.nc }} <br>
						         
						      </p>
						      <a class="secondary-content" href="#user-info-modal" ng-click="vm.infoFor(student)"><i class="material-icons">visibility</i></a>
						    </li>
					    </ul>		
	         		</div>
	         	</div>
	         </div>
	         @include('shared.coord-hod.show-user-info-modal')
		</div>
	</div>

  <script src='/js/coordinador/grupos.js'></script>
@endsection
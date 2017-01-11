@extends('layouts.coordinador')
@section('coord-content')
	<div ng-app="coordinatorGroups">
		<div ng-controller="coordGroupsController as vm">
			@include('shared.coord-hod.period-for-data-dropdown')
			@include('shared.errors.no-data-in-period')
	         <div ng-show="vm.periodForData">
	         	<div class="row">
	         		<div class="col m3 s12" ng-repeat="group in vm.groups">
			         	<ul class="collection with-header">
					        <li class="collection-header">
					        	<h5>
					        		@{{ group.key }}
					        		<span class="right"><i class="material-icons">group</i></span>
					        	</h5>
					        </li>
					        <li class="collection-item avatar" ng-repeat="student in group.students">
						      <img ng-src="@{{ student.avatar }}" alt="" class="circle">
						      <span class="title">@{{ student.name }}</span>
						      <p>@{{ student.nc }} <br>
						         
						      </p>
						      <a href="#!" class="secondary-content"><i class="material-icons">visibility</i></a>
						    </li>
					    </ul>		
	         		</div>
	         	</div>
	         	@include('shared.coordinator.create-group')
	         </div>
		</div>
	</div>

  <script src='/js/coordinador/grupos.js'></script>
@endsection
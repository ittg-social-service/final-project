
<div ng-app="student">
  	<div ng-controller="studentController as vm">
  		@include('shared.preloader')
		<div ng-show="!vm.dataLoading">
		  	<div class="row">
		  		<div class="col m12 s12">
		    			@include('shared.searchbar')
		  		</div>
		  	</div>
	    	<div class="row">
	    		<div class="col s12 m2">
					    <p>
					      <input type="checkbox" id="allStudents" ng-checked="vm.viewAllStudents" ng-click="vm.toggleViewAllStudents()"/>
					      <label for="allStudents">Ver lista completa</label>
					    </p>
	    		</div>

	  			@include('shared.coord-hod.period-for-data-dropdown')
	    	</div>
	    	<div class="row">
	    		<div class="col m12 s12">
		         <table class="bordered highlight centered white z-depth-1 responsive-table">
		           <thead>
		             <tr>
		                 <th data-field="id">
		                 	<a href="">Foto</a>
		                 	
		                 </th>
		                 <th data-field="name" class="center-align">
		                 	<a href="" ng-click="vm.changeTableOrderType('name')" >
		                 		Nombre
			                 	<i ng-show="vm.sortTableConf.sortType == 'name' && !vm.sortTableConf.sortReverse" class="material-icons arrow">keyboard_arrow_down</i>
	            				<i ng-show="vm.sortTableConf.sortType == 'name' && vm.sortTableConf.sortReverse" class="material-icons arrow">keyboard_arrow_up</i>
		                 	</a>
		                 </th>
		                 <th data-field="price">
		                 	<a href="" ng-click="vm.changeTableOrderType('first_lastname')">
		                 		Apellido
			                 	<i ng-show="vm.sortTableConf.sortType == 'first_lastname' && !vm.sortTableConf.sortReverse" class="material-icons arrow">keyboard_arrow_down</i>
	            				<i ng-show="vm.sortTableConf.sortType == 'first_lastname' && vm.sortTableConf.sortReverse" class="material-icons arrow">keyboard_arrow_up</i>
		                 	</a>
		                 </th>
		                 <th data-field="price">
		                 	<a href="" ng-click="vm.changeTableOrderType('username')">
		                 		N.Control
			                 	<i ng-show="vm.sortTableConf.sortType == 'username' && !vm.sortTableConf.sortReverse" class="material-icons arrow">keyboard_arrow_down</i>
	            				<i ng-show="vm.sortTableConf.sortType == 'username' && vm.sortTableConf.sortReverse" class="material-icons arrow">keyboard_arrow_up</i>
		                 	</a>
		                 </th>
		                 <th data-field="price">
		                 	<a href="" ng-click="vm.changeTableOrderType('email')">
		                 		Correo
			                 	<i ng-show="vm.sortTableConf.sortType == 'email' && !vm.sortTableConf.sortReverse" class="material-icons arrow">keyboard_arrow_down</i>
	            				<i ng-show="vm.sortTableConf.sortType == 'email' && vm.sortTableConf.sortReverse" class="material-icons arrow">keyboard_arrow_up</i>
		                 	</a>
		                 </th>
		                 <th data-field="price"></th>
		             </tr>
		           </thead>

		           <tbody>
		             <tr ng-repeat="student in vm.students | orderBy:vm.sortTableConf.sortType:vm.sortTableConf.sortReverse | filter:searchTarget">
		                <td><img ng-src="@{{student.avatar}}" alt="" class="circle photo"></td>
		               <td>@{{ student.name }}</td>
		               <td>@{{ student.first_lastname }}</td>
		               <td>@{{ student.username }}</td>
		               <td>@{{ student.email}}</td>
		               <td>
	                	<a class="waves-effect waves-teal btn-flat" href="#user-info-modal" ng-click="vm.infoFor(student)">
	                 		<i class="material-icons green-text text-accent-4">visibility</i>
	                 	</a>
	                 	<a class="waves-effect waves-teal btn-flat"  ng-click="vm.edit(student.id)">
	                 		<i class="material-icons orange-text text-accent-4">mode_edit</i>
	                 	</a>
		               </td>
		             </tr>
		           </tbody>
		         </table>
	    		</div>
	    	</div>
		     <div class="fixed-action-btn">
		      <a class="btn-floating btn-large red"  href="{{ route('student.create') }}">
		        <i class="large material-icons">add</i>
		      </a>
		    </div>
		    @include('shared.coord-hod.show-user-info-modal')
		</div>


  </div>
</div>

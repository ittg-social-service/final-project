
   <div ng-app="tutor">
      <div ng-controller="tutorController as vm">
        	<div class="row">
      		<div class="col m8 s12">
        			@include('shared.searchbar')
      		</div>
      		<div class="col s12 m3">
      			<a class="btn btn-flat " ng-click="vm.makeMeTutor()">Matricularme como tutor</a>
      		</div>
      	</div>
        	<div class="row">
        		<div class="col m12 s12">
		         <table class="bordered highlight centered white z-depth-1 responsive-table">
		           <thead>
		             <tr>
		                <th data-field="id">
		                 	<a href="">
		                 		Foto
		                 	</a>
		                </th>
		                <th data-field="name">
		                 	<a href="" ng-click="vm.changeTableOrderType('name')">
		                 		Nombre
		                 		<i ng-show="vm.sortTableConf.sortType == 'name' && !vm.sortTableConf.sortReverse" class="material-icons arrow">keyboard_arrow_down</i>
            					<i ng-show="vm.sortTableConf.sortType == 'name' && vm.sortTableConf.sortReverse" class="material-icons arrow">keyboard_arrow_up</i>
		                 	</a>
		                </th>
		                <th data-field="price">
		                 	<a href="" ng-click="vm.changeTableOrderType('first_lastname')">
		                 		A.Paterno
		                 		<i ng-show="vm.sortTableConf.sortType == 'first_lastname' && !vm.sortTableConf.sortReverse" class="material-icons arrow">keyboard_arrow_down</i>
            					<i ng-show="vm.sortTableConf.sortType == 'first_lastname' && vm.sortTableConf.sortReverse" class="material-icons arrow">keyboard_arrow_up</i>
		                 	</a>
		                </th>
		                <th data-field="price">
		                 	<a href="" ng-click="vm.changeTableOrderType('second_lastname')">
		                 		A.Materno
		                 		<i ng-show="vm.sortTableConf.sortType == 'second_lastname' && !vm.sortTableConf.sortReverse" class="material-icons arrow">keyboard_arrow_down</i>
            					<i ng-show="vm.sortTableConf.sortType == 'second_lastname' && vm.sortTableConf.sortReverse" class="material-icons arrow">keyboard_arrow_up</i>
		                 	</a>
		                </th>
		                <th data-field="price">
		                 	<a href="" ng-click="vm.changeTableOrderType('username')">
		                 		RFC
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
		            	<tr ng-repeat="tutor in vm.tutors | orderBy:vm.sortTableConf.sortType:vm.sortTableConf.sortReverse | filter:searchTarget">
			                <td><img ng-src="@{{tutor.avatar}}" alt="" class="circle photo"></td>
				               	<td>@{{ tutor.name }}</td>
				               	<td>@{{ tutor.first_lastname }}</td>
				               	<td>@{{ tutor.second_lastname }}</td>
				               	<td>@{{ tutor.username }}</td>
				               	<td>@{{ tutor.email }}</td>
				               	<td>
				                <a class="waves-effect waves-teal btn-flat" href="#student-info-modal" ng-click="vm.infoFor(tutor)">
			                 		<i class="material-icons green-text text-accent-4">visibility</i>
			                 	</a>
			                 	<a class="waves-effect waves-teal btn-flat"  ng-click="vm.edit(tutor.id)">
			                 		<i class="material-icons orange-text text-accent-4">mode_edit</i>
			                 	</a>
			               </td>
		             	</tr>
		           </tbody>
		         </table>
        		</div>
        	</div>
        @if (Auth::user()->hasRole('department_manager'))
        	
         <div class="fixed-action-btn">
          <a class="btn-floating btn-large red"  href="{{ url('/tutor/create') }}">
            <i class="large material-icons">add</i>
          </a>
        </div>
        @endif

         <!-- Modal Structure -->
	 	<div id="student-info-modal" class="modal modal-fixed-footer">
	    	<div class="modal-content user-info">
	      		<h4 class="user-info__header center">Información del tutor</h4>
	      		<div class="row">
	      			<div class="col s21 m4 ">
	      				<div class="row">
	      					<div class="col s12 m12">
	      						<img ng-src="@{{ vm.targetToEdit.avatar }}" alt="" class="circle center responsive-img">
	      					</div>
	      					<div class="col m12 s12">
	      						<h5 class="center">@{{ vm.targetToEdit.name + ' ' + vm.targetToEdit.first_lastname }}</h5>
	      					</div>
	      				</div>
	      			</div>
	      			<div class="col s12 m8 ">
	      				<div class="row">
	      					<div class="col s12 m12">
	      						<div class="card-panel">
			      					<h5>
			      						Informacion personal
										
			      					</h5>
			      					<div class="divider"></div>
			      					<div class="row">
			      						<div class="col s12 m12 user-info__field  valign-wrapper">
			      							<i class="material-icons left">vpn_key</i>
			      							@{{ vm.targetToEdit.username }}
			      						</div>
			      						<div class="col s12 m12 user-info__field valign-wrapper">
			      							<i class="material-icons left">email</i>
			      							@{{ vm.targetToEdit.email }}
			      						</div>
			      						<div class="col s12 m12 user-info__field valign-wrapper">
			      							<i class="material-icons left">phone</i>
			      							@{{ vm.targetToEdit.phone }}
			      						</div>
			      					</div>
			      				</div>
	      					</div>
	      					<div class="col s12 m12">
	      						<div class="card-panel">
			      					<h5>Informacion sistema</h5>
			      					<div class="divider"></div>
			      					<div class="row">
			      						<div class="col s12 m12 user-info__field  valign-wrapper">
			      							<i class="material-icons left">group_work</i>
			      							@{{ vm.targetToEdit.info.group.key }}
			      						</div>
			      						<div class="col s12 m12 user-info__field valign-wrapper">
			      							<i class="material-icons left">account_circle</i>
			      							@{{ vm.targetToEdit.info.group.tutor.name }}
			      						</div>
			      					</div>
			      				</div>
	      					</div>
	      				</div>
	      				
	      			</div>
	      		</div>
	    	</div>
	    	<div class="modal-footer">
	      		<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>
	    	</div>
	  </div>
      </div>
   </div>
    
  <script src="/js/tutor.js"></script>



   <div ng-app="student">
      <div ng-controller="studentController as vm">
      	<div class="row">
      		<div class="col m12 s12">
        			@include('shared.searchbar')
      		</div>
      	</div>
        	<div class="row">
        		<div class="col m12 s 12">
		         <table class="bordered highlight centered white z-depth-1 responsive-table">
		           <thead>
		             <tr>
		                 <th data-field="id">Foto</th>
		                 <th data-field="name">Nombre</th>
		                 <th data-field="price">Apellido</th>
		                 <th data-field="price">N.Control</th>
		                 <th data-field="price">Correo</th>
		                 <th data-field="price"></th>
		                 {{-- <th data-field="price">Carrera</th>
		                 <th data-field="price">Semestre</th>
		                 <th data-field="price">Telefono</th>
		                 <th data-field="price">Correo</th> --}}
		             </tr>
		           </thead>

		           <tbody>
		             <tr ng-repeat="student in vm.students | filter:searchTarget">
		                <td><img ng-src="@{{student.avatar}}" alt="" class="circle photo"></td>
		               <td>@{{ student.name }}</td>
		               <td>@{{ student.first_lastname }}</td>
		               <td>@{{ student.nc }}</td>
		               <td>@{{ student.email}}</td>
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
          <a class="btn-floating btn-large red"  href="{{ route('student.create') }}">
            <i class="large material-icons">add</i>
          </a>
        </div>
      </div>
   </div>

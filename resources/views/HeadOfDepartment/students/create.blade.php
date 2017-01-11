@extends('layouts.jefe')
@section('jefe-content')
	<div ng-app="student">
      	<div ng-controller="studentController as vm">
      		<div class="container">
      			
				<div class="row">
					<form name="createStudentForm" class="card-panel white col m6 offset-m3" ng-submit="vm.storeStudent(createStudentForm.$valid)" novalidate>
						<div class="row">
							<div class="col m12 s12">
								<h5 class="center">Nuevo Alumno</h5>
							</div>
							<div class="input-field col s12 m12">
								<input  
									id="nc" 
									type="number" 
									class="validate" 
									ng-class="{'invalid': createStudentForm.nc.$invalid && createStudentForm.nc.$dirty,'valid': createStudentForm.nc.$valid}"
									name="nc" 
									required="required" 
									ng-model="vm.student.nc">
								<label for="nc" data-error="Error" data-success="Ok">N.Control</label>
								
								<div 
									ng-messages="createStudentForm.nc.$error"
									ng-if="createStudentForm.nc.$dirty">
								  <div ng-message="required" class="red-text">Este campo es obligatorio</div>
								</div>
							</div>
							<div class="input-field col s12 m12">
								@include('shared.coord-hod.periods-dropdown')
								<p ng-show="createStudentForm.period.$error.required && createStudentForm.period.$touched">Campo requerido</p>
							</div>
							<button class="btn waves-effect waves-light col m8 s12 offset-m2" type="submit" name="action" ng-disabled="createStudentForm.$invalid">Guardar
								<i class="material-icons right">send</i>
							</button>
						</div>
					</form>
				</div>
      		</div>
      </div>
     </div>
@endsection

@extends('layouts.jefe')
@section('jefe-content')
    <div ng-app="period">
    	<div ng-controller="periodController as vm">
    		<div class="container">
      			
				<div class="row">
					<form name="createStudentForm" class="card-panel white col m6 offset-m3" ng-submit="vm.storePeriod(createStudentForm.$valid)" novalidate>
						<div class="row">
							<div class="col m12 s12">
								<h5 class="center">Nuevo periodo</h5>
							</div>
							<div class="input-field col s12 m12">
						       <select 
						       	ng-model="vm.year" 
						       	ng-if="vm.periods" ng-options="item as item.nameToDisplay for item in vm.periods" ng-change="vm.getDataForPeriod()" 
						       	required="required">
										<option value="" disabled selected>Seleccione un año</option>
								</select>
								<label>Generar periodos para el año</label>
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
    <script src="/js/hod/period.js"></script>
@endsection
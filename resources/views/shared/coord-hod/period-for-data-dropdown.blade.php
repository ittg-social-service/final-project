<div class="container">
	 <div class="row">
			<div class="input-field col s12 m4">
	       <select 
	       	ng-model="vm.periodForData" 
	       	ng-if="vm.periods" ng-options="item as item.nameToDisplay for item in vm.periods" ng-change="vm.getDataForPeriod()" 
	       	required="required">
					<option value="" disabled selected>Seleccione un periodo</option>
				</select>
				<label>Periodo</label>
	     </div>
	 </div>
</div>
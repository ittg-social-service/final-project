<select ng-model="vm.period" ng-if="vm.periods" ng-options="item as item.nameToDisplay for item in vm.periods" ng-change="vm.onPeriodChange()" required="required" name="period">
<option value="" disabled selected>Seleccione un periodo</option>
</select>
<label>Periodo</label>
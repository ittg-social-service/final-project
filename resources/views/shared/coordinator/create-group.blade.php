<!-- Modal Structure -->
{{-- 
  debe tener metodos
  * toggleModal()
 --}}
<div id="modal-crear-grupo" class="modal">
  <div class="modal-content">
     <h4>Crear Grupo</h4>
     
     <div class="row">
        <form class="col s12" name="createGroupForm" ng-submit="vm.createGroup(createGroupForm.$valid)" novalidate>
           <div class="row">
             <div class="input-field col s6">
               <input
                id="clave"
                name="key"
                type="number"
                min="0" 
                class="validate" 
                required 
                ng-class="{'invalid': createGroupForm.key.$invalid && !createGroupForm.key.$pristine}"
                ng-model="vm.group.key" 
                ng-change="vm.onPeriodChange()">
               <label for="clave" data-error="Error">Clave</label>
               <div 
                ng-messages="createGroupForm.key.$error"
                ng-if="createGroupForm.key.$dirty">
                <div ng-message="required" class="red-text">Este campo es obligatorio</div>
              </div>
              
             </div>
             <div class="input-field col s6">
               @include('shared.coord-hod.periods-dropdown')
             </div>
           </div>
           	<div class="row">
           		<div class="col m12 s12">
	           		<div class="center-align cyan-text">
	               	@{{ 'Se guardara como: ' + vm.group.keyToDisplay }}
	              	</div>
           		</div>
           	</div>
        </form>
     </div>
  </div>
  <div class="modal-footer">
    <button class="waves-effect waves-green btn-flat" ng-click="vm.toggleModal()">Cancelar</button>
    <button type="submit" class=" waves-effect waves-green btn-flat " ng-disabled="createGroupForm.$invalid" ng-click="vm.createGroup(createGroupForm.$valid)">Crear</button>
  </div>
</div>

<div class="fixed-action-btn tooltipped" data-position="left" data-delay="30" data-tooltip="Crear grupo">
    <a class="btn-floating btn-large red" ng-click="vm.toggleModal()">
      <i class="large material-icons">group_add</i>
    </a>
 </div>

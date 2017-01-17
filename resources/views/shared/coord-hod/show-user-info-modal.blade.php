 <!-- Modal Structure -->
	 	<div id="user-info-modal" class="modal modal-fixed-footer">
	    	<div class="modal-content user-info">
	      		<h4 class="user-info__header center">Información del alumno</h4>
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
			      							@{{ vm.targetToEdit.nc }}
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


var app = angular.module('coordinatorGroups', ['common', 'ngMessages'])
.controller('coordGroupsController', ['API', '$http', '$scope', '$q', function(API, $http, $scope, $q){
	var vm = this;
	var isModalOpen = false;
	vm.group = {
	   	key: '',
	   	keyToDisplay: '',
	   	period: ''
	 }
	 vm.infoFor = function infoFor (target) {
		vm.targetToEdit = target;
		console.log(target);
	}
	 var getData = function getData(period) {
	 	API.getGroupsInPeriod(period).then(function(response){
			vm.groups = response.data;
			$q.all(vm.groups.map(function(group) {
                 return   API.getStudentsForGroup(group.id).then(function  (response) {
                             group['students'] = response.data;
                             $http({ method: 'GET', url: '/group/' + group.id + '/tutor' }).then(function  (response) {
                                var tutor = response.data.tutor;
                                if (group.tutor_id != 1) {
                                   group['tutor'] = tutor;
                                }else{
                                   group['tutor'] = {name: 'No asignado', id: tutor.id};
                                }
                             });
                          });
                          
           })).then(function() {
				vm.groupsReady = true;
              });
			
		});
	 };

	API.getPeriods().then(function  (response) {
		vm.periods = response.data;
		 vm.periods.forEach(function  (period) {
            period.nameToDisplay = period.period + ' ' + period.year;
         });
		
	});
	vm.getDataForPeriod = function  () {
		getData(vm.periodForData.id);
	}

	/*funciones de crear grupo*/
	function toggleModal() {
	   	if (!isModalOpen) {
	   		 $('#modal-crear-grupo').modal('open');
	   	}else{
	   		$('#modal-crear-grupo').modal('close');
	   		vm.group = {
			   	key: '',
			   	keyToDisplay: '',
			   	period: ''
			   }
			   $scope.createGroupForm.$setPristine();
	   	}
	   	isModalOpen = !isModalOpen;
   	}
   	vm.toggleModal = toggleModal;

   	vm.onPeriodChange = function () {
	   	if (vm.period) {
	   		var str = vm.period.nameToDisplay;
		   	var pre1 = [];
		   	pre1.push(str.slice(0, 1));
		   	pre1.push(str.slice(str.indexOf('-')+1, str.indexOf('-')+2));
		   	pre1.push(str.slice(str.length-2));
		   	vm.group.keyToDisplay = pre1.join("") + 'G' + (vm.group.key || '');
	   	}
   	}

   	vm.createGroup = function (isvalid) {
	   	if (isvalid) {
	   		vm.group.period = vm.period.id;
	   		vm.group.key = vm.group.keyToDisplay.toUpperCase();
	   		$http({
		         method: 'POST',
		         url: '/group',
		         headers: {
		            'X-CSRF-TOKEN': API.token
		          },
		         data: vm.group
		      }).then(function successCallback(response) {
		   		if (vm.periodForData) {
		   			getData(vm.periodForData.id);
		   		}
		   		API.makeToast('Grupo creado exitosamente', 2);
		        toggleModal();
		         		        
		      }, function errorCallback(error) {
		       
		       	error.data.key.forEach(function  (error) {
		       		API.makeToast(error, 1);
		       	});
		      });
	   	}
	 };
}]);

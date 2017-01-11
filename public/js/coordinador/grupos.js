

var app = angular.module('coordinatorGroups', ['common', 'ngMessages'])
.controller('coordGroupsController', ['API', '$http', '$scope', function(API, $http, $scope){
	var vm = this;
	var isModalOpen = false;
	vm.group = {
	   	key: '',
	   	keyToDisplay: '',
	   	period: ''
	 }

	 var getData = function getData(period) {
	 	API.getGroupsInPeriod(period).then(function(response){
			 vm.groups = response.data;
			 vm.groups.forEach(function(group){
			 	API.getStudentsForGroup(group.id).then(function  (response) {
			 		console.log(response.data);
			 		group['students'] = response.data;
			 	});
			 });
			
		});
	 };

	API.getPeriods().then(function  (response) {
		vm.periods = response.data;
		 vm.periods.forEach(function  (period) {
            period.nameToDisplay = period.months + ' ' + period.year;
         });
		
	});
	vm.getDataForPeriod = function  () {
		getData(vm.periodForData.id);
	}
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
	   		vm.group.key = vm.group.keyToDisplay;
	   		$http({
		         method: 'POST',
		         url: '/group',
		         headers: {
		            'X-CSRF-TOKEN': API.token
		          },
		         data: vm.group
		      }).then(function successCallback(response) {
		   
		         getData(vm.periodForData.id);
		         toggleModal();
		        
		      }, function errorCallback(error) {
		       
		       	error.data.key.forEach(function  (error) {
		       		API.makeToast(error, 1);
		       	});
		      });
	   	}
	 };
}]);

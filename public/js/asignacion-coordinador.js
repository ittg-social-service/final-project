var app = angular.module('assignments', ['common', 'ngMessages']);
app.controller('assignmentController', ['$http', 'API', '$scope', '$q', function ($http, API, $scope, $q) {
   var vm = this;
   vm.filterBy = '';
   var isModalOpen = false;
   vm.group = {
   	key: '',
   	keyToDisplay: '',
   	period: ''
   }

   API.getPeriods().then(function successCallback(response) {
      vm.periods = response.data;
      vm.periods.forEach(function  (period) {
         period.nameToDisplay = period.period + ' ' + period.year;
      });
    
  });
   function getData(period) {
      vm.studentsResp = undefined;
      API.getStudentsInPeriod(period).then(function  (data) {
         vm.students = data.data;
         $q.all(vm.students.map(function(student) {
              return  $http({ method: 'GET', url: '/student/' + student.id + '/group' }).then(function  (response) {
                        var group = response.data.group;
                        if (group.id != 1) {
                           student['group'] = group;
                        }else{
                           student['group'] = {key: 'No asignado', id: group.id};
                        }
                     });
         })).then(function() {
              vm.studentsResp = angular.copy(vm.students);
               filterData();   
         });
      });
      API.getGroupsInPeriod(period).then(function  (data) {
           vm.groups = data.data;
            if (vm.groups.length == 0) {
               API.makeToast('No existen grupos en este periodo');
            }
         });
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
	         API.makeToast('Grupo creado exitosamente', 2);
	         getData(vm.periodForData.id);
	         toggleModal();
	        
	      }, function errorCallback(error) {
	       
	       	error.data.key.forEach(function  (error) {
	       		API.makeToast(error, 1);
	       	});
	      });
   	}
   };
   vm.asignToGroup = function () {
   	var someStudentIsChecked = vm.students.some(function  (item) {
   		return item.isChecked;
   	});

   	if (!someStudentIsChecked) {

   		API.makeToast('No selecciono ningun alumno');
   	}else if(!vm.groupId){
   		API.makeToast('No selecciono ningun grupo');
   	}else{
         var studentsToSend = vm.students.filter(function  (item) {
            return item.isChecked && (item.group.id != vm.groupId);
         });
         $q.all(studentsToSend.map(function(student) {
              return $http({
                        method: 'PUT',
                        url: '/student/' + student.id + '',
                        headers: {
                           'X-CSRF-TOKEN': API.token
                         },
                        data: {group: vm.groupId}
                     })
         })).then(function() {
               API.makeToast('Asignacion exitosa', 2);

               getData(vm.periodForData.id);  
         });
	   /*   vm.students.forEach(function (item) {
	         if (item.isChecked && (item.group_id != vm.groupId)) {
	             $http({
	                  method: 'PUT',
	                  url: '/student/' + item.id + '',
	                  headers: {
	                     'X-CSRF-TOKEN': API.token
	                   },
	                  data: {group: vm.groupId}
	               }).then(function successCallback(response) {
	                  //console.log(response.data);
	                 getData(vm.periodForData.id);
	                //  $('#modal-crear-grupo').modal('close');
	                 
	               }, function errorCallback(response) {
	                // called asynchronously if an error occurs
	                // or server returns response with an error status.
	                console.log('errot');
	            });
	         }
	      });*/
   	}
      //console.log(vm.grupo);
   }
   vm.toggleSelectItem = function (student) {

      student.isChecked = !student.isChecked;
      //console.log(student.isChecked);
      //console.log(vm.students[index].isChecked);
   }

   vm.verifyIfChecked = function (student) {
      return student.isChecked;
   }
   var verifyIfAsigned = function (student) {
      if (vm.students) {
         return student.group.id != 1;
      }
   }
   vm.verifyIfAsigned = verifyIfAsigned;
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
   vm.getDataForPeriod = function  () {
   	getData(vm.periodForData.id);
   }
   function filterData() {
      switch(vm.filterBy) {
         case '1':
            vm.students =  vm.studentsResp;
            vm.students = vm.students.filter(function(item) {
               return item.group.id != 1;
            });
            
            break;
         case '2':
            vm.students = vm.studentsResp;
            vm.students = vm.students.filter(function(item) {
               return item.group.id == 1;
            });
            break;
         case '3':
            vm.students = vm.studentsResp;
            break;
      }
   }
   vm.filterData = filterData;
}]);



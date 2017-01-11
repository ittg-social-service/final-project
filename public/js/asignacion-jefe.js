

(function () {


   angular
      .module('app', ['common'])
      /*.directive('select', materialSelect)*/
      .controller('asigController', ['API', '$http', '$scope', function(API, $http, $scope){
         vm = this;

         vm.tutor = '';
         
         API.getPeriods().then(function successCallback(response) {
	          vm.periods = response.data;
	          vm.periods.forEach(function  (period) {
	          	period.nameToDisplay = period.months + ' ' + period.year;
	          });

        });
          API.getTutors().then(function  (response) {
               vm.tutors = response.data;
               vm.tutors.forEach(function (item) {
                  item['groups'] = 0;
               });

            });
         
         vm.verifyIfAsigned = function (group) {
            return group.tutor_id != 1;
         }
         vm.toggleSelectItem = function (group) {
            group.isChecked = !group.isChecked;

         }

         vm.verifyIfChecked = function (group) {
            return group.isChecked;
         }
         var getDataForPeriod = function getDataForPeriod () {
         	API.getGroupsInPeriod(vm.periodForData.id).then(function  (response) {
               vm.groups = response.data;
               vm.groups.forEach(function (group) {
                  group['isChecked'] = false;
                  API.getStudentsForGroup(group.id).then(function  (response) {
                  	
                  	group['students'] = response.data;
                  });
                  group['tutor'] = vm.tutors.find(function (tutor) {return tutor.id == group.tutor_id;}) || {name: 'No asignado'};
                  groupsForTutor();
               });
               vm.gruposResp = vm.groups;
            });
         } 
         vm.getDataForPeriod = getDataForPeriod;

         var groupsForTutor = function groupsForTutor() {
            if (vm.tutor != null) {
                var groupsForThisTutor = vm.groups.filter(function  (item) {
                  return item.tutor_id == vm.tutor.id;
               });
               vm.tutor.groups = groupsForThisTutor.length;
               
            }
         }
         vm.groupsForTutor = groupsForTutor;
         vm.asignTutor = function () {
         	var someGroupIsChecked = vm.groups.some(function  (item) {
         		return item.isChecked;
         	});
         	if (!someGroupIsChecked) {
         		API.makeToast('Ningun grupo seleccionado');
         	}else if (vm.tutor === '') {
            	API.makeToast('Debe seleccionar un tutor');
            }else{
               angular.forEach(vm.groups, function (item, key) {
               if (item.isChecked && (item.tutor_id != vm.tutor.id)) {
                   $http({
                        method: 'PUT',
                        url: '/group/' + item.id + '',
                        headers: {
                           'X-CSRF-TOKEN': API.token
                         },
                        data: {tutor: vm.tutor.id}
                     }).then(function successCallback(response) {
                     	API.makeToast('Grupo ' + item.key + ' asignado correctamente a:' + vm.tutor.name, 2 );
                       getDataForPeriod();
                                            
                     }, function errorCallback(response) {

                  });
               }
            });
            }
            
            
            //console.log(vm.grupo);
         }
      }]);

})();

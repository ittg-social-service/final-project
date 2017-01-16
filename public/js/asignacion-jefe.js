

(function () {


   angular
      .module('app', ['common'])
      /*.directive('select', materialSelect)*/
      .controller('asigController', ['API', '$http', '$scope', '$q', function(API, $http, $scope, $q){
         vm = this;

         vm.tutor = '';
         vm.dataLoading = false;
         /*
            Obtiene los periodos 
         */
         API.getPeriods().then(function successCallback(response) {
	          vm.periods = response.data;
	          vm.periods.forEach(function  (period) {
	          	period.nameToDisplay = period.period + ' ' + period.year;
	          });

        });
         /*
            Obtiene la lista de tutores
         */
          API.getTutors().then(function  (response) {
               vm.tutors = response.data;
               $q.all(vm.tutors.map(function(tutor) {
                     tutor['groups'] = 0;
                     return   $http({ method: 'GET', url: '/tutor/' + tutor.id + '' }).then(function  (response) {
                                 tutor['info'] = response.data.tutor;
                              });
               })).then(function() {

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
         /*
            * Obtiene los grupos de un periodo asi como el tutor de
               cada uno de esos grupos si grupo.id_tutor == 1
               quiere decir que el tutor no ha sido asignado
         */
         var getDataForPeriod = function getDataForPeriod () {
            vm.dataLoading = true;
         	API.getGroupsInPeriod(vm.periodForData.id).then(function  (response) {
               vm.groups = response.data;
               $q.all(vm.groups.map(function(group) {
                     group['isChecked'] = false;
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
                  vm.dataLoading = false;
                     vm.groupsResp = vm.groups;
                     groupsForTutor();
                  });
            });
         } 
         vm.getDataForPeriod = getDataForPeriod;

         var groupsForTutor = function groupsForTutor() {
            if (vm.tutor != null && vm.tutor != '') {
               $http({ method: 'GET', url: '/tutor/' + vm.tutor.info.id + '/groups' }).then(function  (response) {
                     vm.tutor.groups = response.data.length;
                  });  
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
               if (item.isChecked && (item.tutor_id != vm.tutor.info.id)) {
                   $http({
                        method: 'PUT',
                        url: '/group/' + item.id + '',
                        headers: {
                           'X-CSRF-TOKEN': API.token
                         },
                        data: {tutor: vm.tutor.info.id}
                     }).then(function successCallback(response) {
                     	API.makeToast('Grupo ' + item.key + ' asignado correctamente a:' + vm.tutor.name, 2 );
                       getDataForPeriod();
                                            
                     }, function errorCallback(response) {

                  });
               }
            });
            }
         }
      }]);

})();

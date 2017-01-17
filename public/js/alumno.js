
(function () {
	var app = angular.module('student', ['common', 'ngMessages']);
	app.controller('studentController', ['API', '$http', '$scope', '$q', '$window', function(API, $http, $scope, $q, $window){
			var vm = this;
			vm.dataLoading = true;
			vm.viewAllStudents = true;
			vm.sortTableConf = {
				sortType: 'name',
				sortReverse: false,
			};
			vm.changeTableOrderType = function changeTableOrderType (type) {
				vm.sortTableConf.sortType = type;
				vm.sortTableConf.sortReverse = !vm.sortTableConf.sortReverse;
			}
			vm.infoFor = function infoFor (target) {
				vm.targetToEdit = target;
			}
			vm.edit = function(id){
		      var url = '/student/'+id+'/edit';
		      $window.location.href = url;
		    };
		    vm.toggleViewAllStudents = function toggleViewAllStudents () {
		    	vm.viewAllStudents = !vm.viewAllStudents;
		    	vm.students = vm.studentsResp;
		    }
			//vm.alumnos = alumnos;
			API.getStudents().then(function successCallback(response) {
				vm.students = response.data;
				$q.all(vm.students.map(function(student) {
					student['info'] = {};
		              return  $http({ method: 'GET', url: '/student/' + student.id + '/group' }).then(function  (response) {
		                        var group = response.data.group;
		                        var tutor = response.data.tutor;
		                        if (group.id != 1) {
		                           student.info['group'] = group;
		                        }else{
		                           student.info['group'] = {key: 'No asignado', id: group.id};
		                        }
		                        if (group.tutor_id != 1) {
		                           	student.info['group']['tutor'] = tutor;
		                        }else{
		                           	student.info['group']['tutor'] = {name: 'No asignado'};
		                        }
		                         student.info['student'] = response.data.student;
		                     });
			         })).then(function() {
							vm.dataLoading = false;
			              vm.studentsResp = angular.copy(vm.students);
			              /* filterData();   */
			         });
				console.log(vm.students);
			}, function errorCallback(response) {
				// called asynchronously if an error occurs
				// or server returns response with an error status.
			});
			API.getPeriods().then(function successCallback(response) {
					vm.periods = response.data;
					vm.periods.forEach(function  (period) {
						period.nameToDisplay = period.period + ' ' + period.year;
					});
					console.log(vm.periods);
				}, function errorCallback(response) {
					// called asynchronously if an error occurs
					// or server returns response with an error status.
			});
			vm.storeStudent = function (valid) {
				if (valid) {
					
				vm.student.period = vm.period.id;
				API.storeStudent(vm.student).then(function  (response) {
					API.makeToast('Listo', 2);
					vm.student = {};
					$scope.createStudentForm.$setPristine();
				}, function  (error) {
					error.data.username.forEach(function  (err) {

						API.makeToast(err.replace('username', 'numero de control'), 1);
					});
				});
				}
			}

			vm.getDataForPeriod = function getDataForPeriod () {
				vm.viewAllStudents = false;
				vm.students = vm.studentsResp;
				vm.students = vm.students.filter(function  (item) {
					return item.info.student.period_id == vm.periodForData.id;
				});
			}


	}]);
})();

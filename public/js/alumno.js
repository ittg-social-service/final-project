
(function () {
   var app = angular.module('student', ['common', 'ngMessages']);
  app.controller('studentController', ['API', '$http', '$scope', function(API, $http, $scope){
      var vm = this;
      //vm.alumnos = alumnos;
      API.getStudents().then(function successCallback(response) {
          vm.students = response.data;
  
        }, function errorCallback(response) {
          // called asynchronously if an error occurs
          // or server returns response with an error status.
        });
      API.getPeriods().then(function successCallback(response) {
          vm.periods = response.data;
          vm.periods.forEach(function  (period) {
          	period.nameToDisplay = period.period + ' ' + period.year;
          });
          
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
      		error.data.nc.forEach(function  (err) {

      			API.makeToast(err.replace('nc', 'numero de control'), 1);
      		});
      	});
        }
      }


  }]);
})();

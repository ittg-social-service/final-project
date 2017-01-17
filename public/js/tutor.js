
(function () {
   var app = angular.module('tutor', ['common']);
  	app.controller('tutorController', [ 'API', '$window', function(API, $window){
      	var vm = this;
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
	      var url = '/tutor/'+id+'/edit';
	      $window.location.href = url;
	    };
      	API.getTutors().then(function successCallback(response) {
         	vm.tutors = response.data;
        });
  	}]);
})();


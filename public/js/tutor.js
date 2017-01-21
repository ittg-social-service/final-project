
(function () {
   var app = angular.module('tutor', ['common']);
  	app.controller('tutorController', [ 'API', '$window', '$http', function(API, $window, $http){
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
	    var getTutors = function getTutors () {
	    	
	      	API.getTutors().then(function successCallback(response) {
	         	vm.tutors = response.data;
	        });
	    }
	    getTutors();
        vm.makeMeTutor = function makeMeTutor () {
		    	$http({ 
			        method: 'POST',
			        url: '/tutor',
			          headers: {
			              'X-CSRF-TOKEN': API.token
			            },
			          data: {hod:'hod'} 
			    }).then(function  (response) {
			    	if (response.data.status == '1') {
			    	
			    		API.makeToast('Se ha matriculado correctamente');
			    		getTutors();
			    	}else{
			    		API.makeToast('Usted ya se encuentra matriculado');

			    	}
			    });
		    }
  	}]);
})();


angular.module('period', ['common'])
.controller('periodController', ['$http', 'API', '$q', function($http, API, $q){
	var vm = this;
	var years = [];
	var min = new Date().getFullYear(),
   		max = min + 4;
	for (var i = min; i<=max; i++){
	    years.push({nameToDisplay: i});
	}
	vm.periods = years;
	var periodsMonth = [{period: 'ENE-JUN'},{period: 'AGO-DIC'}];
	vm.storePeriod =  function storePeriod () {
		$q.all(periodsMonth.map(function(period) {
			return $http({ 
		        method: 'POST',
		        url: '/jefe-departamento/guardar-periodo',
		          headers: {
		              'X-CSRF-TOKEN': API.token
		            },
		          data: {period: period.period, year: vm.year.nameToDisplay} 
		    });
		    
     	})).then(function(data) {
			var resp = data[0].data.status;
	    	if (resp == '0') {
	    	
	    		API.makeToast('Ya existen periodos para ese año',1);
	    	}else{
	    		
	    		API.makeToast('Registro correcto',2);
	    	}
     	});
	}
}]);

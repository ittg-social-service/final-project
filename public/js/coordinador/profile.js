var app = angular.module('profile', []);
app.controller('profileController', ['$q', function($q){
	var vm = this;
	vm.changePassword = false;
	vm.toggleChangePassword = function changePassword () {
		vm.changePassword = !vm.changePassword;
	}
}]);
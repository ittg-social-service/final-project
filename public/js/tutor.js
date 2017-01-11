
(function () {
   var app = angular.module('tutor', ['common']);
  app.controller('tutorController', [ 'API', function(API){
      var vm = this;
      //vm.tutores = tutores;
      API.getTutors().then(function successCallback(response) {
          vm.tutors = response.data;
        });
  }]);
})();


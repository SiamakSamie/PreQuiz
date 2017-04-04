describe('adding questions to a quiz', function() {


	
  /*
  prequiz_module.controller('add-forms', function($scope){
    
    $scope.questions = [{id: 'question1'}];
    
    // function
    $scope.addQuestion= function(){
      var newQuestion = $scope.questions.length + 1;
	  $scope.questions.push({'id':'choice'+newQuestion});
     };
    
    // remove questions from quiz dynamically
    $scope.removeQuestion = function(){
      
      var lastQuestion = $scope.questions.length-1;
      $scope.questions.splice(lastQuestion);
    };
  }); 
  */
  
  //guide: https://docs.angularjs.org/guide/controller
  
  describe ('add-forms', function() {
  	var prequiz_module = angular.module('preQuiz-module', ['ngMaterial', 'ngAnimate', 'luegg.directives']);
    var $scope;
    
	beforeEach(module('preQuiz-module'));
	
	beforeEach(inject(function($rootScope, $controller) {
		$scope = $rootScope.new();
		$controller('add-forms', {$scope: $scope});
	}));
	
	it('should add a question when you click the +', function() {
		$scope.questions.length = 1;
		$scope.questions.addQuestions();
		expect($scope.newQuestion.length).toEqual(2);
	});
	
  });
  
 /*
 prequiz_module.controller('sidenav-controller', function($scope, $mdSidenav, $mdDialog) {
      $scope.isSidenavOpen = false;
      
      // open the menu
      $scope.openLeftMenu = function() {
        $mdSidenav('left').toggle();
      };
      
      // close the menu
      $scope.toggleLeft = function() {
        $mdSidenav('left').toggle();
      };
      
      // display error message for users who aren't logged in
      $scope.dispErrMsg = function(ev) {
        $mdDialog.show(
          $mdDialog.alert()
          .clickOutsideToClose(true)
          .title('Feature Unavailable')
          .textContent('Please login before using this feature')
          .ok('Got it!')
          .targetEvent(ev)
        );
      };
  });
 */

  describe('sidenav-controller', function() {

  	var $scope;

  	beforeEach(inject(function($rootScope, $controller) {
  		$scope = $rootScope.new();
  		$controller('sidenav-controller', {$scope: $scope});
  	}));

  	it('should toggle the sidebar navigation', function() {
  		$scope.isSidenavOpen = false;
  		$scope.isSidenavOpen.openLeftMenu();
  		expect($scope.isSidenavOpen = true);
  	});

  });
	
	
});
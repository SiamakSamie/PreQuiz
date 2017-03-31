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
    var $scope;
    
	beforeEach(module('prequiz_module'));
	
	beforeEach(inject(function($rootScope, $controller) {
		$scope = $rootScope.new();
		$controller('add-forms', {$scope: $scope});
	}));
	
	it('should add a question when you click the +', function() {
		$scope.questions.length = 1;
		$scope.questions.addQuestions();
		expect($scope.questions.length).toEqual(2);
	});
	
  });
  
  
  

	
	
	
});
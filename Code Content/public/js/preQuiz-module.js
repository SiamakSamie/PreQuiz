var prequiz_module = angular.module('preQuiz-module', ['ngMaterial', 'ngAnimate']);

  prequiz_module.controller('searchForm-controller', function($scope, $http, $mdDialog)  {

      $scope.allUnis = [];
      $scope.matching = [];
      
      $http.post('/getAllUnis')
        .then(function(response){
          $scope.allUnis = response.data;
      });
      
      $scope.autocomplete_unis = function(entry) {
        $scope.matching = []; // reset results every key entered
        for(var i = 0; i < $scope.allUnis.length; i++ ) {
           if (($scope.allUnis[i].toLowerCase().indexOf(entry.toString().toLowerCase()) >= 0) && entry.trim() != "") 
              $scope.matching.push($scope.allUnis[i]);
        }
      }
      
      $scope.allCourses = [];
      
      $scope.fetchCourses = function(uni_entry, ev) {
        $http({
          url: '/getAllCourses', 
          method: "POST",
          params: {uni_name: uni_entry.trim()}
        })
          .then( function(response) {
           if(response.data != "") { // data was found!
              $scope.allCourses = response.data;
              
              document.getElementById("uni_form").className = "hidden";
              document.getElementById("course_form").className = "displayed";
           }
           else {                 // data was not found ...
              $mdDialog.show(
                $mdDialog.alert()
                .clickOutsideToClose(true)
                .title('No quizzes found for course ' + uni_entry +'.')
                .textContent('Please make sure the univeristy name was chosen from the suggested list.')
                .ok('Got it!')
                .targetEvent(ev)
              );
           }
        });
      }
      
      $scope.autocomplete_courses = function(entry) {
        
        $scope.matching = []; // reset results every key entered
        for(var i = 0; i < $scope.allCourses.length; i++ ) {
           if (($scope.allCourses[i].toLowerCase().indexOf(entry.toString().toLowerCase()) >= 0) && entry.trim() != "") 
              $scope.matching.push($scope.allCourses[i]);
        }
      }
  });
  
  
  prequiz_module.controller('sidenav-controller', function($scope, $mdSidenav, $mdDialog) {
      $scope.isSidenavOpen = false;
      
      $scope.openLeftMenu = function() {
        $mdSidenav('left').toggle();
      };
      
      $scope.toggleLeft = function() {
        $mdSidenav('left').toggle();
      };
      
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

  
  
  prequiz_module.controller('add-forms', function($scope){
    
    $scope.questions = [{id: 'question1'}];
    
    $scope.addQuestion= function(){
      var newQuestion = $scope.questions.length + 1;
      $scope.questions.push({'id':'choice'+newQuestion});
      
     };
  
    $scope.removeQuestion = function(){
      
      var lastQuestion = $scope.questions.length-1;
      $scope.questions.splice(lastQuestion);
    };
  });
    
    
  
  
  
  
  
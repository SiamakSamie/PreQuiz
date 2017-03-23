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
    
prequiz_module.controller('mention-feature', function($scope, $http) {
  
  $scope.username_mentioned = [];
  $scope.Allusers = [];
  $scope.startAt = 0;
  $scope.mentioning = false;
  
  $scope.comment_text = "";
  $scope.user_mentioned_id = [];
  
  $http.post('/getAllUserNames')
    .then(function(response){
      $scope.Allusers = response.data;
          
  });
  
  $scope.mention = function($input){
    
      $scope.results = [];
      $scope.comment_text = $input;
      
      if($input != undefined && $input[$input.length-1] == "@") {
        
        // hide the mention list
        document.getElementById('mention_list').style.display = 'none';
                    
        $scope.startAt = $input.length;
        $scope.mentioning = true;
      }
      
      if($scope.mentioning == true && $input != undefined) {
          
           $scope.username_mentioned = $input.substring($scope.startAt);
            
            for(var i = 0; i < $scope.Allusers.length; i++ ) {
                  
                if (($scope.Allusers[i].name.toLowerCase().trim().indexOf($scope.username_mentioned.toLowerCase().trim()) >= 0 && $scope.username_mentioned.trim() != "") ) {  
                    // display the mention list
                    document.getElementById('mention_list').style.display = 'inline';
                    
                    $scope.results.push($scope.Allusers[i]);
                }
            }
       }
      
      if($scope.mentioning == true && $input != undefined && $input[$input.length-1] == " " || $input == undefined) {
        
            // hide the mention list
           document.getElementById('mention_list').style.display = 'none';
           
           
          $scope.username_mentioned = [];
          $scope.mentioning = false;
      }
  }
  
  $scope.addMentioned = function($result) {
    
    $scope.comment_text = $scope.comment_text.replace('@'+$scope.username_mentioned, '@'+$result.name.trim()+'± ');
    $scope.mentioning = false;
    
    console.log("selected user id= " + $result.id);
    $scope.user_mentioned_id.push($result.id);
    
    document.getElementById('mention_list').style.display = 'none';
    document.getElementById('comment_text').focus();
  }
    
});
    
  prequiz_module.controller('validate-answer', function($scope){
    $scope.answer = {answer1:false, answer2:false, answer3:false, answer4:false};
    $scope.data = ["Object1", "Object2", "Object3"];
    $scope.isValid = false;
    
    $scope.test = "";
    $scope.validation = function(answer){
      //console.log('hello' + answer);
      $scope.isValid = true;
      
      if (answer ==1){
        $scope.answer.answer1 = true;
        $scope.answer.answer2 = false;
        $scope.answer.answer3 = false;
        $scope.answer.answer4 = false;
      }
      if (answer ==2){
        $scope.answer.answer1 = true;
        $scope.answer.answer2 = true;
        $scope.answer.answer3 = false;
        $scope.answer.answer4 = false;
      }
      if (answer ==3){
        $scope.answer.answer1 = true;
        $scope.answer.answer2 = false;
        $scope.answer.answer3 = true;
        $scope.answer.answer4 = false;
      }
      if (answer ==4){
        $scope.answer.answer1 = true;
        $scope.answer.answer2 = false;
        $scope.answer.answer3 = false;
        $scope.answer.answer4 = true;
      }
    };

   
  });
  
  
  
  

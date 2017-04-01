var prequiz_module = angular.module('preQuiz-module', ['ngMaterial', 'ngAnimate', 'luegg.directives']);

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

  prequiz_module.controller('add-forms', function($scope, $http){
   
    $scope.questions = [{id: 'question1'}];
    $scope.editedQuestions = [];
    $scope.numOfQuestions = 0;
    
    var lengthQuestions=$scope.lengthQuestions;
    var numOfQuestions=0;
    
    var number=0;
    
    $scope.initQuizId = function(quiz_id){
  
      $http({
          url: '/getQuestions', 
          method: "POST",
          params: {id: quiz_id}
        })
          .then( function(response) {
              
            //console.log(response.data);
            var numOfQuestions = response.data.length;
            // console.log(numOfQuestions);
            $scope.lengthQuestions = numOfQuestions;
            // $scope.numOfQuestions = numOfQuestions;
          });
      
    };
    
    $scope.addQuestion= function(){
      var newQuestion = $scope.questions.length + 1;
      $scope.questions.push({'id':'choice'+newQuestion});
     };
  
    $scope.removeQuestion = function(){
      
      var lastQuestion = $scope.questions.length-1;
      $scope.questions.splice(lastQuestion);
    };
    
    $scope.addEditedQuestion = function(){
     
      // console.log($scope.editedQuestions.length);
      number = $scope.editedQuestions.length;
      $scope.numOfQuestions += 1;
      numOfQuestions = $scope.numOfQuestions;
      $scope.editedQuestions.push({'id':'question' + $scope.numOfQuestions});
    
    };
    
    $scope.removeEditedQuestion = function(){
      var lastQuestion = $scope.editedQuestions.length - 1;
      $scope.editedQuestions.splice(lastQuestion);
    };
    
  // $scope.appendQuestion = function(quiz_id){
      
  //           //console.log(numOfQuestions);
  //           $scope.editedQuestions.push({'id':'uestion'+numOfQuestions});
  //           console.log($scope.editedQuestions);
  //           // $scope.questionList = response.data;
  //           // console.log($scope.questionList);
  //           // $scope.questionList[2].push({"question:"});
            
  //           //SCOPE.QUESTIONLIST = QUESTIONS FROM DATABASE
  //           //SCOPE.QUESTIONLIST.PUSH({'QUESTION' + NUMOFQUESTIONS})
   
  //   };
    
  });
    
prequiz_module.controller('mention-feature', function($scope, $http, $window) {
  
  $scope.username_mentioned = [];
  $scope.Allusers = [];
  $scope.startAt = [];
  $scope.mentioning = false;
  
  $scope.comment_text = "";
  $scope.user_mentioned_id = [];
  $scope.savedStartIndex = [];
  $scope.previous_input = "";
  
  $http.post('/getAllUserNames')
    .then(function(response){
      $scope.Allusers = response.data;
          
  });
  
  // this function is executed every time the text area of the comment box is changed, it detects if the next input is a @, 
  // then reads the subsquent input and searches through the database for a match, for each match, a button is created and added to the
  // mention list, when one of these buttons are clicked, the following function addMention() gets called and a text gets appended 
  // to the textarea holding the mention information
  
  // for now this only works when removing / adding from the end of the sentence
  
  $scope.mention = function($input){
    
     // this is what will be used to read input not only from the end of the sentence in the future
      console.log("Current cursor position: " + $("#comment_text").prop("selectionStart"));
    
      $scope.results = [];
      $scope.comment_text = $input;
      
      // detect a @ sign at the end of the sentence
      if($input != undefined && $input[$input.length-1] == "@") {
       
          // if the user enters @@@@@
        if($input[$input.length-2] == "@") {
            $scope.startAt.pop();
            $scope.startAt.push($input.length);
            
        }
        else {
            // this case handles when user inputed @@ and then deletes 1 to have @
            if($scope.previous_input.length > $input.length &&  $input != undefined  && $input.length > 1)
              $scope.startAt.pop();
              
            //this if statement is to avoid adding into start Index when back spacing into an @ sign
            if($scope.startAt.indexOf($input.length) == -1) {
                $scope.startAt.push($input.length);  
            }
        }
        
        // if you back space into an @, it's fine we can restart mentioning
        $scope.mentioning = true;
        
      }
      // if mentioning is true, and there is actual input in the text area
      if($scope.mentioning == true && $input != undefined) {
    
          // display the mention list
          document.getElementById('mention_list').style.display = 'inline';
          
          // read the input after the @ sign
          $scope.username_mentioned = $input.substring($scope.startAt[$scope.startAt.length - 1]);
          
          // for each of the users that exist...
          for(var i = 0; i < $scope.Allusers.length; i++ ) {
            
            // if a match was found between the input and the current user
            if (($scope.Allusers[i].name.toLowerCase().trim().indexOf($scope.username_mentioned.toLowerCase().trim()) >= 0 && $scope.username_mentioned.trim() != "") ) {
     
                 // checks if user is already mentioned, and excludes from mention suggestion list
                 $scope.duplicate = $scope.user_mentioned_id.indexOf($scope.Allusers[i].id);
                     
                 if($scope.duplicate < 0)
                     $scope.results.push($scope.Allusers[i]);
              
                 $window.scrollToBot("body");
            }
         }
      }
       
      // if a space is entered, autocomplete it to the first list suggestion
      // also make sure the inputed space bar is from adding a space bar not backspacing into one
      if($scope.mentioning == true && $input != undefined && $input[$input.length-1] == " " && $scope.previous_input.length < $input.length) {
        
            // hide the mention list
           document.getElementById('mention_list').style.display = 'none';
           
          $scope.addMentioned($scope.results[0]);
          $scope.username_mentioned = [];
          $scope.mentioning = false;
      }
      
      if($input == undefined ) {  // if nothing is in the input field reset everything
      
          document.getElementById('mention_list').style.display = 'none';
          
          $scope.mentioning = false;
          $input = "";
          $window.resetData();
         
      }
      
      if( $scope.startAt.length != 0  && $input[$scope.startAt[$scope.startAt.length - 1] - 1] == undefined)  {  // this is for indecisive people, if user have erased an @ sign because reasons ...
      
        document.getElementById('mention_list').style.display = 'none';
        
        //if that mention sign has a name, remove it and pop it from the mentioned_ids' otherwise don't pop anything
        // also remove its index so that we know that the index of this @ sign is not important anymore 
        if($scope.savedStartIndex.indexOf($scope.startAt[$scope.startAt.length - 1]) >= 0) {
            $scope.user_mentioned_id.pop(); 
            $scope.savedStartIndex.pop();
        }
        
        $scope.mentioning = false;
        $scope.startAt.pop();
        
      }
      
      $scope.previous_input = $input;
      // save the previous input after each change, to see if user removed or added a value
    }
  
    // this function executes when the user list item is clicked inside the mention list, in order to add it to the textarea 
    $scope.addMentioned = function($result) {
     
      // this is what happens when a user is mentioned
       if($result != undefined) {
          // replace whatever input was entered so far with the guy's actual name with no spaces and an @ sign at its beginning
          $scope.comment_text = $scope.comment_text.replace('@'+$scope.username_mentioned, '@'+$result.name.replace(" ", "") +" ");
          $scope.user_mentioned_id.push($result.id);
       }
       
      $scope.mentioning = false;
      document.getElementById('mention_list').style.display = 'none';
      
      if($result != undefined) 
         $scope.savedStartIndex.push($scope.startAt[$scope.startAt.length - 1]); // save every index that actually has a mention name, so that if you delete a @ sign wit
      
    }
    
    // this function executes when the reply button is pressed
    $scope.replyBtnMention = function($name, $id) {
      
        console.log("in?");
       
       // only add it to the textarea if it wasn't there before
       if($scope.user_mentioned_id.indexOf(parseInt($id)) < 0) {
         
           $scope.comment_text += "@"+$name.replace(" ", "")+" ";
           $scope.user_mentioned_id.push(parseInt($id));
       }
    }
    
    $window.resetData = function(){     // this is called when ajax submit comment is called, so that we can reEnable mentioning the same name twice

       $scope.comment_text = "";
       $scope.user_mentioned_id = [];
       $scope.startAt = [];
       $scope.savedStartIndex = [];
       $scope.username_mentioned = [];
    }

    $window.scrollToBot = function(div_id) {
       document.getElementById(div_id).scrollTop = document.getElementById(div_id).scrollHeight;
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
  

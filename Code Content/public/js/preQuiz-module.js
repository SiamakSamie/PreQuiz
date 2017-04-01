var prequiz_module = angular.module('preQuiz-module', ['ngMaterial', 'ngAnimate', 'ngSanitize']);

  prequiz_module.controller('searchForm-controller', function($scope, $http, $sce)  {

      $scope.allUnis = [];
      $scope.matching = [];
      
      $http.post('/getAllUnis')
        .then(function(response){
          $scope.allUnis = response.data;
      });
      
      $scope.autocomplete_unis = function(entry) {
        $scope.matching = []; // reset results every key entered
        for(var i = 0; i < $scope.allUnis.length; i++ ) {
           if (entry != undefined && ($scope.allUnis[i].toLowerCase().indexOf(entry.toLowerCase()) >= 0) && entry.trim() != "") 
              $scope.matching.push($scope.allUnis[i]);
        }
      }
      
      $scope.allCourses = [];
      $scope.errorMsg = "<a href='/create_quiz'> Start by making a quiz? </a>";
      
      $scope.fetchCourses = function(uni_entry, ev) {
        $scope.errorMsg = "";
        
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
           else {  // data was not found ...
             $scope.errorMsg = "<div class='text-muted'> " +
                                    "<b> University not found! </b> <br /> "+
                                    "can't find what you're looking for? <br /> "+
                                    "<a href='/create_quiz'> Create a quiz </a> "
                               "</div>";
             $scope.errorMsg = $sce.trustAsHtml($scope.errorMsg);   // this is for angularJS to trust the previously entered HTML code 
           }
        });
      }
      
      // this function is for people who want to change uni name after submitting the first entry
      $scope.undoSubmit = function() {
         $scope.allCourses = [];
          
         document.getElementById("uni_form").className = "displayed";
         document.getElementById("course_form").className = "hidden";
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
    
prequiz_module.controller('mention-feature', function($scope, $http, $window) {
  
  $scope.username_mentioned = [];
  $scope.Allusers = [];
  $scope.startAt = [];
  $scope.mentioning = false;
  
  $scope.comment_text = "";
  $scope.user_mentioned_id = [];
  $scope.savedStartIndex = [];
  $scope.previous_input = "";
  $scope.new_comments = [];
  $scope.key_pressed = "";

  $http.post('/getAllUserNames')
    .then(function(response){
      $scope.Allusers = response.data;
          
  });
  
  //posting a comment
  $scope.commentRequest = function($coursename, $user_id, $uni_name) {

     // we need to go to the route and execute the db insertion
     $http({
      method: 'POST',
      url: '/addComment',
      data: {
            "uni_name": $uni_name,
            "course_name":$coursename,
            "user_id":$user_id,
            "text": $scope.comment_text,
            "mentioned_ids":$scope.user_mentioned_id,
       },
    })
    // if it works... do this
    .then(function(response){
        
        $http({
          method: 'POST',
          url: '/lastComment',
          data: {
                "university": $uni_name,
                "course_name":$coursename,
           },
        })
        // if it works... push the results in the variable new_comments
        // that the comment section is reading from
        // that's how the comment list gets updated
        .then(function(response){
            $scope.new_comments.push({last_comment: response.data.last_comment, commentator: response.data.commentator});
            
            $scope.comment_text = "";
            $window.resetData();
            $window.scrollToBot('commentList');
        });
    });
  }
  
  // upvote comment
  $scope.upVoteComment = function($comment_id, $user_id) {
      $http({
          method: 'POST',
          url: '/upVoteComment',
          data: {
              "comm_id":$comment_id,
              "user_id":$user_id,
           },
        })
        // if it works... do this
        .then(function(response){
            $('#up_votes'+$comment_id).text('+ ' + response.data.up);
			$('#down_votes'+$comment_id).text('- ' + response.data.down);
        });
  }
  
  $scope.downVoteComment = function($comment_id, $user_id) {
      $http({
          method: 'POST',
          url: '/downVoteComment',
          data: {
              "comm_id":$comment_id,
              "user_id":$user_id,
           },
        })
        // if it works... do this
        .then(function(response){
            $('#up_votes'+$comment_id).text('+ ' + response.data.up);
			$('#down_votes'+$comment_id).text('- ' + response.data.down);
        });
  }
  
  $scope.mentioned_user_kb_index= 0;

  // register key for navigating through mention list up/down
  $scope.onKeyUp = function ($event) {
      if($scope.mentioning == true && $scope.previous_input != undefined && $scope.results.length != 0) {
      
          $scope.key_pressed = $event.keyCode;
          // if user keeps typing and results shrinks, but his index was at a higher place that
          // doesn't exist anymore ... 
          // reset the index
          if($scope.mentioned_user_kb_index > $scope.results.length) {
             $scope.mentioned_user_kb_index = 0;
          }
          
          // make the first choice always selected at first
          if($scope.mentioned_user_kb_index == 0) {
            $('#user_0').addClass('active');
            $('#user_1').removeClass('active');
          }
            // when up key is pressed
          if($event.keyCode == 38 && $scope.mentioned_user_kb_index > 0) {
            $scope.mentioned_user_kb_index--;
            $('#user_'+$scope.mentioned_user_kb_index).addClass('active');
            $('#user_'+($scope.mentioned_user_kb_index + 1)).removeClass('active');
            
          }
            // when down key is pressed
          else if($event.keyCode == 40 && $scope.mentioned_user_kb_index < $scope.results.length - 1) {
            $scope.mentioned_user_kb_index++;
            $('#user_'+($scope.mentioned_user_kb_index - 1)).removeClass('active');
            $('#user_'+$scope.mentioned_user_kb_index).addClass('active');
           
          }
          // if the user presses enter, it acts as if he pressed space, and autocompletes the selected user
          if($event.keyCode == 13) {
            // hide the mention list and re-enable the comment box
            document.getElementById('mention_list').style.display = 'none';
            
            $scope.addMentioned($scope.results[$scope.mentioned_user_kb_index]);
            $scope.mentioned_user_kb_index = 0;
            $scope.username_mentioned = [];
            $scope.mentioning = false;    
          }
          
            // make sure that the current user mentioned is at the bottom of the list seen
            // make sure there is at least 3 elements, otherwise we don't need to scroll
            if($scope.results.length > 2) {
              $('#mention_list').animate({
                  scrollTop: $("#user_"+$scope.mentioned_user_kb_index).offset().top - $('#user_2').offset().top
              }, "fast");
            }
            
          // make sure the entire mention list can be seen
          $window.scrollToBot('body');
      }
  };
    
  // this function is executed every time the text area of the comment box is changed, it detects if the next input is a @, 
  // then reads the subsquent input and searches through the database for a match, for each match, a button is created and added to the
  // mention list, when one of these buttons are clicked, the following function addMention() gets called and a text gets appended 
  // to the textarea holding the mention information
  
  // for now this only works when removing / adding from the end of the sentence
  
  $scope.mention = function($input){
    
      $scope.results = [];
      $scope.comment_text = $input;
      $scope.curr_cursor = $("#comment_text").prop("selectionStart");
      // detect a @ sign at the end of the sentence
      if($input != undefined && $input[$scope.curr_cursor -1] == "@") {
       
          // if the user enters @@@@@
        if($input[$scope.curr_cursor - 2] == "@") {
            $scope.startAt.pop();
            $scope.startAt.push($scope.curr_cursor);
            
        }
        else {
            // this case handles when user inputed @@ and then deletes 1 to have @
            if($scope.previous_input.length > $input.length &&  $input != undefined  && $input.length > 1)
              $scope.startAt.pop();
              
            //this if statement is to avoid adding into start Index when back spacing into an @ sign
            if($scope.startAt.indexOf($scope.curr_cursor) == -1) {
                $scope.startAt.push($scope.curr_cursor);  
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
          // the first if is if the user is typing at the end of the sentence, otherwise...
          if($input.length == $scope.curr_cursor) 
              $scope.username_mentioned = $input.substring($scope.startAt[$scope.startAt.length - 1]);
          // the user is typing mid sentence
          else
            $scope.username_mentioned = $input.substring($scope.startAt[$scope.startAt.length - 1], $input.indexOf(' '));
          
          // for each of the users that exist...
          for(var i = 0; i < $scope.Allusers.length; i++ ) {
            
            // if a match was found between the input and the current user
            if (($scope.Allusers[i].name.toLowerCase().trim().indexOf($scope.username_mentioned.toLowerCase().trim()) >= 0 && $scope.username_mentioned.trim() != "") ) {
     
                 // checks if user is already mentioned, and excludes from mention suggestion list
                 $scope.duplicate = $scope.user_mentioned_id.indexOf($scope.Allusers[i].id);
                     
                 if($scope.duplicate < 0)
                     $scope.results.push($scope.Allusers[i]);
            }
          }
          $window.scrollToBot("body");
          
          console.log($scope.startAt);
          console.log($scope.username_mentioned);
          console.log("users mentioned" + $scope.user_mentioned_id);
      }
       
      // if a space is entered, autocomplete it to the first list suggestion
      // also make sure the inputed space bar is from adding a space bar not backspacing into one
      if($scope.mentioning == true && $input != undefined && $input[$scope.curr_cursor - 1] == " " && $scope.previous_input.length < $input.length) {
        
          // hide the mention list and re-enable the comment box
          document.getElementById('mention_list').style.display = 'none';
              
          $scope.addMentioned($scope.results[$scope.mentioned_user_kb_index]);
          $scope.mentioned_user_kb_index = 0;
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
        $scope.mentioned_user_kb_index = 0;
        
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
      
       // only add it to the textarea if it wasn't there before
       if($scope.user_mentioned_id.indexOf(parseInt($id)) < 0) {
         
           $scope.comment_text += "@"+$name.replace(" ", "")+" ";
           $scope.user_mentioned_id.push(parseInt($id));
       }
    }
    
    $window.resetData = function(){     // this is called when ajax submit comment is called, so that we can reEnable mentioning the same name twice

       $scope.comment_text = "";
       $scope.mentioned_user_kb_index = 0;
       $scope.user_mentioned_id = [];
       $scope.startAt = [];
       $scope.savedStartIndex = [];
       $scope.username_mentioned = [];
       document.getElementById('mention_list').style.display = 'none';
    }

    $window.scrollToBot = function(div_id) {
       document.getElementById(div_id).scrollTop = document.getElementById(div_id).scrollHeight;
    }
  
});

  prequiz_module.controller('validate-answer', function($scope, $http, $mdDialog, $rootElement, $timeout){
    $scope.openDialog = function(resources, evt) {
        $mdDialog.show({
            template:
               '<md-dialog aria-label="Dialog" style="width:55%; padding: 10px;">'+
               '<md-toolbar>'+
               '<div class="md-toolbar-tools">All Done!</div>'+
               '</md-toolbar>'+
                 '<md-dialog-content>'+
                 '<br /><br />'+
                 
                  '<div class="panel panel-primary">'+
                  ' <div class="panel-heading">Your Score</div>'+
                  '<div class="panel-body">100%</div>'+
                  ' </div>'+
                  
                  '<div class="panel panel-info">'+
                  ' <div class="panel-heading">Extra Resources</div>'+
                  '<div class="panel-body">'+ resources +'</div>'+
                  ' </div>'+

                 '</md-dialog-content>'+
                 '<div class="md-actions" layout="row">'+
                 '<md-button id="btn-close" ng-click="retry()" class="md-accent">Retry</md-button>'+
                 '<md-button id="btn-close" ng-click="close()" class="md-accent">Save and Close</md-button>'+
                 '</div>'+
                 '</md-dialog>',
            targetEvent: evt,
            clickOutsideToClose: true,
            focusOnOpen: true,
            controller: DialogController,
        });
    };
    
  
      function DialogController($scope, $mdDialog) {
        $scope.close = function() {
          $mdDialog.hide();
        }
        $scope.retry = function() {
          window.location.reload();
        }
    };
  
    
    $scope.selectedIndex = 0;
    $scope.nextTab = function() {
        $timeout( function(){
            $scope.selectedIndex = $scope.selectedIndex+1;
        }, 1000 );
    };
    
    $scope.getAllQuestions = function(quiz_id) {
     

        $http({
          url: '/getQuestions', 
          method: "POST",
          params: {id: quiz_id}
        })
          .then( function(response) {
            $scope.answer = [];
            $scope.isValid = [];
            
            $scope.all_tabs = [];
            $scope.data = response.data;
            
            for(var i = 0; i < $scope.data.length; i++) {
                $scope.answer.push({answer1:false, answer2:false, answer3:false, answer4:false});
                $scope.all_tabs.push(i);
                $scope.isValid.push(false);
            }
            
            $scope.validation = function(answer, index){

              $scope.isValid[index] = true;
              
              if (answer ==1){
                $scope.answer[index].answer1 = true;
                $scope.answer[index].answer2 = false;
                $scope.answer[index].answer3 = false;
                $scope.answer[index].answer4 = false;
              }
              if (answer ==2){
                $scope.answer[index].answer1 = true;
                $scope.answer[index].answer2 = true;
                $scope.answer[index].answer3 = false;
                $scope.answer[index].answer4 = false;
              }
              if (answer ==3){
                $scope.answer[index].answer1 = true;
                $scope.answer[index].answer2 = false;
                $scope.answer[index].answer3 = true;
                $scope.answer[index].answer4 = false;
              }
              if (answer ==4){
                $scope.answer[index].answer1 = true;
                $scope.answer[index].answer2 = false;
                $scope.answer[index].answer3 = false;
                $scope.answer[index].answer4 = true;
              }
              
            };
       });
    }
 });
  
  
  
  

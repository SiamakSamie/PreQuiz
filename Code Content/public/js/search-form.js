angular.module('search-form', [])
  .controller('search-formController', function ($scope) {

      var sfc = this;           
      sfc.display = "hidden";     // to hide/show the user input feedback

      sfc.placeholders = [
        {text:'Type the name of your institution', id:'uni'},
      ];

      sfc.user_input = "";
      
      sfc.testvariable = [
          {text:"asd"},
        ];

      sfc.submitform = function() {

        if (sfc.placeholders[0].id === ('uni')) { // if user has entered institution name
          
          sfc.user_input = sfc.text;  // add input to user input final variable to submit in the form

          sfc.display = "displayed";                              // show user input feedback box
          sfc.text = '';                                          // erase old input from input field
          sfc.placeholders.pop();                                 // erase all HTML elements of old input field
          sfc.placeholders.push({text:'Type the course name and number', id:'course'});  // add new HTML elements as new input field for course #

          // Javascript statement, removes onSubmit attribute to be able to submit
          document.getElementById("form").removeAttribute("onSubmit");
        }
      }
      
      sfc.test1 = function(data) {
        sfc.testvariable.push({text:sfc.inn});
      }
  });
  
  
  
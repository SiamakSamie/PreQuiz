describe('This section contains prequiz module tests', function(){


    beforeEach(function () {
       angular.mock.module('preQuiz-module');
       // angular.mock.module('testingAngularApp');
    });
    
    
    describe('Testing controller for form searching', function() {
      var scope, ctrl;
      
        beforeEach(inject(function($controller, $rootScope) {
            scope = $rootScope.$new();
            ctrl = $controller('searchForm-controller', {
                $scope: scope
                
            });
        }));
        
        it('should return matching universities according to entered input', function(){
            scope.allUnis = ['concordia', 'mcgill'];
            scope.autocomplete_unis('c');
            expect(scope.autocomplete_unis).toBeDefined();
            expect(scope.matching).toMatch('[concordia, mcgil]');
            
        });
        
         it('should return matching courses according to entered input', function(){
            scope.allCourses = ['COMP 346', 'ENGR 301', 'SOEN 341'];
            expect(scope.autocomplete_courses).toBeDefined();
            scope.autocomplete_courses('3');
            expect(scope.matching).toMatch('[COMP 346, ENGR 301, SOEN 341]');
            
        });
    });
    
    
    
    
    describe('Testing controller for adding extra questions', function() {
      var scope, ctrl, http, sce;
        
        beforeEach(inject(function($controller, $rootScope) {
            scope = $rootScope.$new();
    
            ctrl = $controller('add-forms', {
                $scope: scope
            });
        }));
        
            // create quiz feature of adding extra questions
        it('should add a question to the current list of questions', function() {
            scope.questions = [];
            expect(scope.addQuestion).toBeDefined();
            scope.addQuestion();
            expect(scope.questions.length).toBe(1);
            scope.addQuestion();
            expect(scope.questions.length).toBe(2);
            
        });
        
            // create quiz feature of removing  questions
        it('should remove a question from the current list of questions', function() {
            scope.questions = ['q1','q2','q3'];
            expect(scope.removeQuestion).toBeDefined();
            scope.removeQuestion();
            expect(scope.questions.length).toBe(2);
            scope.removeQuestion();
            expect(scope.questions.length).toBe(1);
            
        });
            // edit quiz feature of adding questions
        it('NOTICE:EDIT QUIZ FEATURE // should add a question to the current list of questions', function() {
            scope.questions = [];
            expect(scope.addEditedQuestion).toBeDefined();
            scope.addQuestion();
            expect(scope.questions.length).toBe(1);
            scope.addQuestion();
            expect(scope.questions.length).toBe(2);
            
        });
            // edit quiz feature of removing  questions
        it('NOTICE:EDIT QUIZ FEATURE // should remove a question from the current list of questions', function() {
            scope.questions = ['q1','q2','q3'];
            expect(scope.removeEditedQuestion).toBeDefined();
            scope.removeQuestion();
            expect(scope.questions.length).toBe(2);
            scope.removeQuestion();
            expect(scope.questions.length).toBe(1);
            
        });
    });
    
    
    
    describe('Testing controller for comments related functions', function() {
      var scope, ctrl, http;
      
        beforeEach(inject(function($controller, $rootScope, $http) {
            scope = $rootScope.$new();
            http = $http,
            ctrl = $controller('mention-feature', {
                $scope: scope,
                $http: http,
            });
        }));
       
    
        it('should comment in a comment box as a user', function() {
           scope.new_comments = [];
           
           http.post('/addComment', {
            "uni_name" : 'Concordia University',
            "course_name" : 'SOEN 341',
            "user_id" : '1',
            "text" : 'holla',
            "mentioned_ids" : '',
           }).then(function(response){
               expect(response).toBeDefined();
               expect(response).toMatch('holla');
           });
        });
        
        // mention feature test
        it('should test mentioning a user that exists, and adding that user to the mentioned_ids variable', function() {
            scope.results = [];
            scope.curr_cursor = 1; // indicates position of cursor right after the @ sign
            scope.Allusers = [{name: 'Roberto'}, {name: 'Ronaldo'}];
            expect(scope.mention).toBeDefined();
            scope.mention('@r ');
            expect(scope.results.length).toBe(2);
            expect(scope.results[0].name).toBe('Roberto');
            expect(scope.results[1].name).toBe('Ronaldo');
            scope.mention('@rona ');
            expect(scope.results.length).toBe(1);
            expect(scope.results[0].name).toBe('Ronaldo');
        });
       
    });
    
});


@extends('layouts.app')

@section('title')
    Create Quiz
@endsection

@section('extra_links')
@endsection

@section('content')

     
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Quiz</h1>
            
            <hr>
            <form method="POST" action="{{ route('questions.store') }}">
                
                <div ng-controller = "add-forms">
                    
                    <fieldset data-ng-repeat="question in questions">
                        
                        <button class="btn btn-info btn-sm" ng-show="$last" ng-click="removeQuestion()"><span class="glyphicon glyphicon-minus" ></span></button> 
                        <br /><br />
                        
                        <div class="form-group">
                            <label name="question">Question:</label>
                            <input id="question" ng-model="question.question" name="question" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label name="answer">Correct Answer:</label>
                            <input id="answer1" ng-model="question.answer1" name="answer1" rows="10" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label name="answer">Wrong Answer 1:</label>
                            <input id="answer2" ng-model="question.answer2" name="answer2" rows="10" class="form-control">
                        </div>     
                        
                        <div class="form-group">
                            <label name="answer">Wrong Answer 2:</label>
                            <input id="answer3" ng-model="question.answer3" name="answer3" rows="10" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label name="answer">Wrong Answer 3:</label>
                            <input id="answer4" ng-model="question.answer4" name="answer4" rows="10" class="form-control">
                        </div>
                      
                    </fieldset>
                   
                    <button class="btn btn-info btn-sm" onclick="return false" ng-click="addQuestion()" > <span class="glyphicon glyphicon-plus" > </span> </button>
                    <br /><br />
                
                </div>
                
                <input type="submit" value="Create Quiz" class="btn btn-success btn-lg btn-block">
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>

    

@endsection		


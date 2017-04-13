
@extends('layouts.app')

@section('title')
    Create Quiz
@endsection

@section('extra_links')
@endsection

@section('content')

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            Some fields are missing!
        </div>
    @endif
    
    @if (session('status'))
        <div class=" alert alert-success">
            <a class="close" data-dismiss="alert">×</a>
            <strong>Great!</strong> {{ session('status') }}
        </div>
    @endif
    

    <div class="row">
        <div class="container">
            <h1>Add new questions</h1>
            <hr>
            
            <div class="panel panel-default">
              <div class="panel-heading"> <b> Current quiz information </b> </div>
              <div class="panel-body"> <b> University name: </b>{{ $quiz->university }} </div>
              <div class="panel-body"> <b> Course name: </b>{{ $quiz->coursename }} </div>
              <div class="panel-body"> <b> Quiz name: </b>{{ $quiz->quizname }} </div>
              <div class="panel-body"> <b> Quiz description: </b> {!! $quiz->quizdescription !!} </div>
              <div class="panel-body"> <b> Quiz resources: </b> {!! $quiz->resources !!} </div>
            </div>
            
            <form method="POST" action="{{ route('questions.store') }}" >
                
                <div ng-controller = "add-forms">
                    
                    <fieldset data-ng-repeat="question in questions">
                        
                        <button class="btn btn-info btn-sm" ng-show="$last" ng-click="removeQuestion()" ><span class="glyphicon glyphicon-minus" ></span></button> 
                        <br /><br />
                        
                        <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
                        
                        <div class="form-group">
                            <label name="question">Question <span ng-bind="$index + 1"></span>:</label>
                            <input id="question" ng-model="question.question" name="question[@{{$index}}]" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label name="answer">Correct Answer:</label>
                            <input id="answer1" ng-model="question.answer1" name="answer1[@{{$index}}]" rows="10" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label name="answer">Wrong Answer 1:</label>
                            <input id="answer2" ng-model="question.answer2" name="answer2[@{{$index}}]" rows="10" class="form-control">
                        </div>     
                        
                        <div class="form-group">
                            <label name="answer">Wrong Answer 2:</label>
                            <input id="answer3" ng-model="question.answer3" name="answer3[@{{$index}}]" rows="10" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label name="answer">Wrong Answer 3:</label>
                            <input id="answer4" ng-model="question.answer4" name="answer4[@{{$index}}]" rows="10" class="form-control">
                        </div>
                      
                    </fieldset>
                   
                    <button class="btn btn-info btn-sm" onclick="return false" ng-click="addQuestion()" > <span class="glyphicon glyphicon-plus" > </span> </button>
                    <br /><br />
                
                </div>
                
                <input type="submit" value="Create Quiz" class="btn btn-success btn-lg btn-block">
                <a href="{{ url('/') }}" class="btn btn-default btn-lg btn-block"> Cancel </a>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>

    

@endsection		


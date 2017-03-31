 @extends('layouts.app')
 
 @section('title')
     Edit quiz
 @endsection
 
 @section('extra_links')
 @endsection
 
 @section('content')
     <div class="container">
         <div class="row">
             <!--{{ $my_quiz->Questions[0]->id }}-->
             <div class="col-sm-8 col-sm-offset-2">
                <h1>Editing Quiz</h1>
                <hr>
                
                <form method="POST" action="{{ url('updateQuizInfo') }}">
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                    <input type="hidden" name="quiz_id" value="{{ $my_quiz->id }}">
                                                                                     
                                                    <!-- this is used as a default value for uni name, before suggesting others -->
                    <div class="form-group" ng-controller="searchForm-controller" ng-init="selected_uni= '{{$my_quiz->university}}'">
                        <label name="university">University name:</label>
                        <input list="uni_names" id="university" name="university" rows="10" class="form-control" ng-model="selected_uni"
                        ng-change="autocomplete_unis(selected_uni)" required>
                        
                        <datalist id="uni_names">
                            <option ng-repeat="match in matching" value="@{{match}}"></option>
                        </datalist>
                    
                    </div>
                    
                    <div class="form-group">
                        <label name="coursename">Course name:</label>
                        <input id="coursename" name="coursename" rows="10" class="form-control"
                        value="{{$my_quiz->coursename}}" required>
                    </div>
                    
                    <div class="form-group">
                        <label name="quizname">Quiz name:</label>
                        <input id="quizname" name="quizname" class="form-control"
                        value="{{$my_quiz->quizname}}" required>
                    </div>
                    
                    <div class="form-group">
                        <label name="quizdescription">Quiz description:</label>
                        <textarea name="quizdescription" rows="3" class="form-control" required>{!!$my_quiz->quizdescription!!}</textarea>
                    </div> 
                    
                    <div class="form-group">
                        <label name="quizresources">Resources:</label>
                        <textarea name="quizresources" rows="3" class="form-control">{{$my_quiz->resources}}</textarea>
                    </div> 
                    
                    
                    @foreach($my_quiz->questions as $index => $question)
                        
                        <hr>
                        
                        <div class="form-group">
                            <label name="question">Question {{$index+1}}:</label>
                            <input id="question" name="question[{{$index}}]" class="form-control"
                            value="{{$question->question}}" required>
                        </div>
                        
                        <div class="form-group">
                            <label name="answer">Correct Answer:</label>
                            <input id="answer1" name="answer1[{{$index}}]" rows="10" class="form-control"
                            value="{{$question->answer1}}" required>
                        </div>
                        
                        <div class="form-group">
                            <label name="answer">Wrong Answer 1:</label>
                            <input id="answer2" name="answer2[{{$index}}]" rows="10" class="form-control"
                            value="{{$question->answer2}}" required>
                        </div>     
                        
                        <div class="form-group">
                            <label name="answer">Wrong Answer 2:</label>
                            <input id="answer3" name="answer3[{{$index}}]" rows="10" class="form-control"
                            value="{{$question->answer3}}" required>
                        </div>
                        
                        <div class="form-group">
                            <label name="answer">Wrong Answer 3:</label>
                            <input id="answer4" name="answer4[{{$index}}]" rows="10" class="form-control"
                            value="{{$question->answer4}}" required>
                        </div>
                    
                    @endforeach
                   
                    <input type="submit" value="Update Quiz" class="btn btn-success btn-lg btn-block">
                    <a class="btn btn-default btn-block btn-lg" href="{{url(URL::previous())}}"> Cancel </a>
                </form>
            </div>    
         </div>
     </div>
 @endsection
 @extends('layouts.app')
 
 @section('title')
     Edit quizzes display
 @endsection
 
 @section('extra_links')
 @endsection
 
 @section('content')
   <div class="container">
    
     <a class="pull-right btn btn-info" href="{{ url('create_quiz') }}"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create another quiz </a>
     <h1>Review this quiz</h1>
     
     <hr>

     
     <div class="panel panel-primary">
         <div class="panel-heading"> <b> Confirmation of quiz information </b> </div>
         <div class="panel-body"> <b> University name: </b>{{ $quiz->university }} </div>
         <div class="panel-body"> <b> Course name: </b>{{ $quiz->coursename }} </div>
         <div class="panel-body"> <b> Quiz name: </b>{{ $quiz->quizname }} </div>
         <div class="panel-body"> <b> Quiz description: </b> {!! $quiz->quizdescription !!} </div>
         <div class="panel-body"> <b> Resources: </b> {{ $quiz->resources }}</div>
     </div>
     <div class="panel panel-primary list-group">
        @foreach ($questions as $i => $q)
             <div class="panel-heading"> <b> Question {{$i+1}} information </b> </div>
             <div class="panel-body"> <b> Question {{$i+1}}  </b> {{ $q->question }}  </div>
             <div class="panel-body list-group-item-success"> <b> Correct answer : </b> {{ $q->answer1  }} </div>
             <div class="panel-body"> <b> Incorrect answer 1 </b> {{ $q->answer2  }}  </div>
             <div class="panel-body"> <b> Incorrect answer 2 </b> {!! $q->answer3 !!} </div>
             <div class="panel-body"> <b> Incorrect answer 3 </b> {!! $q->answer4 !!} </div>
        @endforeach
     </div>
     
     <div>
         <form action="{{ url('editing_quiz') }}" method="POST">
             {{csrf_field()}}
             <input name="quiz_id" type="hidden" value="{{$quiz->id}}">
             <button class="pull-right btn btn-primary"> Edit this quiz </button> 
         </form>
         
         <span class="pull-right"> &nbsp;</span>
    
         <a href="{{ route('take_quiz.show', ['id' => $quiz->id]) }}" class="pull-right btn btn-primary"> Take this quiz </a> 
     
         
     </div>
     
   </div>
 @endsection
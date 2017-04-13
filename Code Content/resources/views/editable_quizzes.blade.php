 @extends('layouts.app')
 
 @section('title')
     Edit quizzes display
 @endsection
 
 @section('extra_links')
 @endsection
 
 @section('content')
   <!--This is for feedback message after editing a quiz -->
    @if (session('status'))
        <div class=" alert alert-success">
            <a class="close" data-dismiss="alert">×</a>
            <strong>Heads Up!</strong> {{ session('status') }}
        </div>
    @endif

    
     <div class="container" >
         
         <a class="pull-right btn btn-info" href="{{ url('create_quiz') }}"> 
             <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
             Create another quiz 
        </a>
        
            <span class="pull-right"> &nbsp; </span>
            
         <a class="pull-right btn btn-info" href="{{ url('/') }}"> 
             <span class="glyphicon glyphicon-search" aria-hidden="true"></span> 
             Search for a quiz 
        </a>
        
            <span class="pull-right"> &nbsp; </span>
        
         <div class="row">
             @if($all_my_quizzes->count() == 0)
                 <div class=""> <h4> <small> No quizzes found for this user </small> </h4> </div>
             @else
                 <div class=""> <h4 class="title text-muted"> My quizzes </h4> </div>
                 <hr>
                 @foreach ($all_my_quizzes as $quiz)
                 <form action="{{ url('editing_quiz') }}" method="POST">
                    {{ csrf_field() }}  <!-- needed for laravel security otherwise nothing works-->
                    <div class="card list-group">
                      <div class="card-block list-group-item">
                          
                        <small class="pull-right text-muted"> {{$quiz->Questions->count()}} Questions</small>
                        <small class="text-muted align-right">  Updated {{ $quiz->updated_at->diffForHumans() }} </small>
                        
                        <h4 class="card-title"> {{$quiz->quizname}}</h4>
                        <h6 class="card-subtitle mb-2">{{$quiz->university}}</h6>
                        <p class="card-text"> Quiz Descrition: {{ $quiz->quizdescription }}</p>
                        
                        <input type="hidden" name="quiz_id" value="{{$quiz->id}}">
                        
                       
                        <button type="submit"  class="btn btn-primary">
                            Edit this quiz
                        </button>
                        
                        <a href="{{ route('take_quiz.show', ['id' => $quiz->id]) }}" class="btn btn-primary"> 
                            Take this quiz
                        </a> 
                        
                        <a class="pull-right btn btn-primary" href="{{ route('questions.index', ['quiz_id' => $quiz->id]) }}"> 
                             <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> 
                             View this quiz 
                        </a>
                        
                      </div>
                    </div>
                 </form>
                 @endforeach
             @endif
         </div>
     </div>
 @endsection
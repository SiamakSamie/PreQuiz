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
                        <h4 class="card-title"> {{$quiz->quizname}}</h4>
                        <h6 class="card-subtitle mb-2 text-muted">{{$quiz->university}}</h6>
                        <p class="card-text"> Quiz Descrition: {{$quiz->quizdescription}}</p>
                        <input type="hidden" name="quiz_id" value="{{$quiz->id}}">
                        <button type="submit"  class="btn btn-primary">Edit this quiz</button>
                      </div>
                    </div>
                 </form>
                 @endforeach
             @endif
         </div>
     </div>
 @endsection
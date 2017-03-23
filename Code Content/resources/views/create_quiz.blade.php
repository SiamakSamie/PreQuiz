@extends('layouts.app')

@section('title')
    Create Quiz
@endsection

@section('extra_links')
@endsection

@section('content')
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="col-sm-8 col-sm-offset-2">
            <h1>Create new quiz</h1>
            <span> <small class="text-muted"> Please note that quizzes with no questions will be permanently deleted after 24 hours of inactivity </small> </span>
            <hr>
            
            <form method="POST" action="{{ route('create_quiz.store') }}">
                
                <div class="form-group">
                    <label name="university">University name:</label>
                    <input id="university" name="university" rows="10" class="form-control">
                </div>
                
                <div class="form-group">
                    <label name="coursename">Course name:</label>
                    <input id="coursename" name="coursename" rows="10" class="form-control">
                </div>
                
                <div class="form-group">
                    <label name="quizname">Quiz name:</label>
                    <input id="quizname" name="quizname" class="form-control">
                </div>
                
                <div class="form-group">
                    <label name="quizdescription">Quiz description:</label>
                    <textarea name="quizdescription" rows="3" class="form-control"> </textarea>
                </div> 
                
                <input type="submit" value="Create Quiz" class="btn btn-success btn-lg btn-block">
                <a href="{{ url('/') }}" class="btn btn-default btn-lg btn-block"> Cancel </a>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>

    

@endsection		

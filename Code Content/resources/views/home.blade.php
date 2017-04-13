@extends('layouts.app')

@section('title')
    Welcome Page
@endsection

@section('extra_links')
    <style> body { height: 120%; } </style>
@endsection

@section('content')

    @if(session('status') == 'Your password has been reset!')
         <div class="alert alert-success">
            <a class="close" data-dismiss="alert">×</a>
            <p> {{ session('status') }} </p>
           
        </div>
    @elseif (session('status'))
        <div class="alert alert-danger">
            
            <a class="close" data-dismiss="alert">×</a>
            <p> {{ session('status') }} </p>
            <p> Please make sure the univeristy name/course name was chosen from the suggested list. </p>
            <p> Would you like to <a href='/create_quiz'> create a quiz?</a> </p>
        </div>
    @endif
    
<!-- parralax image before the search form -->
    <div class="parallax">
        <h1 >BRUSHING UP YOUR BASICS</h1>
        <p>you are very good, but you can be better. If you aren't so good and not sure of your stuff, then you have come to the right place.</p>
    </div>
    
    <div class="flex-center text-center  bg-2" >
        <div class="panel panel-default panel-index start_box" 
         ng-controller="searchForm-controller">
            
            <div class="panel-body">
                <div class="input-title"> <b>Get Started</b></div>
                
                <form id="uni_form" ng-submit="fetchCourses(selected_uni)" class="displayed" autocomplete="off" >
                    <input name="search_unis" class="input-submit" type="submit" value="">
                    
                    <input list="uni_names" name="uni_name" type="text" class="input-field" ng-model="selected_uni" 
                    placeholder="Enter the name of your institution" ng-change="autocomplete_unis(selected_uni)" required> 
                    
                    <datalist id="uni_names">
                        <option ng-repeat="match in matching" value="@{{match}}"></option>
                    </datalist>
                    
                </form> 
                <small ng-bind-html="errorMsg">  </small>
                
               <form  id="course_form" method="POST" action="/search" class="hidden" autocomplete="off">
                    
                    <p id="uni_name_after" ng-click="undoSubmit()" class="input-field extended-input">
                        <span ng-bind="selected_uni"> </span>  &nbsp;
                        <span id="edit_icon" class="glyphicon glyphicon-pencil text-muted" aria-hidden="true"></span> 
                    </p>
                        
                    {{ csrf_field() }}  <!-- needed for laravel security otherwise nothing works-->
                    <div class="form-group">
                        <input class="input-submit" type="submit" value="" name="search">
                        
                        <input name="uni_name" type="hidden" value="@{{selected_uni}}">
                        
                        <input list="course_names" name="course_id" type="text" class=" input-field" ng-model="selected_course" 
                        placeholder="Enter your course name" ng-change="autocomplete_courses(selected_course)" >
                        
                        <datalist id="course_names">
                            <option ng-repeat="match in matching" value="@{{match}}"></option>
                        </datalist>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('extra_script')
    <script>
        $('#uni_name_after').hover(function() {
            $("#edit_icon").toggleClass('text-muted');
        });
    </script>
@endsection

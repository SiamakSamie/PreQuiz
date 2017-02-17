@extends('layouts.app')

@section('title')
    Welcome Page
@endsection

@section('extra_links')
    <script src='/js/preQuiz-module.js'> </script>
    
@endsection

@section('content')

<!-- @{{ }} is angularJS -->
<!-- {{ }} is blade -->

    <div class="flex-center text-center">
        <div class="panel panel-default panel-index" 
         ng-controller="searchForm-controller as sfc">
            
            <div class="panel-body">
                <div class="input-title"> PreQuiz </div>
                
                <!-- Display User Input after first submition -->
                <input class="input-field @{{sfc.display}} extended-input" value="@{{sfc.user_input}}" 
                maxlength="255" readonly style="text-align:center;">
                
                <form ng-submit="sfc.submitform()" onsubmit="return false;"  
                id="form" method="POST" action="/search">

                    <span ng-repeat="placeholder in sfc.placeholders">
                        {{ csrf_field() }}  <!-- needed for laravel security otherwise nothing works-->
                        
                        <input class="input-submit" id="@{{placeholder.id}}" type="submit" value="">
                        
                        <input class="input-field" name="course_id" type="text" 
                        placeholder="@{{placeholder.text}}"  ng-model="sfc.text"
                         required="required" autofocus="autofocus"> <!-- Course # input -->
                         
                        <input class="input-field" name="uni_name" type="hidden" 
                        value="@{{sfc.user_input}}">   <!-- University input -->
                    </span>
                </form>
            </div>
        </div>
    </div>

@endsection


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

<!-- parralax image before the search form -->
    <div class="parallax">
        <h1 >BRUSHING UP YOUR BASICS</h1>
        <p>you are very good, but you can be better. If you aren't so good and not sure of your stuff, then you have come to the right place.</p>
    </div>
    
    <div class="flex-center text-center" style="background-color: #f5f8fa">
        <div class="panel panel-default panel-index" 
         ng-controller="searchForm-controller as sfc">
            
            <div class="panel-body">
                <div class="input-title"> Get Started </div>
                
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
                         required="required"> <!-- Course # input -->
                         
                        <input class="input-field" name="uni_name" type="hidden" 
                        value="@{{sfc.user_input}}">   <!-- University input -->
                    </span>
                </form>
            </div>
        </div>
    </div>
    
    <!--<footer class="footer">-->
    <!--  <div class="container">-->
    <!--    <p>Place sticky footer content here.</p>-->
    <!--    <p>Place sticky footer content here.</p>-->
    <!--    <p>Place sticky footer content here.</p>-->
    <!--    <p>Place sticky footer content here.</p>-->
    <!--  </div>-->
    <!--</footer>-->
@endsection


@extends('layouts.app')

@section('title')
    Welcome Page
@endsection

@section('extra_links')
        <script src='/js/search-form.js'> </script>
@endsection

@section('content')

<!-- @{{ }} is angularJS -->
<!-- {{ }} is blade -->

    <div class="parallax">
        <h1 >BRUSHING UP YOUR BASICS</h1>
        <p>you are very good, but you can be better. If you aren't so good and not sure of your stuff, then you have come to the right place.</p>
    </div>
<div class="flex-center position-ref full-height container">
 

        <div class="panel panel-default panel-index " ng-app="search-form"
         ng-controller="search-formController as sfc" ng-cloak >
            
            
            <div class="panel-body">
                <div class="input-title" style="text-align:center;"><b> Get Started</b> </div>
                
                <!-- Display User Input after first submition -->
                <div class="input-field @{{sfc.display}} extended-input" maxlength="255">
                    @{{sfc.user_input}} 
                 </div> 
                
                <form ng-submit="sfc.submitform()" onsubmit="return false;" 
                id="form" method="POST" action="/search">

                    <span ng-repeat="placeholder in sfc.placeholders">
                        {{ csrf_field() }}  <!-- needed for laravel security otherwise nothing works-->
                        
                        <input class="input-submit" id="@{{placeholder.id}}" type="submit" value="">
                        
                        <!-- Course # input -->
                        <input class="input-field" name="course_id" type="text" 
                        placeholder="@{{placeholder.text}}"  ng-model="sfc.text"
                         required="required" autofocus="autofocus"> 
                         
                          <!-- University input -->
                        <input class="input-field" name="uni_name" type="hidden" 
                        value="@{{sfc.user_input}}">  
                    </span>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


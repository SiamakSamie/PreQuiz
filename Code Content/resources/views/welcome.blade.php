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
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            <div class="panel panel-default panel-index" ng-app="search-form"
             ng-controller="search-formController as sfc" ng-cloak>
                <div class="panel-body">

                    <div class="input-title"> PreQuiz </div>
                    <div class="input-field @{{sfc.display}} extended-input" maxlength="255">
                        @{{sfc.user_input[0].text}} 
                    </div> 
                    <!-- Display User Input after first submition -->

                    <form ng-submit="sfc.submitform()" onsubmit="return false;" 
                    id="form" method="POST" action="/search">

                        <span ng-repeat="placeholder in sfc.placeholders">
                            {{ csrf_field() }}  <!-- needed for laravel security otherwise nothing works-->

                            <input class="input-submit" id="@{{placeholder.id}}" type="submit" value="">

                            <input class="input-field" name="course_id" type="text" 
                            placeholder="@{{placeholder.text}}"  ng-model="sfc.text"
                             required="required" autofocus="autofocus"> <!-- Course # input -->

                            <input class="input-field" name="uni_name" type="hidden" 
                            value="@{{sfc.user_input[0].text}}">   <!-- University input -->
                        </span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


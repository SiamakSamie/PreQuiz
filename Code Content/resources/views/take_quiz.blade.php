@extends('layouts.app')

@section('title')
    Create Quiz
@endsection

@section('extra_links')
<link href="/css/dialog.css" rel="stylesheet" type="text/css">
@endsection

@section('content')


<div class="row">
   <div class="container">
     <form action="{{ url('/search') }}" method="POST"  > 
        <button type="submit" class="pull-right btn btn-info">
              <span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span>
              Go back to quiz results 
              
              {{ csrf_field() }}
              <input name="uni_name" type="hidden" value="{{$quiz->university}}">
              <input name="course_id" type="hidden" value="{{$quiz->coursename }}">
        </button>
    </form>
  </div>
    <div class="col-md-8 col-md-offset-2">
      
      <h1 class="md-display-2">{{$quiz->quizname}}</h1>

      <md-content ng-controller="validate-answer" ng-init="getAllQuestions({{$quiz->id}})">
        <md-tabs md-dynamic-height="" md-border-bottom="" md-selected="selectedIndex">
            <md-tab ng-repeat="(key, input) in data" label="Question @{{$index+1}}">
              <md-content class="md-padding">
                <h1 class="md-display-1" ng-bind="input.question"> </h1>
                <md-radio-group ng-disabled="isValid[$index]==true" flex ng-model="radio_group">
                    <md-radio-button ng-class="{'bg-success':answer[$index].answer1}"name="answer1" value="1" aria-label="@{{$index}}"> <span ng-bind="input.answer1"> </span> </md-radio-button>
                    <md-radio-button ng-class="{'bg-danger':answer[$index].answer2}" name="answer2"  value="2" aria-label="@{{$index}}"> <span ng-bind="input.answer2"> </span> </md-radio-button>
                    <md-radio-button ng-class="{'bg-danger':answer[$index].answer3}" name="answer3"  value="3" aria-label="@{{$index}}"> <span ng-bind="input.answer3"> </span> </md-radio-button>
                    <md-radio-button ng-class="{'bg-danger':answer[$index].answer4}" name="answer4"  value="4" aria-label="@{{$index}}"> <span ng-bind="input.answer4"> </span> </md-radio-button>
                </md-radio-group>
                <md-button ng-click="validation(radio_group, key);nextTab();enableDisableButton=true" ng-disabled="enableDisableButton"  ng-show="!$last" class="md-raised md-primary btn-block">Check Answer</md-button>
                <md-button ng-click="doneMessage=true;validation(radio_group, key);openDialog('{{$quiz->resources}}','{{$quiz->id}}', '{{isset(Auth::user()->id) ? 'true' : 'Profile'}}');showme=true" ng-disabled="isValid[$index]==true" ng-show="$last" class="md-raised md-primary btn-block">Finalize Answer</md-button>
                @if (Auth::guest())
                <h2 ng-show="doneMessage">If you make an account, you can save and review your quiz scores in your profile page!</h2>
                @else
                <h2 ng-show="doneMessage">You can review your score in your <a href="/profile/{{Auth::user()->id}}">profile<a></h2>
                @endif
              </md-content>
            </md-tab> 
        </md-tabs>
      </md-content>
    </div>
</div>
<!--
Copyright 2016 Google Inc. All Rights Reserved. 
Use of this source code is governed by an MIT-style license that can be foundin the LICENSE file at http://material.angularjs.org/HEAD/license.
-->
    

@endsection		

 

  


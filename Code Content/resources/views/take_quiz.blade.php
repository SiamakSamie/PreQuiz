@extends('layouts.app')

@section('title')
    Create Quiz
@endsection

@section('extra_links')
<link href="/css/dialog.css" rel="stylesheet" type="text/css">
@endsection

@section('content')


<div class="row">
    <div class="col-md-8 col-md-offset-2">
    
      <h1 class="md-display-2">{{$quiz->quizname}}</h1>
    
      <md-content ng-controller="validate-answer" ng-init="getAllQuestions({{$quiz->id}})">
        <md-tabs md-dynamic-height="" md-border-bottom="">
            <md-tab ng-repeat="input in data" label="Question @{{$index+1}}">
              <md-content class="md-padding">
                <h1 class="md-display-1" ng-bind="input.question"> </h1>
                <md-radio-group ng-disabled="isValid==true" flex ng-model="radio_group">
                    <md-radio-button ng-class="{'bg-success':answer.answer1}"name="answer1" value="1" aria-label="@{{$index}}"> <span ng-bind="input.answer1"> </span> </md-radio-button>
                    <md-radio-button ng-class="{'bg-danger':answer.answer2}" name="answer2"  value="2" aria-label="@{{$index}}"> <span ng-bind="input.answer2"> </span> </md-radio-button>
                    <md-radio-button ng-class="{'bg-danger':answer.answer3}" name="answer3"  value="3" aria-label="@{{$index}}"> <span ng-bind="input.answer3"> </span> </md-radio-button>
                    <md-radio-button ng-class="{'bg-danger':answer.answer4}" name="answer4"  value="4" aria-label="@{{$index}}"> <span ng-bind="input.answer4"> </span> </md-radio-button>
                    <!--<span ng-bind="answers"></span>-->
                </md-radio-group>
                <md-button ng-click="validation(radio_group)" ng-show="!$last" class="md-raised md-primary btn-block">Check Answer</md-button>
                <md-button ng-click="validation(radio_group);openDialog('{{$quiz->resources}}')" ng-show="$last" class="md-raised md-primary btn-block">Finalize Answer</md-button>

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

 

  


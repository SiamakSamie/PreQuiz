@extends('layouts.app')

@section('title')
    Create Quiz
@endsection

@section('extra_links')
@endsection

@section('content')


<div class="row">
    <div class="col-md-8 col-md-offset-2">
    
      <h1 class="md-display-2">Dummy Quiz</h1>
    
      <md-content>
        <md-tabs md-dynamic-height="" md-border-bottom="">
          <div ng-controller="validate-answer">
            
            <md-tab ng-repeat="input in data" label="Question @{{$index+1}}">
              <md-content class="md-padding">
                <h1 class="md-display-1">How much wood could a wood chuck chuck if a wood could chuck wood?</h1>
                <md-radio-group ng-disabled="isValid==true" flex ng-model="input.}">
                    <md-radio-button ng-class="{'bg-success':answer.answer1}" name="answer1" value="1">about all of it</md-radio-button>
                    <md-radio-button ng-class="{'bg-danger':answer.answer2}" name="answer2"  value="2">What's a woodchuck? A beaver? </md-radio-button>
                    <md-radio-button ng-class="{'bg-danger':answer.answer3}" name="answer3"  value="3">depends on the time of the year</md-radio-button>
                    <md-radio-button ng-class="{'bg-danger':answer.answer4}" name="answer4"  value="4">14.5</md-radio-button>
                    <!--<span ng-bind="answers"></span>-->
                </md-radio-group>
                <md-button ng-click="validation(answers@{{$index}})" class="md-raised md-primary btn-block">Check Answer</md-button>
              </md-content>
            </md-tab> 
            
          </div>  <!-- end validate-answer controller -->
        </md-tabs>
      </md-content>
    </div>
</div>

<!--
Copyright 2016 Google Inc. All Rights Reserved. 
Use of this source code is governed by an MIT-style license that can be foundin the LICENSE file at http://material.angularjs.org/HEAD/license.
-->
    

@endsection		

 

  


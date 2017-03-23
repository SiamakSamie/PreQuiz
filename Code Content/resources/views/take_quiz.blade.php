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
          <md-tab label="Question 1">
            <md-content class="md-padding">
              <h1 class="md-display-1">How much wood could a wood chuck chuck if a wood could chuck wood?</h1>
              <md-radio-group flex>
                  <md-radio-button value='1'>about all of it</md-radio-button>
                  <md-radio-button value='2'>What's a woodchuck? A beaver? </md-radio-button>
                  <md-radio-button value='3'>depends on the time of the year</md-radio-button>
                  <md-radio-button value='4'>14.5</md-radio-button>
              </md-radio-group>
              
              <md-button class="md-raised md-primary btn-block">Check Answer</md-button>
            </md-content>
          </md-tab>
          <md-tab label="Question 2">
            <md-content class="md-padding">
              <h1 class="md-display-1">How much wood could a wood chuck chuck if a wood could chuck wood?</h1>
              <md-radio-group flex>
                  <md-radio-button value='1' class="bg-danger" disabled>about all of it</md-radio-button>
                  <md-radio-button value='2'disabled>What's a woodchuck? A beaver? </md-radio-button>
                  <md-radio-button value='3'disabled>depends on the time of the year</md-radio-button>
                  <md-radio-button value='4' class="bg-success"disabled>14.5</md-radio-button>
              </md-radio-group>
              <md-button class="md-raised md-primary btn-block">Check Answer</md-button>
            </md-content>
          </md-tab>
          <md-tab label="Question 3">
            <md-content class="md-padding">
              <h1 class="md-display-1">How much wood could a wood chuck chuck if a wood could chuck wood?</h1>
              <md-radio-group flex>
                  <md-radio-button value='1'>about all of it</md-radio-button>
                  <md-radio-button value='2'>What's a woodchuck? A beaver? </md-radio-button>
                  <md-radio-button value='3'>depends on the time of the year</md-radio-button>
                  <md-radio-button value='4'>14.5</md-radio-button>
              </md-radio-group>
              <md-button class="md-raised md-primary btn-block">Check Answer</md-button>
            </md-content>
          </md-tab>
          <md-tab label="Question 4">
            <md-content class="md-padding">
              <h1 class="md-display-1">How much wood could a wood chuck chuck if a wood could chuck wood?</h1>
              <md-radio-group flex>
                  <md-radio-button value='1'>about all of it</md-radio-button>
                  <md-radio-button value='2'>What's a woodchuck? A beaver? </md-radio-button>
                  <md-radio-button value='3'>depends on the time of the year</md-radio-button>
                  <md-radio-button value='4'>14.5</md-radio-button>
              </md-radio-group>
              <md-button class="md-raised md-primary btn-block">Check Answer</md-button>
            </md-content>
          </md-tab>              
          <md-tab label="Question 5">
            <md-content class="md-padding">
              <h1 class="md-display-1">How much wood could a wood chuck chuck if a wood could chuck wood?</h1>
              <md-radio-group flex>
                  <md-radio-button value='1'>about all of it</md-radio-button>
                  <md-radio-button value='2'>What's a woodchuck? A beaver? </md-radio-button>
                  <md-radio-button value='3'>depends on the time of the year</md-radio-button>
                  <md-radio-button value='4'>14.5</md-radio-button>
              </md-radio-group>
              <md-button class="md-raised md-primary btn-block">Check Answer</md-button>
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

 

  


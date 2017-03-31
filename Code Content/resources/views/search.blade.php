@extends('layouts.app')

@section('extra_links')
	<link rel="stylesheet" href="/css/comments.css" type="text/css" />
@endsection

@section('content')
<div class="container">
	<!-- this is to refresh the page when the back button is pressed -->
	<input type="hidden" id="refresh" value="no">
	
	<p class="text-left">
		From <b>{{$uni_name}}</b> searching for class <b>{{$course_name}} </b> <br />
		{{$db_corr_data->count()}} entrie(s) found
		<small> 
			<a class="pull-right btn btn-info btn-sm" href="{{ url('/')  }}">  
				<span class="glyphicon glyphicon-search" aria-hidden="true"></span>  
				Search for another quiz 
			</a> 
		</small> 
	</p>
	<hr >
	
	@include('quiz_list')
	
	<div class="panel panel-primary">
       <div class="panel-heading">Comment section</div>
       <div class="panel-body" ng-controller="mention-feature"> 
       	   
	   	  <ul class="commentList" id="commentList" ng-model="commentList"  ng-change="scrollToBot(commentList)">
	   		  @include('comment_list')
		  </ul>
	   	   
 	  	  <form id="comment_form" method='POST' ng-submit="commentRequest('{{ $course_name }}', '{{ Auth::user()->id }}', '{{$uni_name}}')"> <!-- onSubmit='return AjaxCommentRequest() -->
 	  	  	{{ csrf_field() }}  <!-- needed for laravel security otherwise nothing works-->
 	  	  	<div class="row" >
 	  	  		@if (Auth::guest())
	 		  	  	<div class="col-md-12"> <textarea id="comment_text" class="form-control" form="comment_form" rows="3" 
	 		  	  	placeholder="Please log in in order to leave a comment" ng-model="comment_text" disabled></textarea> </div>
	 		  	  	
	 		  	  	<div class="col-md-12"> <input type="submit" class="btn btn-primary btn-sm pull-right text-center " 
	 		  	  	value="Post comment" disabled> </div>
	 		  	  	
 		  	  	@else
 		  	  		<div class="col-md-12"> <textarea id="comment_text" class="form-control" form="comment_form" 
 		  	  		rows="3" placeholder="Enter a comment ..." ng-model="comment_text" 
 		  	  		ng-change="mention(comment_text)" ng-keyup="onKeyUp($event)" ng-trim="false" required> </textarea> </div>
 		  	  		
 		  	  		<input type="hidden" ng-repeat="user_id in user_mentioned_id" class="mentioned_users_id" 
 		  	  		name="mentioned_users_id[@{{$index}}]" value="@{{ user_id }}">
 		  	  		
 		  	  		<div class="col-md-12"> <input type="submit"  class="btn btn-primary btn-sm pull-right text-center " 
 		  	  		value="Post comment"> </div>
 		  	  		
 	  	  			<ul id="mention_list" class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
					  <li ng-repeat="result in results" id="user_@{{$index}}">
 		  	  				<a ng-click="addMentioned(result)">
 		  	  					<img class="pull-left" src="img/profile_pic.jpg">
 		  	  					
 		  	  					<span> 
 		  	  						<span ng-bind="result.name"> </span> <br />
 	  	  							<small ng-bind="result.email"></small>
 		  	  					</span>
 		  	  				</a>
 		  	  		  </li>
	 	  	  		  <li class="list-group-item " ng-show="!results.length">
	 	  	  				No users where found by that name
	 	  	  		  </li> 
					</ul>
 		  	  	@endif
 	  	  	</div>
 	  	  </form>
       </div>
     </div>
</div>	 	
@endsection	

@section('extra_script')
	<script src="/js/refresh-onback.js"> </script>
	
	<script>
	// disable scrolling with up / down arrows since we need them for other stuff
	// and it will be confusing if the screen is going up and down meanwhile
		window.addEventListener("keydown", function(e) {
		    // space and arrow keys
		    if([38, 40].indexOf(e.keyCode) > -1) {
		        e.preventDefault();
		    }
		}, false);
	</script>
@endsection

 

  


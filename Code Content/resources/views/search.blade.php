@extends('layouts.app')

@section('extra_links')
	<link rel="stylesheet" href="/css/comments.css" type="text/css" />
@endsection

@section('content')

<div class="container">
	<p>
		From <b>{{$uni_name}}</b> searching for class <b>{{$course_name}} </b> <br /> <!-- $course_id is actually course name ... oops -->
		{{$db_corr_data->count()}} entrie(s) found
	</p>
	
	<div class="row">	
		@foreach ($db_corr_data as $entry)
			<div class="col-md-3 column">
				<div class="panel panel-default">
					
					<div class="panel-heading">
						<div class="panel-title"> {{$entry->course_name}} </div>
						<small> Last updated x mins ago</small>
					</div>
					
					<div class="panel-body collapse in"> 
						<div class="row clearfix">
							<div class="col-md-12">
								<p> {{$entry->quiz_name}}. </p>
								<p> Description : <br /> {{$entry->quiz_description}}</p>
								<p class="card-text"> by {{$entry->quiz_creator}}. </p>
								<a href="#" class="btn btn-primary center-block">Take this quiz</a>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			
		@endforeach
		
		<ul class="pagination pagination-sm col-md-12 flex-center" style="display: flex; ">
			<li class="active"><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">5</a></li>
		</ul>
	</div>
	<div class="panel panel-primary">
       <div class="panel-heading">Comment section</div>
       <div class="panel-body"  ng-controller="sidenav-controller" > 
      
 		  <ul class="commentList" id="commentList">
 		  	@foreach($db_corr_first->Comments as $comm)
 			<li class="row">
                 <div class="col-md-2 commenterName">
 					<small> {{ $comm->User->name }} </small>
 				</div>
                 <div class="col-md-7 commentText">
                     <p class=""> {{$comm->comment_content}}</p> <span class="date sub-text"> {{$comm->updated_at->toDayDateTimeString()}}</span>
                 </div>
                 <div class="col-md-3 pull-right">
                 	<button class="btn btn-success"> <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> <small> +456</small></button>
                 	<button class="btn btn-danger"> <span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span> <small> -35</small></button>
                 </div>
             </li>
           @endforeach
 	  	  </ul>
 	  	  <form id="comment_form" method='POST' onSubmit='return AjaxCommentRequest()'>
 	  	  	
 	  	  	{{ csrf_field() }}  <!-- needed for laravel security otherwise nothing works-->
 	  	  	
 	  	  	<div class="row" >
 	  	  		@if (Auth::guest())
	 		  	  	<div class="col-md-12"> <textarea id="comment_text" class="form-control" form="comment_form" rows="3" placeholder="Please log in in order to leave a comment" disabled></textarea> </div>
	 		  	  	<div class="col-md-12"> <input type="submit" class="btn btn-primary btn-sm pull-right text-center " value="Post comment" disabled> </div>
 		  	  	@else
 		  	  		<div class="col-md-12"> <textarea id="comment_text" class="form-control" form="comment_form" rows="3" placeholder="Enter a comment ..."  required></textarea> </div>
 		  	  		<div class="col-md-12"> <input type="submit" class="btn btn-primary btn-sm pull-right text-center " value="Post comment"> </div>
 		  	  		
 		  	  		<script>
						function AjaxCommentRequest() {
							$.ajax ({
								url: '/addComment',
								type: 'POST',
								data: {"_token": "{{ csrf_token() }}",
									   "course_name": "{{ $course_name }}",
									   "user_id" : "{{ Auth::user()->id }}",
									   "text": $('#comment_text').val(),
									   "uni_name": "{{$uni_name}}",
								},
							
								success: function(response) {
									$("#commentList").append("" +
							 			"<li class='row'>" +
							                 "<div class='col-md-2 commenterName'>" +
							 					"<small> {{ Auth::user()->name }} </small>" +
							 				"</div>"+
							                 "<div class='col-md-7 commentText'>"+
							                     "<p class=''> "+response.text+"</p> <span class='date sub-text'> Just now </span>"+
							                 "</div>"+
							                 "<div class='col-md-3 pull-right'>"+
							                 	"<button class='btn btn-success'> <span class='glyphicon glyphicon-thumbs-up' aria-hidden='true'></span> <small> 0</small></button>"+
							                 	"<button class='btn btn-danger'> <span class='glyphicon glyphicon-thumbs-down' aria-hidden='true'></span> <small> 0</small></button>"+
							                 "</div>"+
							             "</li>"+
									"");
									
									$("#comment_text").val('');
									
									$("#commentList").scrollTop = $("#commentList").scrollHeight;
									
								},
								error: function(response) {
									alert('Error'+response);
								}
							});
						}
				  	</script>
 		  	  	@endif
 		  	  
 	  	  	</div>
 	  	  </form>
       </div>
     </div>
</div>	 	



@endsection		

 

  


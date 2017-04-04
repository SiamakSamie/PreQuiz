@foreach($db_corr_first->Comments as $comm)
 <li id="{{$comm->id}}" class="row">
      <div class="col-lg-2 commenterName">
 	 	  <small> <a href="{{ URL::to('profile/' . $comm->User->id) }}"> {{ $comm->User->name }} </a> </small>
       </div>
     	
      <div class="col-lg-7">
          <p>{!!$comm->comment_content!!} </p> <span class="date sub-text"> Posted {{$comm->created_at->diffForHumans()}}</span>
      </div>
      <div class="col-lg-3 pull-right">
       
     @if (Auth::check())
   		<form ng-Submit="upVoteComment({{ $comm->id }}, {{Auth::user()->id}})" style="display: inline;">
   		 	<input type="hidden" id="comment_id{{$comm->id}}" value="{{ $comm->id }}" >
          	<button class="btn btn-success" type="submit">
          		<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> 
          		<small id="up_votes{{$comm->id}}"> + {{$comm->up_votes}}</small>
          	</button>
      	</form>
   		@else
   		<form style="display: inline;">
      		<input type="hidden" id="comment_id{{$comm->id}}" value="{{ $comm->id }}" >
          	<button class="btn btn-success disabled" type="submit">
          		<span class="glyphicon glyphicon-thumbs-up " aria-hidden="true"></span> 
          		<small id="up_votes{{$comm->id}}"> + {{$comm->up_votes}}</small>
          	</button>
      	</form>
     @endif
      	
     @if (Auth::check()) 	
      	<form ng-Submit="downVoteComment({{ $comm->id }}, {{Auth::user()->id}})" style="display: inline;">
      		<input type="hidden" id="comment_id{{$comm->id}}" value="{{ $comm->id }}" >
          	<button class="btn btn-danger" type="submit">
          		<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> 
          		<small id="down_votes{{$comm->id}}"> - {{$comm->down_votes}}</small>
          	</button>
      	</form>
     @else
       <form style="display: inline;">
      		<input type="hidden" id="comment_id{{$comm->id}}" value="{{ $comm->id }}" >
          	<button class="btn btn-danger disabled" type="submit">
          		<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> 
          		<small id="down_votes{{$comm->id}}"> - {{$comm->down_votes}}</small>
          	</button>
      	</form>
     @endif
     
     @if (Auth::check())
      	<button class="btn btn-info" ng-click="replyBtnMention('{{$comm->User->name}}', '{{$comm->User->id}}')">
      		<span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> 
      		<small> Reply</small> 
      	</button>
    @else
       <button class="btn btn-info disabled">
      		<span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> 
      		<small> Reply</small> 
      	</button>
    @endif
      	
      </div>
  </li>
@endforeach
 
 <li class="row" ng-repeat="comment in new_comments">
     <div class="col-lg-2 commenterName">
         <small> <a href="../profile/@{{comment.last_comment.user_id}}"> <span ng-bind="comment.commentator.name"></span> </a> </small>
     </div>
     
     <div class="col-lg-7 commentText">
          <p ng-bind-html="comment.last_comment.comment_content"> </p> <span class="date sub-text"> Just now</span>
     </div>
     
     <div class="col-lg-3 pull-right">
         
         <form ng-Submit="upVoteComment(comment.last_comment.id, comment.last_comment.user_id)" style="display: inline;">
      		<input type="hidden" id="comment_id@{{comment.last_comment.id}}" value="@{{comment.last_comment.id}}" >
          	<button class="btn btn-success" type="submit">
          		<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> 
          		<small id="up_votes@{{comment.last_comment.id}}"> + <span ng-bind="comment.last_comment.up_votes"> </span></small>
          	</button>
      	</form>
      	
      	<form ng-Submit="downVoteComment(comment.last_comment.id, comment.last_comment.user_id)" style="display: inline;">
      		<input type="hidden" id="comment_id@{{comment.last_comment.id}}" value="@{{comment.last_comment.id}}" >
          	<button class="btn btn-danger" type="submit">
          		<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> 
          		<small id="down_votes@{{comment.last_comment.id}}"> - <span ng-bind="comment.last_comment.down_votes"></small>
          	</button>
      	</form>
      	
      	<button class="btn btn-info" ng-click="replyBtnMention(comment.commentator.name, comment.last_comment.user_id)">
      		<span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> 
      		<small> Reply</small> 
      	</button>
      	
     </div> 
 </li>
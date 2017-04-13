@extends('layouts.app')
 
 @section('title')
     Notifications
 @endsection
 
 @section('extra_links')

 @endsection
 
 @section('content')
   <div class="container panel panel-default">
     <h1>Notifications</h1>
    	<div class="notifications list-group">

      @foreach($notifs as $notif)	 
      	 <form method="POST" action="/search">
      	  
      	   {{ csrf_field() }}
      	   <input type="hidden" name="uni_name" value="{{$notif->Quiz->university}}"/>
      	   <input type="hidden" name="course_id" value="{{$notif->Quiz->coursename}}" />
      	   <input type="hidden" name="scroll_to" value="{{$notif->comment_id}}" />
      	   
          <button type="submit" class="notification-left list-group-item list-group-item-action">
             <div class="notifications-wrapper">
                  <a class="content" href="#">
                   <div class="media-body">
                      <strong class="notification-title">
                         <a href="{{url('/profile',['id' => $notif->from_user_id])}}">{{$notif->From_User->name}}</a> 
                         commented on {{$notif->Quiz->coursename}}
                      </strong>
                      <p class="notification-desc col-md-11-offset-md-1"> {!! $notif->message !!}</p>
   
                      <div class="notification-meta">
                         <small class="timestamp">{{$notif->created_at->diffForHumans()}}</small>
                      </div>
                    </div>
                  </a>
              </div>
            </button>
         </form>  
       @endforeach
     </div>
   </div>
<hr>
    	 @if ($notifs->count() == 0)
    	    <div class="container"> No notifications for this user</div>
    	 @endif
    	 
 @endsection
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
      	 <form method="POST" action="#">
          <button type="submit" class="notification-left list-group-item list-group-item-action">
             <div class="notifications-wrapper">
                  <a class="content" href="#">
                   <div class="media-body">
                      <strong class="notification-title"><a href="#">{{$notif->from_user_id}}</a> commented on <a href="#">{{$notif->quiz_id}}</a></strong>
                      <p class="notification-desc"> {{ $notif->message }}</p>
   
                      <div class="notification-meta">
                         <small class="timestamp">{{$notif->created_at->toDayDateTimeString()}}</small>
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
 @endsection
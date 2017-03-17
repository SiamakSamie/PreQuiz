@extends('layouts.app')
 
 @section('title')
     Profile page
 @endsection
 
 @section('extra_links')
 @endsection
 
 @section('content')
   <div class="container" style = "padding-top:50px">
    <h1>Profile information</h1>
  	<hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="/img/profile_pic.jpg" class="avatar img-circle" alt="avatar">
          <h6>Default profile picture</h6>
          
        </div>
      </div>
      
      <!-- profile information -->
      <div class="col-md-9 personal-info">
       
        <h3><b>Personal info</b></h3>
        @if ($user_info->count() == 0) 
           <h2> Not a user </h2>
        @else
           @foreach ( $user_info as $info )
          <form class="form-horizontal" role="form" action = "/EditProfile" method ="POST">
            {{ csrf_field() }}
            
            <div class="form-group">
              <label class="col-lg-3 control-label">Name:</label>
              <p> {{ $info->name }}</p>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">University:</label>
              <p>{{ $info->university }}</p>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Email:</label>
              <p>{{ $info->email }}</p>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Password:</label>
              <p>************</p>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label"></label>
              <div class="col-md-8">
                <input type="submit" class="btn btn-primary"  value="Edit Profile">
              </div>
            </div>
          </form>
          @endforeach
        @endif
      </div>
  </div>
</div>
<hr>
 @endsection
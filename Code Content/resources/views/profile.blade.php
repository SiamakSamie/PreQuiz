@extends('layouts.app')
 
 @section('title')
     Profile page
 @endsection
 
 @section('extra_links')
 @endsection
 
 @section('content')
 
     @if (session('status'))
        <div class="alert alert-success">
            <a class="close" data-dismiss="alert">×</a>
            <p> <b> Success! </b>{{ session('status') }} </p>
        </div>
    @endif
    
   <div class="container" style = "padding-top:50px">
      <h1>Profile information</h1>
  	  <hr>
	    <div class="row">
          <!-- left column -->
          <div class="col-sm-3">
            <div class="text-center">
              <img src="/img/profile_pic.jpg" class="avatar img-circle" alt="avatar">
              <h6>Default profile picture</h6>
            </div>
          </div>
      
          <!-- profile information -->
          <div class="col-sm-9 personal-info">
       
              <h3><b>Personal info</b></h3>
              @if (count($user_info) == 0) 
                 <h2> Not a user </h2>
              @else
           
                <form class="form-horizontal" role="form" action = "/edit_profile" method ="POST">
                  {{ csrf_field() }}
                  
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Name:</label>
                    <p> {{ $user_info->name }}</p>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">University:</label>
                    <p>{{ $user_info->university }}</p>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Email:</label>
                    <p>{{ $user_info->email }}</p>
                  </div>
                  
                  @if ( Auth::user()->id == $user_info->id || $user_info->id == 0)
                    <div class="form-group">
                      <label class="col-sm-3 control-label"></label>
                        <input name='Edit Profile' type="submit" class="btn btn-primary"  value="Edit Profile">
                    </div>
                  @endif
                  
                </form>
            
              @endif
          </div>
      </div>
      @include('score_list')
    </div>
    <hr>
 @endsection
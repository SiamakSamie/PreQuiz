 @extends('layouts.app')
 
 @section('title')
     Profile page
 @endsection
 
 @section('extra_links')
 @endsection
 
 @section('content')
    <div class="container">
        <h1>Edit Profile</h1>
      	<hr>
    	<div class="row">
          <!-- left column -->
          <div class="col-md-3">
            <div class="text-center">
              <img src="/img/profile_pic.jpg">
              <h6>It is the default profile picture. You cannot change it.</h6>
              
            </div>
          </div>
        
          <!-- edit form column -->
          <div class="col-md-9 personal-info">
            <h3>Personal info</h3>
            
            <form class="form-horizontal" role="form" method="POST" action ="/updateProfileInfo">
               {{ csrf_field() }} 
              <div class="form-group">
                <label class="col-lg-3 control-label">Name:</label>
                <div class="col-lg-8">
                  <input class="form-control" type="text" value="{{$user->name}}" name = "name">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">University:</label>
                <div class="col-lg-8">
                  <input class="form-control" type="text" value="{{$user->university}}" name="university">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">Email:</label>
                <div class="col-lg-8">
    
                  <input class="form-control" type="text" value="{{$user->email}}" name= "email" >
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-8">
                  <input name='Save Changes' type="submit" class="btn btn-primary" value="Save Changes">
                  <span></span>
                  <a class="btn btn-default"  href="{{ url(URL::previous()) }}" >Cancel</a>
                </div>
              </div>
            </form>
          </div>
      </div>
    </div>
@endsection 
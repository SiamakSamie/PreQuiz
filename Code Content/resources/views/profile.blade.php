@extends('layouts.app')
 
 @section('title')
     Profile page
 @endsection
 
 @section('extra_links')
 
 @endsection
 
 @section('content')
     
   <div class = "round-corner ">
         <div class = "header">
         <h1 class="text-left" style = "padding:50px 0 20px 60px;">
             <b>Profile Information</b>
         </h1>
         </div>
     @foreach ( $user_info as $info )
     <div class="container flex-center">
          <table class = "no-border table-responsive"> 
            
                <tr>
                    <th> <b>Name:  </b></th>
                    <td>  {{ $info->name }} </td>
                     
                   
                </tr>
                <tr>
                  <th> <b>Email: </b></th>
                  <td>  {{ $info->email }}  <button type="button" class="btn btn-info btn-round" style = "margin-left:50px;"> Edit
     </button></td>
                  
              </tr>
                <tr>
                    <th><b>Password: </b></th>
                    <td>************ <button type="button" class="btn btn-info btn-round" style = "margin-left:50px;"> Edit
     </button></td>
                </tr>
             
          </table>
      </div>
      @endforeach
      
      </div>
 @endsection
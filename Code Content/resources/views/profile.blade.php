@extends('layouts.app')
 
 @section('title')
     Profile page
 @endsection
 
 @section('extra_links')
 
 @endsection
 
 @section('content')
     
     <div class = "page-header">
         
         <h1 class="text-center">
             Profile page information
         </h1>
         
     </div>
     @foreach ( $user_info as $info )
     <div class="container flex-center">
          <table class="table table-bordered ">
              <thead>
                  <tr>
                      <th>
                         University
                      </th>
                      <th>
                          Name
                      </th>
                      <th>
                          Email
                      </th>
                  </tr>
              </thead>
              <tbody>
              <tr>
                  <td>  {{ $info->university }} </td>
                  <td>  {{ $info->name }} </td>
                  <td>  {{ $info->email }} </td>
                  
              </tr>
              <tr>
                  <td>  {{ $info->university }} </td>
                  <td>  {{ $info->name }} </td>
                  <td>  {{ $info->email }} </td>
              </tr>
              <tr>
                  <td> {{ $info->email }} </td>
                  <td> {{ $info->university }} </td>
                  <td> {{ $info->name }} </td>
              </tr>
              </tbody>
          </table>
      </div>
      @endforeach
     <button type="button" class="btn btn-primary btn-lg btn-block"> Edit Information
     </button>
           
 @endsection
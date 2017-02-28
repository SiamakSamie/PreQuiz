@extends('layouts.app')

@section('extra_links')
@endsection

@section('content')

<div class="container">
	<p>
		From <b>{{$uni_name}}</b> searching for class <b>{{$course_id}} </b> <br />
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
		
		<ul class="pagination pagination-sm col-md-12 flex-center">
			<li class="active"><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">5</a></li>
		</ul>
		
	</div>
	
	<!--<div>-->
 <!--     <div class="">Comment section</div>-->
 <!--     <div class="">-->
   <!--   	<pre class="row"> -->
			<!--<div class="align-items-start">-->
			<!--	<div class="col">-->
			<!--		One of three columns-->
			<!--	</div>-->
			<!--	<div class="col">-->
			<!--		One of three columns-->
			<!--	</div>-->
			<!--	<div class="col">-->
			<!--		One of three columns-->
			<!--	</div>-->
			<!--</div>-->
   <!--   	</pre>-->
      	
    <!--  </div>-->
    <!--</div>-->
</div>	 	
@endsection		

 

  


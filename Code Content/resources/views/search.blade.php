@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6">
			 From <b>{{$uni_name}}</b> searching for class <b>{{$course_id}} </b>
		</div>
	</div>
	<div class="table-responsive">
		<table class="table">
			<thead> (Temp display)
				<tr>
					<th> University name</th>
					<th> Course name</th>
					<th> Quiz name </th>
					<th> Quiz author </th>
				</tr>	
			</thead>
			<tbody>
				{{$db_corr_data->count()}} entrie(s) found
				
				@foreach ($db_corr_data as $entry)
				<tr>
					<td> {{$entry->university_name}}</td>
					<td> {{$entry->course_name}}</td>
					<td> {{$entry->quiz_name}}</td>
					<td> {{$entry->quiz_creator}}</td>
					<td> <button class="btn btn-primary">Take this quiz</button></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>	 	
@endsection		

 

  


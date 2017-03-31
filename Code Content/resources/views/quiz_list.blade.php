<div class="row">	
@foreach ($db_corr_data as $entry)
	<div class="col-md-3 column">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title"> {{$entry->coursename}} </div>
				@if ($entry->updated_at != null)
					<small> Last updated {{$entry->updated_at->diffForHumans() }}</small>
				@else
					<small> Last updated x minutes ago</small>
				@endif
			</div>
			
			<div class="panel-body collapse in"> 
				<div class="row clearfix">
					<div class="col-md-12">
						<p> {{$entry->quizname}}. </p>
						<p> Description : <br /> {!!$entry->quizdescription!!}</p>
						<p class="card-text"> by {{$entry->username}}. </p>
						<a href="{{ route('take_quiz.show', ['id' => $entry->id]) }}" class="btn btn-primary center-block">Take this quiz</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endforeach
</div>
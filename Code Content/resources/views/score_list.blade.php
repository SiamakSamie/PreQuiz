<h1>Quiztory</h1>
<br>
  	  
<div class="row">	
       
 @if(count($all_score_data) == 0)
     <div class="">
         No previous quizes where taken 
     </div>
 @else
    <table class = "table table-hover" style="width:90%">
        <tr>
           <th> Course</th>
           <th> Quiz Name </th>
           <th> Date </th>
           <th> Score </th>
           <th> Resources </th>
           <th> Link </th>
           
       </tr>

       @for ( $i=0;$i< count($all_score_data['score']);$i++)
            
       <tr>
           <td> {{ $all_score_data['course_name'][$i] }}</td>
           <td> {{ $all_score_data['quiz_name'][$i] }} </td>
           <td> {{ $all_score_data['date'][$i]->diffForHumans() }} </td>
           <td> {{ $all_score_data['score'][$i] }} </td>
           <td> {{ $all_score_data['resources'][$i] }} </td>
           <td> <a href="{{ route('take_quiz.show', ['id' => $all_score_data['url'][$i]]) }}" class = "btn btn-primary"> Retake Quiz </a> </td>
       </tr>
       @endfor
    @endif
    </table>

</div>



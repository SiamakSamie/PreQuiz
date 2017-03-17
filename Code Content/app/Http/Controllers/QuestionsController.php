<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Questions;
use Session;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('questions');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        for ($i = 0; $i < count($request->question); $i++)
        {



           $this->validate($request, array(
                    'question.'.$i.''=> 'required',
                    'answer1.'.$i.'' => 'required',
                    'answer2.'.$i.'' => 'required',
                    'answer3.'.$i.'' => 'required',
                    'answer4.'.$i.'' => 'required'
                ));

                
            $questions = new Questions;
            $questions ->quizID=Session::get('quizID');
            $questions ->question=$request->question[$i];
            $questions->answer1=$request->answer1[$i];
            $questions->answer2=$request->answer2[$i];
            $questions->answer3=$request->answer3[$i];
            $questions ->answer4=$request->answer4[$i];
            
            $questions->save();
}

        return redirect()->route('questions.show','testing');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    		 return view('questions')->with('quizID', $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

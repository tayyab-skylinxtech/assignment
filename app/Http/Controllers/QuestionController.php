<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use Session;
class QuestionController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    
     public function index()
    {
        $questionairs = Questionair::all();
        return view('questionairs.index')
            ->with('questionairs',$questionairs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($questionair_id)
    {
        return view('questions.create')
                ->with('questionair_id',$questionair_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $participants = $request->input('participant');

        if($participants){
            foreach ($participants as $participant) {
               

                
                if($participant['type'] == 0){ 
                    $question = new Question;
                    $question->questionair_id = $request->questionair_id;
                    $question->title          = $participant['question'];
                    $question->type           = $participant['type'];
                    $question->save();

                    $answer                   = new Answer;
                    $answer->question_id      = $question->id;
                    
                    $answer->answer       = $participant['options'][0];    
                    

                    $answer->is_correct     = 1;
                    $answer->save();

                }

                if($participant['type'] == 1){
                    $question = new Question;
                    $question->questionair_id = $request->questionair_id;
                    $question->title          = $participant['question'];
                    $question->type           = $participant['type'];
                    $question->save();

                    
                    foreach ($participant['options'] as $key => $value) {
                        $answer                   = new Answer;
                        $answer->question_id      = $question->id;
                        $answer->answer           = $value;

                        if($participant['correct']== $key){
                            $answer->is_correct     = 1;
                        }

                        $answer->save();
                    }

                }

                if($participant['type'] == 2){
                    $question = new Question;
                    $question->questionair_id = $request->questionair_id;
                    $question->title          = $participant['question'];
                    $question->type           = $participant['type'];
                    $question->save();
                  
                    
                    foreach ($participant['options'] as $index => $data) {
                        $answer                   = new Answer;
                        $answer->question_id      = $question->id;
                        $answer->answer           = $data;

                        if(array_key_exists($index,$participant['correct'])){
                            $answer->is_correct     = 1;
                        }
                       
                        $answer->save();
                    }

                }


            }
        }
        else{
            Session::flash('message','Please Add Some Questions!');
        }
        return back();    
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

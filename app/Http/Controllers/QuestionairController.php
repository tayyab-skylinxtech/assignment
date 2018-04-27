<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Questionair;
use App\Http\Requests\StoreQuestionair;
class QuestionairController extends Controller
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
    public function create()
    {
        return view('questionairs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionair $request)
    {
        $duration_type = $request->duration_type;
        if($duration_type == 'm') {
            $duration = $request->duration;
        }
        else{
            $duration = $request->duration * 60;
        }

        $questionair = new Questionair;
        $questionair->questionair_name = $request->questionair_name;
        $questionair->duration         = $duration;
        $questionair->can_resume       = $request->resumable;

        try {
            $questionair->save();    
            Session::flash('message','Questionair Created Successfully!');
            return redirect()->route('questionairs');
        } 
        catch (\Exception $e) {
            // return $e;
            Session::flash('message','Something Went Wrong! Please Try Again.');
            return back();
        }
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

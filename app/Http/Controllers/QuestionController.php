<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    //
    public function index()
    { 
        $questionlist = Question::all();
        return view('admin.pages.index',compact('questionlist'));
    }

    public function add()
    {
        return view('admin.pages.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'body' =>'required',
        ]);

        $newquestion = new Question;
        $newquestion->title = $request->title;
        $newquestion->body = $request->body;
        $newquestion->save();
        return redirect('admin.pages.index')->withSuccess('New Question Added successfully ');   
       
    }


    public function viewquestion($id)
    {
          // dd($id);
    	$question = Question::findOrFail($id);;
         // dd($question->toArray());
         return view('admin.pages.create', compact('question'));  
    }


    //postquestion
    public function postquestion()
    {
        return view('postquestion');
    }
}

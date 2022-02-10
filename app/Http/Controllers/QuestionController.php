<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{

    public function postques()
    {
        return view('postques');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            "title"    => "required|array|min:1",
            "title.*"  => "required|string|distinct|max:150",
            "answer" => 'required|string|max:550'
        ]);

        foreach($request->title as $title){
            $create = Question::create([
                "title" => $title,
                "user_id" => auth()->user()->id,
                "body" => $request->answer
            ]);
        }

        return redirect()->back()->with('success', 'Questions are created successfully');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use Exception;

class QuestionController extends Controller
{

    public function postques()
    {
        return view('postques');
    }


    public function edit($id){
        return view('');
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


    public function update($id, Request $request){
        $data = $request->validate([
            "title"    => "required|string|max:150",
            "answer" => 'required|string|max:550'
        ]);

        try {
            $update = Question::where('id', $id)->update([
                'title' => $request->title,
                "body" => $request->answer
            ]);

            return redirect()->back()->with('success', "Question is updated successful");
        } catch (Exception $ex) {
            return redirect()->back()->with('error', "Unable to updated the question. Please try again.");
        }
    }


    public function destroy($id){
        $d = Question::findOrFail($id);
        $d->delete();
        return redirect('')->back()->with('success', "Question is deleted successful");
    }
}

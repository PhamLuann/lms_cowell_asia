<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{

    public function index()
    {
        $questions = Question::select()->paginate();

        return view('admin.question.all-question')->with('questions', $questions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.question.add-question');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Question::create($input);
        return redirect(route('question.index'));
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
        $questions = Question::find($id);
        return view('admin.question.edit-question')->with('question', $questions);
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
        $questions = Question::find($id);
        $input = $request->all();
        var_dump($input);
        $questions->update($input);
        return redirect(url('admin/question'))->with('flash_message', 'Question Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Question::destroy($id);

        return redirect(url('admin/question'))->with('flash message', "Question delete successfully");
    }

    public function searchByNameAnswer1Type(Request $request)
    {
        $name = $request->get('name', '');
        $answer1 = $request->get('answer1', '');
        $type = $request->get('type', '');
        $result = Question::where('type','like', "%$type")
            ->where('name', 'like', "%$name%")
            ->paginate(10);
        return view('admin.question.all-question')->with('questions', $result);
    }
}

<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;
use App\Question;

class AnswerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Question  $question
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Question $question, Request $request)
    {
        $question->answers()->create(
            $request->validate(['body' => 'required'])
            + ['user_id' => \Auth::id()]
        );

        return back()->with('success', 'You answer has been posted successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question, Answer $answer)
    {
        $this->authorize('update', $answer);
        return view('answers.edit', compact('question','answer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question, Answer $answer)
    {
        $this->authorize('update', $answer);
        $answer->update($request->validate(['body' => 'required']));
        return redirect()->route('questions.show',$question->slug)->with('success', 'You answer has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answer  $answer
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question, Answer $answer)
    {
        $this->authorize('delete', $answer);
        $answer->delete();
        return redirect()->route('questions.show',$question->slug)->with('success', 'You answer has been deleted successfully');
    }
}

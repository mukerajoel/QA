<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Reaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $questions = Question::whereNull('question_id')->get();
        $updatedQuestions = [];
        foreach($questions as $question) {
            $likes = DB::table('question_reactions')->where('tally', $question->id)->count();
        }
        return view('home')->with('questions', $questions, 'like', $like);
    }



     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request, $id
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $this->validate($request, [
    //         'question_id' => ['integer', 'required', 'exists:questions,id,deleted_at,NULL'],
    //         'tally' => ['string', 'required'],
    //     ]);


    //     $reaction = new Reaction;
    //     $reaction->reaction = $request->input('tally');
    //     $reaction->user_id = Auth::id();
    //     $reaction->question_id = $request->input('question_id');
    //     $reaction->save();

    //     return redirect()->route('q.show',  $request->input('question_id'));
    // }
}

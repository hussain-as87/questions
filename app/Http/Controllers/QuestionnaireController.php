<?php

namespace App\Http\Controllers;

use App\Models\Questionnaire;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('questionnaire.create');
    }
    public function store()
    {
        $data=$this->getvalidation();
       // $data=auth()->users()->questionnaires()->id;
        // $questionnaire= Questionnaire::create($data);

        $questionnaire=auth()->user()->questionnaires()->create($data);

        return redirect('questionnaires/'.$questionnaire->id);
    }

    public function show(Questionnaire $questionnaire)
    {
        $questionnaire->load('questions.answers.responses');
      //   dd($questionnaire);
        return view('questionnaire.show',compact('questionnaire'));
    }
    protected function getvalidation()
    {
        return \request()->validate([
            'title'   =>'required',
            'purpose' =>'required',
            ]);
    }

}

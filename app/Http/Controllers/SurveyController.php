<?php

namespace App\Http\Controllers;

use App\Models\Questionnaire;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function show(Questionnaire $questionnaire, $slug)
    {

        $questionnaire->load('questions.answers');
        return view('survey.show', compact('questionnaire'));
    }

    public function store(Questionnaire $questionnaire,Request $request)
    {//dd($request->all());
        $data = $request->validate([
            'responses.*.answer_id' => 'required',
            'responses.*.question_id' => 'required',
            'survey.name' => 'required',
            'survey.email' => 'required|email',
        ]);


      $survey = $questionnaire->surveys()->create($data['survey']);
      $survey->responses()->createMany($data['responses']);
        return redirect('questionnaires/'.$questionnaire->id);
    }
}
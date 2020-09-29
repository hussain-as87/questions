@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('create new Question') }}</div>

                    <div class="card-body">
                        <form action="/laravel/questions/public/questionnaires/{{ $questionnaire->id }}/questions" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="question">question</label>
                                <input name="question[question]" type="text" class="form-control" id="question"
                                       aria-describedby="questionHelp" placeholder="Enter question"value="{{old('question.question')}}">
                                <small id="questionHelp" class="form-text text-muted">ask sample at to the point question fro best result.</small>
                                @error('question.question')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <fieldset>
                                    <legend>choices</legend>
                                    <small id="choicesHelp" class="form-text text-muted">give choices that give you the most insight into your question.</small>
                                    <div>

                                        <div class="form-group">
                                            <label for="answer1">choise 1</label>
                                            <input name="answers[][answer]" type="text" class="form-control" id="answer1"
                                                   aria-describedby="choicesHelp" placeholder="Enter choice 1"value="{{old('answers.0.answer')}}">
                                            @error('answers.0.answer')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="answer2">choise 2</label>
                                            <input name="answers[][answer]" type="text" class="form-control" id="answer2"
                                                   aria-describedby="choicesHelp" placeholder="Enter choice 2"value="{{old('answers.1.answer')}}">
                                            @error('answers.1.answer')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="answer2">choise 3</label>
                                            <input name="answers[][answer]" type="text" class="form-control" id="answer3"
                                                   aria-describedby="choicesHelp" placeholder="Enter choice 3"value="{{old('answers.2.answer')}}">
                                            @error('answers.2.answer')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="answer4">choise 4</label>
                                            <input name="answers[][answer]" type="text" class="form-control" id="answer4"
                                                   aria-describedby="choicesHelp" placeholder="Enter choice 4" value="{{old('answers.3.answer')}}" ">
                                            @error('answers.3.answer')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>

                                    </div>
                                </fieldset>
                            </div>

                            <button type="submit" class="btn btn-primary">add question</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

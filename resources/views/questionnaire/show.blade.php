@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$questionnaire->title}}</div>

                    <div class="card-body">
                        <div>
                            <a href="{{$questionnaire->id}}/questions/create" class="btn btn-dark">Create Question</a>
                            <a href="/laravel/questions/public/surveys/{{$questionnaire->id}}-{{\Illuminate\Support\Str::slug($questionnaire->title)}}"
                               class="btn btn-dark">take survey</a>
                        </div>
                    </div>

                    @foreach($questionnaire->questions as $key=>$question)
                        <div class="card ">
                            <div class="card-header"><strong>{{$key +1 ." -"}}</strong>{{$question->question}}</div>

                            <div class="card-body">
                                <div>
                                    <ul class="list-group">
                                        @foreach($question->answers as  $answer)
                                            <li class="list-group-item  d-flex justify-content-between">
                                                <div>{{$answer->answer}}</div>
                                                <div style="color:darkblue">
                                                    @if($question->responses->count())
                                                    <strong>{{intval(($answer->responses->count()*100)/$question->responses->count())}}%</strong>
                                                        @endif
                                                </div>

                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="card-footer">
                                    <form method="post" action="{{$questionnaire->id}}/questions/{{$question->id}}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn-outline-danger btn-sm">Delete Question</button>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        </div>
                </div>
            </div>
        </div>
@endsection

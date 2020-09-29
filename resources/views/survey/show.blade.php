@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 style="color:darkcyan">{{$questionnaire->title}}</h1>
                <form method="post"
                      action="{{$questionnaire->id}}-{{\Illuminate\Support\Str::slug($questionnaire->title)}}">
                    @csrf
                    @foreach($questionnaire->questions as $key=>$question)

                        <div class="card ">
                            <div class="card-header"><strong>{{$key +1 ." -"}}</strong>{{$question->question}}</div>

                            <div class="card-body">
                                @error('responses.'.$key.'.answer_id')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                                <div>
                                    <ul class="list-group">
                                        @foreach($question->answers as  $answer)
                                            <label for="answer{{$answer->id}}">
                                                <li class="list-group-item">
                                                    <input type="radio" name="responses[{{$key}}][answer_id]"
                                                           id="answer{{$answer->id}}"{{(old('responses.'.$key.'.answer_id')==$answer->id) ? 'checked':''}} class="mr-auto"
                                                           value="{{$answer->id}}">
                                                    {{$answer->answer}}
                                                    <input type="hidden" name="responses[{{$key}}][question_id]"
                                                           value="{{$question->id}}">
                                                </li>
                                            </label>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endforeach


                            <div class="card ">
                                <div class="card-header "
                                     style="color: #0E0EFF;font-size: large">{{ __('add new survey') }}</div>

                                <div class="card-body">


                                    <div class="form-group">
                                        <label for="name">name</label>
                                        <input name="survey[name]" type="text" class="form-control" id="name"
                                               aria-describedby="titleHelp" placeholder="Enter name"
                                               value="{{old('survey.name')}}">
                                        <small id="nameHelp" class="form-text text-muted">your name please.</small>
                                        @error('survey.name')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="email">email</label>
                                        <input name="survey[email]" type="email" class="form-control" id="email"
                                               aria-describedby="emailHelp" placeholder="Enter email"
                                               value="{{old('survey.email')}}">
                                        <small id="emailHelp" class="form-text text-muted">put you email here.</small>
                                        @error('survey.email')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-dark">add survey</button>
                                </div>
                            </div>
                        </div>
                </form>

            </div>
        </div>
    </div>
@endsection



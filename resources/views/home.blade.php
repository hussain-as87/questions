@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div><a href="questionnaires/create" class="btn btn-dark">Create Questionnaire</a></div>
                    </div>
                </div>


                <div class="card ">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($questionnaire as $questionnaire)
                                <li class="list-group-item">
                                    <a href="{{$questionnaire->path()}}" class="btn btn-link">{{$questionnaire->title}}</a>
                                    <div><small class="font-weight-bold">share URL</small>
                                        <p>
                                            <a href="{{$questionnaire->publicpath()}}" class="btn-outline-dark">
                                                {{$questionnaire->publicpath()}}
                                            </a>
                                        </p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

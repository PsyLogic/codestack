@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h4>{{$question->title}}</h4>
                    </div>
                    <hr>
                    <div class="media">
                        <div class="d-flex flex-column vote-controls">
                            <a href="" class="vote-up off" title="This question shows research effort; it is useful and clear">
                                <i class="fas fa-caret-up fa-2x"></i>
                            </a>
                            <span class="votes-count">344</span>
                            <a href="" class="vote-down off" title="This question does not show any research effort; it is unclear or not useful">
                                <i class="fas fa-caret-down fa-2x"></i>
                            </a>
                            <a
                                onclick="event.preventDefault(); document.getElementById('frm-favorite-{{ $question->id }}').submit();"
                                class="favorite mt-2 {{ $question->favorite_status }}"
                                title="mark as favorite question (click again to undo)"
                            >
                                <i class="fas fa-star" style="font-size: 1.3em;"></i>
                                <span class="favorites-count">{{$question->favorites_count}}</span>
                            </a>
                            <form id="frm-favorite-{{ $question->id }}" action="{{route('questions.favorite_status',$question)}}" method="post">
                                @csrf
                            </form>
                        </div>
                        <div class="media-body">
                            {!!$question->body_html!!}
                            <div class="float-right">
                                <span class="text-muted">Asked {{ $question->create_date }}</span>
                                <div class="media">
                                    <a href="{{ $question->user->url }}" class="pr-2">
                                        <img src="{{ $question->user->avatar }}" alt="{{ $question->user->name }}">
                                    </a>
                                    <div class="media-body mt-1">
                                        <a href="{{ $question->user->url }}" class="pr-2">
                                            {{ $question->user->name }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('answers._index',[
        'answersCount' => $question->answers_count,
        'answers' => $question->answers,
    ])
    @include('answers._create')
</div>
@endsection

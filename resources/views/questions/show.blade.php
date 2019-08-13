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
                            <a href="" class="favorite mt-2 favorited" title="mark as favorite question (click again to undo)">
                                <i class="fas fa-star" style="font-size: 1.3em;"></i>
                                <span class="favorites-count">33</span>
                            </a>
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
    <div class="row mt-3 justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h3>{{ $question->answers_count }} Answsers</h3>
                    </div>
                    <hr>
                    @foreach ($question->answers as $answer)
                        <div class="media">
                            <div class="d-flex flex-column vote-controls">
                                <a href="" class="vote-up off" title="This answer is useful">
                                    <i class="fas fa-caret-up fa-2x"></i>
                                </a>
                                <span class="votes-count">344</span>
                                <a href="" class="vote-down off" title="This answer is not useful">
                                    <i class="fas fa-caret-down fa-2x"></i>
                                </a>
                                <a href="" class="best-answer mt-2 " title="The question owner accepted this as the best answer">
                                    <i class="fas fa-check fa-3x"></i>
                                </a>
                                
                            </div>
                            <div class="media-body">
                                {!! $answer->body_html !!}
                                <div class="float-right">
                                    <span class="text-muted">Answered {{ $answer->create_date }}</span>
                                    <div class="media">
                                        <a href="{{ $answer->user->url }}" class="pr-2">
                                            <img src="{{ $answer->user->avatar }}" alt="{{ $answer->user->name }}">
                                        </a>
                                        <div class="media-body mt-1">
                                            <a href="{{ $answer->user->url }}" class="pr-2">
                                                {{ $answer->user->name }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

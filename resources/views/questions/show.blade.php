@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>{{$question->title}}</h4>
                </div>
                <div class="card-body">
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

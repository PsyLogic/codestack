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
                            @include('_parts._votes',[
                                'model' => $question,
                                'label' => 'question',
                                'route' => 'questions.vote'
                            ])
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
                                @include('_parts._author',[
                                    'label' => 'Asked',
                                    'model' => $question
                                ])
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

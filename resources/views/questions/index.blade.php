@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Questions</div>
                <div class="card-body">
                    @foreach ($questions as $question)
                        <div class="media">
                            <div class="d-flex flex-column counters">
                                <div class="votes">
                                <strong>{{ $question->votes }}</strong> {{ str_plural('vote', $question->votes) }}
                                </div>
                                <div class="answers {{ $question->status }} mb-1">
                                    <strong>{{ $question->answers }}</strong> {{ str_plural('answer', $question->answers) }}
                                </div>
                                <div class="views">
                                    {{ $question->views }} {{ str_plural('view', $question->views) }}
                                </div>
                            </div>
                            <div class="media-body">
                                <h3 class="mt-0"><a href="{{ $question->url }}">{{ $question->title }}</a></h3>
                                <p class="lead">
                                    Asked by <a href="#">{{$question->user->name}}</a> - {{ $question->create_date }}
                                </p>
                                {{ str_limit($question->body, 250) }}
                            </div>
                        </div>
                        <hr>
                    @endforeach

                    <div class="mx-auto">
                        {{$questions->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

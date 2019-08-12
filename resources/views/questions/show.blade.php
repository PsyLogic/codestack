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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

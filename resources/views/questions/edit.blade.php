@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h3>Update Question</h3>
                        <div class="ml-auto">
                            <a href="{{route('questions.index')}}" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('questions.update', $question) }}">
                        @method('PUT')
                        @include('questions._form', ['buttonAction' => 'Update'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

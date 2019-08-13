@extends('layouts.app')
@section('content')
<div class="row mt-3 justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h5>Update your answer in QS : {{ $question->title }}</h5>
                </div>
                <hr>
                <form action="{{ route('questions.answers.update', compact('question','answer')) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="body" class="col-form-label">{{ __('Body') }}</label>
                        <textarea rows="10" id="body" class="form-control @error('body') is-invalid @enderror" name="body" required>{{ old('body', $answer->body) }}</textarea>
                        @error('body')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-outline-primary">Update Your Answer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

<div class="row mt-3 justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h3>Your Answer</h3>
                </div>
                <hr>
                <form action="{{ route('questions.answers.store', $question) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="body" class="col-form-label">{{ __('Body') }}</label>
                        <textarea rows="10" id="body" class="form-control @error('body') is-invalid @enderror" name="body" required>{{ old('body') }}</textarea>
                        @error('body')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-outline-primary">Post Your Answer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@csrf
<div class="form-group">
    <label for="title" class="col-form-label">{{ __('Title') }}</label>
    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $question->title) }}" required autocomplete="title" autofocus>
    @error('title')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="body" class="col-form-label">{{ __('Body') }}</label>
    <textarea rows="10" id="body" class="form-control @error('body') is-invalid @enderror" name="body" required>{{ old('body', $question->body) }}</textarea>
    @error('body')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    <button class="btn btn-outline-primary">{{ $buttonAction }}</button>
</div>
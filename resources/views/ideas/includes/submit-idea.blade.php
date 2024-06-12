<h4> Share yours ideas </h4>
<div class="row">
    <form action="{{ route('idea.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <textarea name="idea" class="form-control" id="idea" rows="3">{{ old('idea') }}</textarea>
            @error('idea')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="">
            <button class="btn btn-dark"> Share </button>
        </div>
    </form>
</div>

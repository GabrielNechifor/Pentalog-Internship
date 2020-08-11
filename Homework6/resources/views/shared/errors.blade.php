<div>
    @foreach ($errorsName as $errorName)
        @error($errorName)
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    @endforeach
</div>

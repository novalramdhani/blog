<div>
    <div class="custom-file mb-3">
        <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail">
        <label class="custom-file-label" for="thumbnail">Choose file</label>
    </div>

    <div class="form-group">
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') ?? $post->title }}" placeholder="Input title...">
        @error('title')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>

    <div class="form-group">
        <select name="category" id="category" class="form-control @error('category')
        is-invalid @enderror">
            @foreach ($categories as $category)
                <option {{ $category->id == $post->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>

    <div class="form-group">
        <select multiple="multiple" class="form-control select2 @error('tags') is-invalid @enderror" name="tags[]" id="tags">
            @foreach ($post->tags as $tag)
                <option selected value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
            @foreach ($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
        </select>
        @error('tags')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>

    <div class="form-group">
        <textarea name="content" id="content" cols="30" rows="5" class="form-control @error('content') is-invalid @enderror" placeholder="Input Content">{{ old('content') ?? $post->content }}</textarea>
        @error('content')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">{{ $submit ?? 'Button' }}</button>
</div>

<div>
    <div class="form-group">
        <label for="thumbnail">Choose your thumbnail</label>
        <input type="file" name="thumbnail" id="thumbnail">
        @error('thumbnail')
            <div class="text-danger mt-3">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') ?? $post->title }}">
        @error('title')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="category">Category:</label>
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
        <label for="tags">Tags:</label>
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
        <label for="content">Content:</label>
        <textarea name="content" id="content" cols="30" rows="5" class="form-control @error('content') is-invalid @enderror">{{ old('content') ?? $post->content }}</textarea>
        @error('content')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">{{ $submit ?? 'Button' }}</button>
</div>

<x-app-layout>
    <div class="container">
        <div class="container-header bg-dark">Add Article</div>
        @if($editMode)
        <form method="POST" action="{{ route('articles.edit', $post->id) }}">
                @method('PATCH') 
        @else
            <form method="POST" action="{{ route('articles.store') }}">
        @endif
            @csrf
            <div class="form-group mb-3">
                <label for="title">Article Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="title" value="{{ $editMode ? $post->title : '' }}" >
            </div>
            <div class="form-group mb-3">
                <label for="categories">Categories</label>
                <select class="form-control" id="categories" name="category">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $editMode && $post->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->title }}
                        </option> 
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="author">Authors</label>
                <select class="form-control" id="author" name="author">
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}" 
                            {{ $editMode && $post->author_id == $author->id ? 'selected' : '' }}>
                            {{ $author->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content" rows="3">{{$editMode ? $post->content:''}}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Link Gambar</label>
                <input type="text" class="form-control" id="image" name="image" 
                    value="{{ $editMode ? $post->image : '' }}" 
                    placeholder="Masukkan link gambar">
            </div>
            <button type="submit" class="btn btn-primary mt-5">Submit</button>
        </form>
    </div>
</x-app-layout>

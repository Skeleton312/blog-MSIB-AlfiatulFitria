<x-app-layout>
    <div class="container">
        <div class="container-header bg-dark">Add Article</div>
        @if($editMode)
        <form method="POST" action="{{ route('authors.edit', $author->id) }}">
                @method('PATCH') 
        @else
            <form method="POST" action="{{ route('authors.store') }}">
        @endif
            @csrf
            <div class="form-group mb-3">
                <label for="title">Author Name</label>
                <input type="text" class="form-control" id="title" name="name" placeholder="title" value="{{ $editMode ? $author->name : '' }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="title">Author Email</label>
                <input type="email" class="form-control" id="title" name="email" placeholder="email" value="{{ $editMode ? $author->email : '' }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="content">Author Bio</label>
                <textarea class="form-control" id="content" name="bio" rows="3" required>{{$editMode ? $author->bio:''}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-5">Submit</button>
        </form>
    </div>
</x-app-layout>

<x-app-layout>
    <div class="container">
        <div class="container-header bg-dark">Add Category</div>
        @if($editMode)
        <form method="POST" action="{{ route('categories.edit', $category->id) }}">
                @method('PATCH') 
        @else
            <form method="POST" action="{{ route('categories.store') }}">
        @endif
            @csrf
            <div class="form-group mb-3">
                <label for="title">Category Field</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="title" value="{{ $editMode ? $category->title : '' }}" >
            </div>

            <div class="form-group mb-3">
                <label for="content">Desc</label>
                <textarea class="form-control" id="content" name="desc" rows="3">{{$editMode ? $category->desc:''}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-5">Submit</button>
        </form>
    </div>
</x-app-layout>

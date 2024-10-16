<x-app-layout>
@if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
@endif
<div class="container mx-auto px-4">
    <a href="{{ route('show.posts') }}" class="text-2xl font-bold mb-10 mt-6">Back</a>
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <img class="w-full h-22 object-cover" src="{{ $post->image }}" alt="{{ $post->title }}">
            <div class="p-4">
                <h1 class="text-2xl font-bold mb-2">{{ $post->title }}</h1>
                <div class="d-flex gap-4">
                    <a class="text-2l font-bold mb-2">oleh {{$post->author->name}}</a> 
                    <a class="text-2l font-bold mb-2">{{$post->created_at}}</a>
                    @if($post->status ==='draft') 
                    <a class="text-secondary">{{$post->status}}</a> 
                    @else
                    <a class="text-primary">{{$post->status}}</a> 
                    @endif
                </div> 
                <a class="text-2l font-bold mb-2">Kategori: {{$post->category->title}}</a>
                <p class="text-gray-700 mb-4">{{ $post->content }}</p>
            </div>
            @if($post->status === 'draft')
            <form action="{{ route('update.posts', $post->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('patch')
                <button type="submit" class="btn btn-success m-4">Publish</button>
            </form>
            @else
            <form action="{{ route('update.posts', $post->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('patch')
                <button type="submit" class="btn btn-warning m-4">Take Down</button>
            </form>
            @endif
        </div>
    </div>
</x-app-layout>
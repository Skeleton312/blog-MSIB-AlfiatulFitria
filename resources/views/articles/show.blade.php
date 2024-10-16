<x-app-layout>
    <div class="container mx-auto px-4">
    <a href="{{ route('dashboard') }}" class="text-2xl font-bold mb-10 mt-6">Back to Articles</a>
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <img class="w-full h-22 object-cover" src="{{ $article->image }}" alt="{{ $article->title }}">
            <div class="p-4">
                <h1 class="text-2xl font-bold mb-2">{{ $article->title }}</h1>
                <a class="text-2l font-bold mb-2">oleh {{$article->author->name}}</a>
                <p class="text-gray-700 mb-4">{{ $article->content }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
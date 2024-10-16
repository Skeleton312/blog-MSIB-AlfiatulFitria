<x-app-layout>
    <div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6 mt-6">Articles</h1>
    <x-slot name='navigation'>
        @include('layouts.navigation')
    </x-slot>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($articles as $article)
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img class="w-full h-48 object-cover" src="{{ $article->image }}" alt="{{ $article->title }}">
                <div class="p-4">
                    <h2 class="text-lg font-semibold">{{ $article->title }}</h2>
                    <p class="text-gray-700">{{ Str::limit($article->content, 100) }}</p>
                    <a href="{{ route('article.show', $article->id) }}" class="btn btn-primary mt-4">
                        Read More
                    </a>
                </div>
            </div>
        @endforeach
        @if($post->isNotEmpty())
        @foreach ($post as $article)
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img class="w-full h-48 object-cover" src="{{ $article->image }}" alt="{{ $article->title }}">
                <div class="p-4">
                    <h2 class="text-lg font-semibold">{{ $article->title }}</h2>
                    <p class="text-gray-700">{{ Str::limit($article->content, 100) }}</p>
                    <a href="{{ route('article.show', $article->id) }}" class="btn btn-primary mt-4">
                        Read More
                    </a>
                </div>
            </div>
        @endforeach
        @endif
    </div>
</div>
</x-app-layout>

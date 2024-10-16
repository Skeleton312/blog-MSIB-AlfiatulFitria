<x-app-layout>
<div class="container mx-auto px-4">
    <a href="{{ route('show.categories') }}" class="text-2xl font-bold mb-10 mt-6">Back</a>
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="p-4">
                <h1 class="text-2xl font-bold mb-2">{{ $category->title }}</h1>
                <p class="text-gray-700 mb-4">{{ $category->desc }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
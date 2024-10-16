<x-app-layout>

    <x-slot name="navigation">
        <@include('layouts.dashboard-nav')
    </x-slot>
    <x-slot name="header" >
        <div class=" d-flex gap-3 justify-content-center">
            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-black-500 dark:text-black-400 bg-white dark:bg-gray-800">
                {{$articleCount}} Artikel
            </button>
            <button class="ml-5 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-black-500 dark:text-black-400 bg-white dark:bg-gray-800">
                {{$categoriesCount}} Kategori
            </button>
            <button class="ml-5 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-black-500 dark:text-black-400 bg-white dark:bg-gray-800">
                {{$authorsCount}} Autor
            </button>
        </div> 
    </x-slot>
    <div class="flex justify-center gap-6 mt-8">
        <!-- Table for Articles -->
        <div class="w-1/3 bg-white shadow-lg rounded-lg p-4">
            <h3 class="text-center font-bold text-lg mb-4">Articles</h3>
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">Title</th>
                        <th class="border px-4 py-2">Content</th>
                    </tr>
                </thead>
                <tbody>
                    @if($article->isEmpty())
                    <tr>
                        <td class="border px-4 py-2 text-center" colspan="2">Belum ada data</td>
                    </tr>
                    @else
                        @foreach($article as $article)
                        <tr>
                            <td class="border px-4 py-2">{{ $article->title }}</td>
                            <td class="border px-4 py-2">{{ Str::limit($article->content, 50) }}</td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>

        <!-- Table for Categories -->
        <div class="w-1/3 bg-white shadow-lg rounded-lg p-4">
            <h3 class="text-center font-bold text-lg mb-4">Categories</h3>
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">Category Name</th>
                    </tr>
                </thead>
                <tbody>
                    @if($categories->isEmpty())
                    <tr>
                        <td class="border px-4 py-2 text-center">Belum ada data</td>
                    </tr>
                    @else
                        @foreach($categories as $category)
                        <tr>
                            <td class="border px-4 py-2">{{ $category->title }}</td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>

        <!-- Table for Authors -->
        <div class="w-1/3 bg-white shadow-lg rounded-lg p-4">
            <h3 class="text-center font-bold text-lg mb-4">Authors</h3>
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">Author Name</th>
                        <th class="border px-4 py-2">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @if($authors->isEmpty())
                    <tr>
                        <td class="border px-4 py-2 text-center" colspan="2">Belum ada data</td>
                    </tr>
                    @else
                        @foreach($authors as $author)
                        <tr>
                            <td class="border px-4 py-2">{{ $author->name }}</td>
                            <td class="border px-4 py-2">{{ $author->email }}</td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>

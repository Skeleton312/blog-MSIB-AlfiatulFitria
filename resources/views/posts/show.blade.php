<x-app-layout>
    <x-slot name="navigation">
        @include('layouts.dashboard-nav')
    </x-slot>
    <x-slot name="header">
        <a class="btn btn-light text-black" href="{{ route('form.posts') }}">{{ __('Buat Artikel +') }}</a>
    </x-slot>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="d-flex justify-content-center">
        <div class="bg-white shadow-lg rounded-lg p-4 w-100">
            <table class="table-auto w-100">
                <thead>
                    <tr>
                        <th class="border px-4 py-2 w-2/6">Title</th>
                        <th class="border px-4 py-2 w-3/6">Content</th>
                        <th class="border px-4 py-2 w-1/6">Status</th>
                        <th class="border px-4 py-2 w-1/6">Author</th>
                        <th class="border px-4 py-2">Dibuat</th>
                        <th class="border px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($posts->isEmpty())
                    <tr>
                        <td class="border px-4 py-2 text-center" colspan="5">Belum ada data</td>
                    </tr>
                    @else
                        @foreach($posts as $article)
                        <tr>
                            <td class="border px-4 py-2 w-2/6"><a href="{{ route('select.posts', $article->id) }}" class='text-primary'>{{ $article->title }}</a></td>
                            <td class="border px-4 py-2 w-3/6">{{ Str::limit($article->content, 100) }}</td>
                            @if($article->status == 'draft')
                                <td class="border px-4 py-2 w-1/6 "><p class=" btn btn-secondary">{{ $article->status }}</p></td>
                            @elseif($article->status == 'pending')
                                <td class="border px-4 py-2 w-1/6"><p class=" btn btn-warning">{{ $article->status }}</p></td>
                            @else
                                <td class="border px-4 py-2 w-1/6"><p class=" btn btn-success">{{ $article->status }}</p></td>
                            @endif
                            <td class="border px-4 py-2 w-3/6">{{$article->author->name}}</td>
                            <td class="border px-4 py-2">{{ $article->created_at }}</td>
                            <td class="border px-4 py-2 d-flex gap-2">
                            @if($article->status == 'draft')
                                <a class="btn btn-warning" href= '{{ route("edit.posts", $article->id)}}'>Edit</a>
                            @endif
                                <form action="{{ route('delete.posts', $article->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>
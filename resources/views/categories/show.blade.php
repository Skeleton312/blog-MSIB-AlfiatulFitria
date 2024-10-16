<x-app-layout>
    <x-slot name="navigation">
        @include('layouts.dashboard-nav')
    </x-slot>
    <x-slot name="header">
        <a class="btn btn-light text-black" href="{{ route('form.categories') }}">{{ __('Tambah Kategori +') }}</a>
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
                        <th class="border px-4 py-2 w-3/6">Deskripsi</th>
                        <th class="border px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($categories->isEmpty())
                    <tr>
                        <td class="border px-4 py-2 text-center" colspan="5">Belum ada data</td>
                    </tr>
                    @else
                    @foreach($categories as $article)
                    <tr>
                        <td class="border px-4 py-2 w-2/6">
                            <a href="{{ route('select.categories', $article->id) }}" class='text-primary'>{{ $article->title }}</a>
                        </td>
                        <td class="border px-4 py-2 w-3/6">{{ Str::limit($article->desc, 100) }}</td>
                        <td class="border px-4 py-2 d-flex gap-2">
                            <a class="btn btn-warning" href="{{ route('edit.categories', $article->id) }}">Edit</a>
                            
                            <button type="button" class="btn btn-danger" 
                                onclick="event.preventDefault(); 
                                        if(confirm('Apakah Anda yakin ingin menghapus kategori ini? Menghapus kategori ini akan menghapus semua artikel yang terkait.')) { 
                                            document.getElementById('delete-form-author-{{ $article->id }}').submit(); 
                                        }">
                                Hapus
                            </button>

                            <form id="delete-form-author-{{ $article->id }}" action="{{ route('delete.categories', $article->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
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
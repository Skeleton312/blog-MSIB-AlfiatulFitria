<x-app-layout>
    <x-slot name="navigation">
        @include('layouts.dashboard-nav')
    </x-slot>
    <x-slot name="header">
        <a class="btn btn-light text-black" href="{{ route('form.authors') }}">{{ __('Tambah Author +') }}</a>
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
                        <th class="border px-4 py-2 w-2/6">Name</th>
                        <th class="border px-4 py-2 w-3/6">Bio</th>
                        <th class="border px-4 py-2 w-1/6">Email</th>
                        <th class="border px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($authors->isEmpty())
                    <tr>
                        <td class="border px-4 py-2 text-center" colspan="5">Belum ada data</td>
                    </tr>
                    @else
                        @foreach($authors as $article)
                        <tr>
                            <td class="border px-4 py-2 w-2/6"><a href="{{ route('select.authors', $article->id) }}" class='text-primary'>{{ $article->name }}</a></td>
                            <td class="border px-4 py-2 w-3/6">{{ Str::limit($article->bio, 100) }}</td>
                            <td class="border px-4 py-2">{{ $article->email }}</td>
                            <td class="border px-4 py-2 d-flex gap-2">
                                <a class="btn btn-warning" href= '{{ route("edit.authors", $article->id)}}'>Edit</a>
                                <button type="button" class="btn btn-danger" 
                                    onclick="event.preventDefault(); 
                                            if(confirm('Apakah Anda yakin ingin menghapus author ini? Menghapus author ini akan menghapus semua artikel yang terkait.')) { 
                                                document.getElementById('delete-form-{{ $article->id }}').submit(); 
                                            }">
                                    Hapus
                                </button>
                            </td>
                        </tr>
        
                        <form id="delete-form-{{ $article->id }}" action="{{ route('delete.authors', $article->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>
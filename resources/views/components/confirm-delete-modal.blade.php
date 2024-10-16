@props([
    'modalId',      // ID unik untuk setiap modal agar bisa dipanggil di berbagai halaman
    'route',        // Route untuk delete action
    'entityName',   // Nama entitas yang akan dihapus (article, author, category, dll.)
    'relatedMessage' => null // Pesan tambahan jika ada hubungan dengan entitas lain (opsional)
])

<div
    x-data="{ show: false }"
    x-on:open-modal.window="$event.detail === '{{ $modalId }}' ? show = true : null"
    x-on:close-modal.window="show = false"
    x-show="show"
    class="fixed inset-0 flex items-center justify-center z-50"
    style="display: none;"
>
    <div class="bg-white p-5 rounded-lg shadow-lg">
        <h2 class="text-xl mb-4">Konfirmasi Penghapusan</h2>
        <p>Apakah Anda yakin ingin menghapus {{ $entityName }} ini?</p>
        
        <!-- Tampilkan pesan tambahan jika ada -->
        @if($relatedMessage)
            <p class="text-danger">{{ $relatedMessage }}</p>
        @endif

        <!-- Tombol untuk Konfirmasi Hapus -->
        <div class="flex justify-end mt-4">
            <form action="{{ $route }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Ya, Hapus</button>
            </form>

            <button class="btn btn-secondary ml-2" x-on:click="show = false">Batal</button>
        </div>
    </div>
</div>

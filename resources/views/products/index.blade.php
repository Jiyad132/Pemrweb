<x-app-layout>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">

        @if (session()->has('success'))
        <x-alert message="{{session('success')}}" />
        @endif

            <div class="flex justify-between items-center mb-4">
    <h2 class="text-xl font-bold">Daftar Produk</h2>
    <a href="{{ route('products.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
        Tambah
    </a>
</div>


            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    @foreach ($products as $product)
        <div class="bg-white shadow-md rounded-lg p-4 h-full flex flex-col justify-between">
            <a href="{{ route('products.show', $product->id) }}">
                <img src="{{ asset('storage/' . $product->foto) }}" alt="{{ $product->nama }}" class="w-full h-48 object-cover rounded">
                <h3 class="text-lg font-bold mt-2">{{ $product->nama }}</h3>
                <p class="text-gray-600">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                <p class="text-sm text-gray-500 mb-2">{{ $product->deskripsi }}</p>
            </a>

            <div class="flex gap-2 mt-2">
                <a href="{{ route('products.edit', $product->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-1 px-3 rounded">
                    Edit
                </a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    @endforeach
</div>



        <div class="mt-4">
            {{ $products->links() }}
        </div>

        </div>
</x-app-layout>


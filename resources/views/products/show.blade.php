<x-app-layout>
    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">{{ $product->nama }}</h1>
        <img src="{{ asset('storage/' . $product->foto) }}" alt="{{ $product->nama }}" class="w-full rounded-md mb-4">
        <p class="text-xl text-gray-700 mb-2"><strong>Harga:</strong> Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
        <p class="text-gray-600"><strong>Deskripsi:</strong> {{ $product->deskripsi }}</p>
        <a href="{{ route('products.index') }}" class="mt-4 inline-block text-blue-600 hover:underline">← Kembali</a>
    </div>
</x-app-layout>

<x-app-layout>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">

            <div class="mt-6 item-center justfy-between">
                <h2 class="font-semibold text-xl">Daftar Produk</h2>
                <a href="{{ route('products.create') }}">
                <button class="bg-grey-100 px-10 py-2 rounded-md font-semibold">Tambah</button>
                </a>
                
            </div>

            <div class="grid grid-cols-3 mt-4">
                 @foreach ($products as $product)
                    <div>
                         <img src="{{ url('storage/' . $product->foto) }}" />
                         <div class="my-2">
                            <p class="mt-2 text-xl font-light">{{ $product->nama }}</p>
                            <p class="font-semi bold text-gray-400">Rp {{number_format ($product->harga) }}</p>
                         </div>
                         <button class="bg-grey-100 px-10 py-2 w-full rounded-md font-semibold">edit</button>
                    </div>
                 @endforeach
        </div>

        <div class="mt-4">
            {{ $products->links() }}
        </div>

        </div>
</x-app-layout>


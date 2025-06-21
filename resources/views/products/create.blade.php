<x-app-layout>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">

            <div class="mt-6 item-center justfy-between">
                <h2 class="font-semibold text-xl">Tambah Produk</h2>
            </div>

            <div class='mt -4'>
                <form method="post" action="{{ route('products.store') }}">
                    @csrf
                    <div class='mt-4'>
                        <x-input-label for="nama" :value="__('Nama')" />
                        <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="old('nama')" required />
                        <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                    </div>

    
                    <div class='mt-4'>
                        <x-input-label for="harga" :value="__('Harga')" />
                        <x-text-input id="harga" class="block mt-1 w-full" type="text" name="harga" :value="old('harga')" required />
                        <x-input-error :messages="$errors->get('harga')" class="mt-2" />
                    </div>

                     <div class='mt-4'>
                        <x-input-label for="deskripsi" :value="__('Deskripsi')" />
    
                        <textarea id="deskripsi" class="block mt-1 w-full" name="deskripsi" required>{{ old('deskripsi') }}</textarea>
    
                        <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                    </div>

                    <x-primary-button class="justify-center w-full mt-3">
                        {{ __('Submit') }}
                    </x-primary-button>

                </form>
            </div>

            




        </div>
</x-app-layout>


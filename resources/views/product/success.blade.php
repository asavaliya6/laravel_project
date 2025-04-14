<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product Create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-green-500 text-2xl font-bold mb-4">{{ $message }}</h3>

                    <h3 class="text-lg font-semibold mb-2">Product Details:</h3>
                    <ul class="list-disc pl-5">
                        <li><strong>Name:</strong> {{ $product->name }}</li>
                        <li><strong>Price:</strong> ${{ $product->price }}</li>
                        <li><strong>Description:</strong> {{ $product->description }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between w-full">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Products') }}
            </h2>
            <x-primary-anchor href="{{ route('products.index') }}">
                {{ __('Back') }}
            </x-primary-anchor>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="relative grid grid-cols-1 gap-6 sm:grid-cols-2">
                <div class="absolute z-20 top-3 left-3">
                    <x-primary-anchor href="{{ route('products.edit', $product) }}">
                        Edit
                    </x-primary-anchor>
                </div>
                <div class="border rounded-lg shadow-sm">
                    <div>
                        <div style="position: relative; width: 100%; padding-bottom: 56.25%;">
                            <div class="z-10 grid overflow-hidden text-sm text-gray-600 bg-gray-100 rounded-lg rounded-b-none ring-1 ring-gray-100/10 place-content-center"
                                style="position: absolute; inset: 0px;">
                                <img src="{{ $product->image }}" alt="{{ $product->name }}">
                            </div>
                        </div>
                    </div>
                    <div class="p-4 rounded-lg">
                        <p class="text-lg font-medium text-gray-800">
                            {{ $product->name }}
                        </p>
                        <p class="mt-2 mb-4 text-sm text-gray-600">
                            {{ $product->description }}
                        </p>
                    </div>
                </div>
                <div>
                    <x-primary-button class="justify-center w-full">
                        Add to cart
                    </x-primary-button>
                </div>
            </div>
        </div>
</x-app-layout>

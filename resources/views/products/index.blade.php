<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between w-full">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Products') }}
            </h2>
            <x-primary-anchor href="{{ route('products.create') }}">
                {{ __('Create Product') }}
            </x-primary-anchor>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($products as $product)
                <div class="border rounded-lg shadow-sm">
                    <a href="{{ route('products.show', $product) }}">
                        <div style="position: relative; width: 100%; padding-bottom: 56.25%;">
                            <div class="z-10 grid overflow-hidden text-sm text-gray-600 bg-gray-100 rounded-lg rounded-b-none ring-1 ring-gray-100/10 place-content-center"
                                style="position: absolute; inset: 0px;">
                                <img src="{{ $product->image }}" alt="{{ $product->name }}">
                            </div>
                        </div>
                    </a>
                    <div class="p-4 rounded-lg">
                        <div class="line-clamp-1">
                            <a class="text-lg font-medium text-gray-800" href="{{ route('products.show', $product) }}">
                                {{ $product->name }}
                            </a>
                        </div>
                        <div class="mt-2 mb-4 text-sm text-gray-600 line-clamp-2">
                            {{ $product->description }}
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-x-1">
                                <sup>Rp</sup> {{ number_format($product->price,0,',','.') }}
                            </div>
                            <div class="flex items-center text-xs tracking-tighter gap-x-4 text-muted-foreground">
                                <x-primary-anchor href="{{ route('products.show', $product) }}">
                                    {{ __('View') }}
                                </x-primary-anchor>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
            <div class="py-10">
                {{ $products->links() }}
            </div>
        </div>
</x-app-layout>

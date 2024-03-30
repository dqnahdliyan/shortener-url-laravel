<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between w-full">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Products') }}
            </h2>
            <x-primary-anchor href="{{ route('products.show', $product) }}">
                {{ __('Back') }}
            </x-primary-anchor>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <x-card>
                <header>
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Edit Product') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        {{ __("Edit a product and save it.") }}
                    </p>
                </header>

                <form class="mt-6 space-y-6" action="{{ route('products.update', $product) }}" method="post">
                    @csrf
                    @method('PUT')

                    @include('products._form')
                </form>
            </x-card>
        </div>
</x-app-layout>

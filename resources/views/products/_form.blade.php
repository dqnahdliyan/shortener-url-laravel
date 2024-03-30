<div>
    <x-input-label for="name" :value="__('Name')" />
    <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name', $product->name)"
        required autofocus />
    <x-input-error :messages="$errors->get('name')" class="mt-2" />
</div>

<div>
    <x-input-label for="name" :value="__('Price')" />
    <x-text-input id="price" class="block w-full mt-1" type="number" name="price" :value="old('price', $product->price)"
        required />
    <x-input-error :messages="$errors->get('price')" class="mt-2" />
</div>

<div>
    <x-input-label for="name" :value="__('Short URL')" />
    <div
        class="flex items-center w-full mt-1 overflow-hidden border border-gray-300 rounded-md shadow-sm bg-slate-200 focus-within:ring-1 focus-within:border-indigo-500 focus-within:ring-indigo-500">
        <span class="items-center px-3 text-gray-500 border select-none">{{ config('app.shortener_url').'/' }}</span>
        <input id="short_url" class="w-full border-none focus:ring-none" type="text" name="short_url"
            value="{{ old('short_url', $product->short_url) }}" />
    </div>

    <x-input-error :messages="$errors->get('short_url')" class="mt-2" />
</div>

<div>
    <x-input-label for="name" :value="__('Description')" />
    <x-textarea id="description" class="block w-full mt-1" name="description"
        :value="old('description', $product->description)" />
    <x-input-error :messages="$errors->get('price')" class="mt-2" />
</div>

<x-primary-button>
    Save
</x-primary-button>

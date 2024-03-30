<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Shortener;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query()->latest()->paginate(9);

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create', ['product' => new Product()]);
    }

    public function store(ProductRequest $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'slug' => str($request->name.'-'.str()->random(5))->slug(),
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return to_route('products.show', $product)->withSuccess('Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->update([
            'name' => $request->name,
            'slug' => str($request->name.'-'.str()->random(5))->slug(),
            'price' => $request->price,
            'description' => $request->description,
        ]);

        if (Shortener::whereUniqueKey($product->short_url)->exists()) {
            Shortener::whereUniqueKey($product->short_url)->delete();
        }

        tap(Shortener::query()->create([
            'original' => route('products.show', $product),
            'unique_key' => $unique_key = $request->short_url ?? str()->random(5).$product->id,
            'short' => config('app.shortener_url').'/'.$unique_key,
        ]), fn ($shortener) => $product->forceFill(['short_url' => $shortener->unique_key])->save());

        return to_route('products.show', $product)->withSuccess('Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return to_route('products.index')->withSuccess('Product deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        return view('product.create', ['categories' => Category::all()]);
    }

    public function store()
    {
        request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'numeric'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'image' => ['required', 'file', 'mimes:jpeg,jpg,svg|max:2048'],
        ]);

        Product::create([
           'name' => request('name'),
           'category_id' => request('category_id'),
           'user_id' => auth()->id(),
           'description' => request('description'),
           'price' => request('price'),
           'image' => request('image')->store('products.images'),
        ]);

        return redirect(route('home'));
    }

    public function edit(Product $id)
    {
        return view('product.edit', [
            'categories' => Category::all(),
            'product' => $id
        ]);
    }

    public function update(Product $product)
    {
        $attributes = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'image' => ['required', 'file', 'mimes:jpeg,jpg,svg|max:2048'],
        ]);

        if (request('image')) {
            $attributes['image'] = request('image')->store('images');
        }
        $product->update($attributes);

        return redirect(route('home'));
    }
}

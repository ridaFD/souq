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
//        dimensions:min_width=100,min_height=200
//        file|size:512
//        dd($_POST);
        Product::create([
           'name' => request('name'),
           'category_id' => request('category_id'),
           'user_id' => auth()->id(),
           'description' => request('description'),
           'price' => request('price'),
           'image' => $_FILES['image']['name'],
        ]);

        request('image')->store('images');

        return redirect(route('home'));
    }
}

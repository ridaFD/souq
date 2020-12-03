<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $items = array();
        foreach (session('cart') as $value) {
            $items[$value['id']] = $value['quantity'];
        }

        return view('cart.index', ['items' => $items]);
    }

    public function addToCart(Product $product)
    {
        $item = [
            'id' => $product->id,
            'name' => $product->name,
            'description' => $product->description,
            'price' => $product->price,
            'stock' => $product->stock,
            'image' => $product->image,
            'quantity' => request('quantity')
        ];

        if (session()->exists('cart')) {
            session()->push('cart', $item);
            $unique = array();

            foreach (session('cart') as $key => $value) {
                $unique[$value['id']] = $value;
            }
            session(['cart' => $unique]);

            $total_quantity = 0;
            $total_price = 0;
            foreach ($unique as $value) {
                $total_quantity += $value['quantity'];
                $total_price += $value['price'];
            }
            session(['total_quantity' => $total_quantity]);
            session(['total_price' => $total_price]);
        }

        return back();
    }

    public function destroy($product)
    {
        $unique = array();
        foreach (session('cart') as $key => $value) {
            $unique[$value['id']] = $value;
        }
        unset($unique[$product]);
        session(['cart' => $unique]);

        $total_quantity = 0;
        $total_price = 0;
        foreach ($unique as $value) {
            $total_quantity += $value['quantity'];
            $total_price += $value['price'];
        }
        session(['total_quantity' => $total_quantity]);
        session(['total_price' => $total_price]);

        return back();
    }
}

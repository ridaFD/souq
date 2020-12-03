<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PurchaseController extends Controller
{
    public function  __invoke($items)
    {
        $details = [
            'title' => 'Souq email activation',
            'body' => 'Hello Mr. Rida your account at Souq has been activated'
        ];

        Mail::to('ridafd7@gmail.com')->send(new \App\Mail\MyTestMail($details));


       $array = json_decode($items, true);
       foreach ($array as $key => $value) {
           $product = Product::findMany([$key]);

           // subtract the quantity order from the original stock in the database
           $stock = $product[0]->stock;
           $quantity = $value;
           $total = $stock - $quantity;

           $product[0]->stock = $total;
           $product[0]->save();
       }

        $unique = array();
        foreach (session('cart') as $key => $value) {
            $unique[$value['id']] = $value;
            unset($unique[$value['id']]);
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

        return redirect(route('home'));
    }
}

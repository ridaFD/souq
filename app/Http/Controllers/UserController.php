<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function create()
    {
        return view('user.create');
    }

    public function store()
    {
        request()->validate([
            'name' => ['string', 'required', 'max:255'],
            'email' => ['string', 'required', 'max:255', 'email', 'unique:users'],
            'password' => ['string', 'required', 'min:8', 'confirmed'],
            'tel' => ['string', 'required', 'min:9', 'max:9'],
            'address' => ['string', 'required', 'max:255'],
            'role' => ['string', 'required', 'max:255']
        ]);

        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'tel' => request('tel'),
            'address' => request('address'),
            'role' => request('role')
        ]);

        return redirect('/home');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Role;
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

    public function store(User $user)
    {
        request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'tel' => ['string', 'min:8', 'nullable'],
            'address' => ['string', 'max:255', 'nullable'],
            'role' => ['string', 'max:255', 'required']
        ]);

        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'tel' => request('tel'),
            'address' => request('address'),
            'role' => request('role')
        ]);

        return redirect(route('home'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Rule;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        return view('profile.show', ['user' => User::where('id', auth()->id())->get()]);
    }

    public function edit(User $user)
    {
        return view('profile.edit', ['user' => $user]);
    }

    public function update(User $user)
    {
        $attributes = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', \Illuminate\Validation\Rule::unique('users')->ignore($user)],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'tel' => ['string', 'min:8', 'nullable'],
            'address' => ['string', 'max:255', 'nullable'],
            'role' => ['string', 'max:255', 'required'],
        ]);

        $user->update($attributes);


        return redirect(route('profile'));
    }
}

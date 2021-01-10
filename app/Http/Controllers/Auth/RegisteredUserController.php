<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller {

    public function create() {
        return view('auth.register');
    }

    public function store(Request $request) {
        $request->validate([
            'name'       => 'required|string|max:255',
            'first_name' => 'string|max:255',
            'last_name'  => 'string|max:255',
            'email'      => 'required|string|email|max:255|unique:users',
            'password'   => 'required|string|confirmed|min:8',
        ]);

        $user = User::create([
            'name'       => $request->name,
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
        ]);

        $user->roles()->attach(Role::select('id')->where('name', 'customer')->first());
        Auth::login($user);

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}

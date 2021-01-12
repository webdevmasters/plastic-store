<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller {

    public function create() {
        return view('auth.login');
    }

    public function store(LoginRequest $request) {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function show() {
        return view('auth.my-account')->with('user', auth()->user());
    }

    public function updateUserDetails(Request $request, $id) {
        $request->validate([
            'name'       => 'required|string|max:255',
            'first_name' => 'nullable|string|max:255',
            'last_name'  => 'nullable|string|max:255',
            'zip_code'   => 'nullable|numeric|digits:5',
            'address'    => 'nullable|string|max:255',
            'city'       => 'nullable|string|max:20',
            'phone'      => 'nullable|numeric|digits_between:9,12',
            'email'      => 'required|string|email|max:255'
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->phone = $request->get('phone');
        $user->city = $request->get('city');
        $user->address = $request->get('address');
        $user->zip_code = $request->get('zip_code');
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->save();

        return back()->with('message', 'Uspesno ste izmenili podatke');
    }

    public function destroy(Request $request) {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

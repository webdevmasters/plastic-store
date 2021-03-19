<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class AdminUserController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('admin.user.index')->with('users', User::with('orders')->get());
    }

    public function show($id) {
        return view('admin.user.show')->with('user', User::findOrFail($id));
    }

    public function destroy($id) {
        User::destroy($id);
        return redirect()->route('admin.users.index');
    }
}

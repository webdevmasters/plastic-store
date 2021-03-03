<?php


namespace App\Repositories\interfaces;


use Illuminate\Http\Request;

interface CartInterface {

    public function store(Request $request);

    public function destroyFromMiniCart($id);

    public function destroyFromCart($id);

    public function index();

    public function updateMiniCart($id, $quantity);
}

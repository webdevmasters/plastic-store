<?php

namespace App\Http\Controllers;

use App\Repositories\interfaces\CartInterface;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller {

    public $cartRepository;

    public function __construct(CartInterface $cartRepository) {
         $this->cartRepository = $cartRepository;
    }

    public function store(Request $request) {
        return $this->cartRepository->store($request);
    }

    public function destroyFromMiniCart($id) {
        return $this->cartRepository->destroyFromMiniCart($id);
    }

    public function destroyFromCart($id) {
        return $this->cartRepository->destroyFromCart($id);
    }

    public function index() {
        return $this->cartRepository->index();
    }

    public function updateMiniCart($id, $quantity) {
        return $this->cartRepository->updateMiniCart($id, $quantity);
    }
}

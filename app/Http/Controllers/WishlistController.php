<?php

namespace App\Http\Controllers;

use App\Repositories\interfaces\WishlistInterface;
use Illuminate\Http\Request;

class WishlistController extends Controller {
    public $wishlistRepository;

    public function __construct(WishlistInterface $wishlistRepository) {
        $this->wishlistRepository = $wishlistRepository;
    }

    public function index() {
        return $this->wishlistRepository->index();
    }

    public function destroyFromWishlist($id) {
        return $this->wishlistRepository->destroyFromWishlist($id);
    }


    public function store(Request $request) {
        return $this->wishlistRepository->store($request);
    }
}

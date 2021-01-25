<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Repositories\OrderInterface;

class OrderController extends Controller {

    public $orderRepository;

    public function __construct(OrderInterface $orderRepository) {
        $this->orderRepository = $orderRepository;
    }

    public function store(OrderRequest $request) {
        return $this->orderRepository->store($request);
    }

    public function create() {
       return $this->orderRepository->create();
    }

    public function show($id) {
        return $this->orderRepository->show($id);
    }

    public function cancel($id) {
        return $this->orderRepository->cancel($id);
    }

    public function confirmOrder($id) {
        return view('webapp.order.order_confirmation')->with('order',Order::findOrFail($id));
    }
}

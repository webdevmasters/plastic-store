<?php

namespace App\Http\Controllers;

use App\Enums\OrderPayment;
use App\Enums\OrderStatus;
use App\Http\Requests\OrderRequest;
use App\Mail\OrderReceived;
use App\Models\Order;
use App\Models\OrderItem;
use App\Repositories\interfaces\OrderInterface;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller {

    public function store(OrderRequest $request) {
        $order = Order::create([
            'order_number' => strtoupper(uniqid()),
            'user_id'      => auth()->check() ? auth()->user()->getAuthIdentifier() : null,
            'status'       => OrderStatus::ORDERED,
            'total'        => Cart::getTotal(),
            'items'        => Cart::getContent()->count(),
            'payment'      => OrderPayment::CASH_ON_DELIVERY,
            'first_name'   => $request->first_name,
            'last_name'    => $request->last_name,
            'email'        => $request->email,
            'address'      => $request->address,
            'city'         => $request->city,
            'country'      => $request->country,
            'zip_code'     => $request->zip_code,
            'phone'        => $request->phone,
            'notes'        => $request->notes,
        ]);

        if($order) {
            foreach(Cart::getContent() as $item) {
                $orderItem = new OrderItem([
                    'product_id' => $item->associatedModel->id,
                    'quantity'   => $item->quantity,
                    'price'      => $item->price,
                    'size'       => $item->attributes->size,
                    'color_name' => $item->attributes->color_name,
                ]);

                $order->items()->save($orderItem);
            }
        }
        Mail::to($order->email)->send(new OrderReceived($order));

        Cart::clear();

        return $order->id;
    }

    public function create() {
        return view('webapp.order.create')->with('user', auth()->user());
    }

    public function show($id) {
        return view('webapp.order.order_details')->with('items', Order::findOrFail($id)->items()->get());
    }

    public function cancel($id) {
        Order::where('id', $id)->update(['status' => OrderStatus::CANCELED]);

        return view('auth.my-account')->with('user', auth()->user())->with('active_tab', 'orders_panel');
    }

    public function confirmOrder($id) {
        return view('webapp.order.order_confirmation')->with('order', Order::findOrFail($id));
    }
}

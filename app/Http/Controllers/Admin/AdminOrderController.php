<?php

namespace App\Http\Controllers\Admin;

use App\Enums\OrderStatus;
use App\Mail\OrderConfirmed;
use App\Models\Order;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;

class AdminOrderController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('admin.order.index')->with('orders', Order::all());
    }

    public function showCustomerOrderDetails($id) {
        return view('admin.order.customer_details')->with('order', Order::findOrFail($id));
    }

    public function confirmOrder($id) {
        Order::where('id', $id)->update(['status' => OrderStatus::SENT]);
        $order = Order::findOrFail($id);
        Mail::to($order->email)->send(new OrderConfirmed($order));

        return redirect()->route('admin.orders.index');
    }

    public function show($id) {
        $order = Order::where('id', $id)->first();

        return view('admin.order.show')->with('order', $order);
    }

    public function destroy($id) {
        Order::destroy($id);

        return redirect()->route('admin.orders.index');
    }
}

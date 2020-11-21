<?php

namespace App\Http\Controllers;

use App\Mail\OrderAdded;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function index()
    {
        $orders = (new Order)->getAllUserOrdersWithPaginate(auth()->id(), 6);
        $ordersAll = (new Order)->getAllUserOrders(auth()->id());

        $sum = 0;

        if (count($ordersAll)) {
            foreach ($ordersAll as $order) {
                $sum += $order->product->price;
            }
        }

        return view('pages.cart', [
            'orders' => $orders,
            'sum' => $sum
        ]);
    }

    function add(Product $product)
    {
        $order = new Order();
        $order->product_id = $product->id;
        $order->user_id = auth()->id();
        $order->save();

        $recipients = User::where('is_admin', true)->get();

        //TODO if empty $recipients throw new exception

        if (!empty($recipients)) {
            foreach ($recipients as $recipient) {
                Mail::to($recipient->email)->send(new OrderAdded($order));
            }
        }

        return redirect()->back();
    }
}

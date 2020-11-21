<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function show()
    {
        return view('admin.orders.index')
            ->with('orders', Order::with(['product', 'user'])->paginate(10));
    }
}

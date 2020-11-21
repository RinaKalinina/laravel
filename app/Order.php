<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function getAllUserOrders($userId)
    {
        return Order::with('product')
            ->where('user_id', $userId)
            ->where('payment_state', false)
            ->where('status', true)
            ->get();
    }

    public function getAllUserOrdersWithPaginate($userId, $paginate)
    {
        return Order::with('product')
            ->where('user_id', $userId)
            ->where('payment_state', false)
            ->where('status', true)
            ->paginate($paginate);
    }
}

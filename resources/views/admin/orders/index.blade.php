@extends('layouts.admin')
@section('title', 'Orders')

@section('content')
    <div class="content-head__container">
        <div class="content-head__title-wrap">
            <div class="content-head__title-wrap__title bcg-title">
                Заказы
            </div>
        </div>
    </div>

    <div class="content-main__container">
        <div class="cart-product-list">
            <div class="cart-product-list__item">
                <div>id</div>
                <div class="cart-product__item__product-name">Имя товара</div>
                <div class="cart-product__item__cart-date">Дата</div>
                <div class="cart-product__item__cart-date">Имя пользователя</div>
                <div class="cart-product__item__product-price">Цена</div>
            </div>

            @forelse($orders as $order)
                <div class="cart-product-list__item">
                    <div>{{$order->id}}</div>
                    <div class="cart-product__item__product-name">{{$order->product->name}}</div>
                    <div class="cart-product__item__cart-date">{{$order->product->getDate()}}</div>
                    <div class="cart-product__item__cart-date">{{$order->user->name}}</div>
                    <div class="cart-product__item__product-price">
                        {{$order->product->price}} руб
                    </div>
                </div>
            @empty
                Нет заказов
            @endforelse
        </div>
    </div>

    {{ $orders->links() }}
@endsection

@extends('layouts.app')
@section('title', 'Cart')

@section('content')
    <div class="content-middle">
        <div class="content-head__container">
            <div class="content-head__title-wrap">
                <div class="content-head__title-wrap__title bcg-title">Мои заказы</div>
            </div>
            @include('elements.search')
        </div>
        <div class="content-main__container">
            <div class="cart-product-list">
                @forelse($orders as $order)
                    <div class="cart-product-list__item">
                        <div class="cart-product__item__product-photo">
                            <img src="{{$order->product->getImg()}}"
                                 class="cart-product__item__product-photo__image">
                        </div>
                        <div class="cart-product__item__product-name">
                            <div class="cart-product__item__product-name__content">
                                <a href="#">{{$order->product->name}}</a>
                            </div>
                        </div>
                        <div class="cart-product__item__cart-date">
                            <div class="cart-product__item__cart-date__content">
                                {{$order->product->getDate()}}
                            </div>
                        </div>
                        <div class="cart-product__item__product-price">
                            <span class="product-price__value">{{$order->product->price}} рублей</span>
                        </div>
                    </div>
                @empty
                    <p>В корзине нет товаров</p>
                @endforelse


                @if(count($orders))
                    <div class="cart-product-list__result-item">
                        <div class="cart-product-list__result-item__text">Итого</div>
                        <div class="cart-product-list__result-item__value">
                            {{$sum}} рублей
                        </div>
                    </div>
                @endif
            </div>


        </div>

        {{ $orders->links() }}

        @if(count($orders))
            <div class="content-footer__container">
                <div class="btn-buy-wrap">
                    <a href="#" class="btn-buy-wrap__btn-link">
                        Перейти к оплате
                    </a>
                </div>
            </div>
            <br><br>
        @endif
    </div>
@endsection

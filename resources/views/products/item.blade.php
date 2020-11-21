@extends('layouts.app')
@section('title', 'Product')

@section('content')
    <div class="content-middle">
        <div class="content-head__container">
            <div class="content-head__title-wrap">
                <div class="content-head__title-wrap__title bcg-title">
                    {{$product->name}} в разделе {{$product->category->name}}
                </div>
            </div>
            @include('elements.search')
        </div>
        <div class="content-main__container">
            <div class="product-container">
                <div class="product-container__image-wrap">
                    <img src="{{$product->getImg()}}"
                         class="image-wrap__image-product">
                </div>
                <div class="product-container__content-text">
                    <div class="product-container__content-text__title">{{$product->name}}</div>
                    <div class="product-container__content-text__price">
                        <div class="product-container__content-text__price__value">
                            Цена: <b>{{$product->price}}</b>
                            руб
                        </div>
                        @auth
                            <a href="{{route('cart.product.add', $product)}}"
                               class="btn btn-blue">Купить</a>
                        @endauth
                    </div>
                    <div class="product-container__content-text__description">
                        {{$product->description}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('elements.content.bottom')
@endsection


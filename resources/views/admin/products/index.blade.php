@extends('layouts.admin')
@section('title', 'Products')

@section('content')
    <div class="content-head__container">
        <div class="content-head__title-wrap">
            <div class="content-head__title-wrap__title bcg-title">
                Товары
            </div>
        </div>
    </div>

    <div class="content-main__container">
        <div><a href="{{route('admin.products.create')}}" class="btn">Добавить товар</a></div>
        <br>
        <div class="cart-product-list">
            @forelse($products as $product)
                <div class="cart-product-list__item">
                    <div class="">{{$product->id}}</div>
                    <div class="cart-product__item__product-name">{{$product->name}}</div>
                    <div class="cart-product__item__cart-date">
                        <a href="{{route('admin.products.edit', $product)}}" class="btn">
                            Редактировать
                        </a>
                    </div>
                    <div class="cart-product__item__cart-date">
                        <a href="{{route('admin.products.destroy', $product->id)}}"
                           class="btn btn-red">
                            Удалить
                        </a>
                    </div>
                </div>
            @empty
                Нет заказов
            @endforelse
        </div>
    </div>
    {{ $products->links() }}
@endsection

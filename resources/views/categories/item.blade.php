@extends('layouts.app')
@section('title', 'Category')

@section('content')
    <div class="content-middle">
        <div class="content-head__container">
            <div class="content-head__title-wrap">
                <div class="content-head__title-wrap__title bcg-title">
                    Игры в разделе {{$category->name}}
                </div>
            </div>
            @include('elements.search')
        </div>
        <div class="content-main__container">
            <div class="products-category__list">
                @forelse($products as $product)
                    <div class="products-category__list__item">
                        <div class="products-category__list__item__title-product">
                            <a href="{{route('categories.product.show', [
                            'category' => $category, 'product' => $product
                            ])}}">
                                {{$product->name}}
                            </a>
                        </div>
                        <div class="products-category__list__item__thumbnail">
                            <a href="{{route('categories.product.show', [
                            'category' => $category, 'product' => $product
                            ])}}"
                               class="products-category__list__item__thumbnail__link">
                                <img src="{{$product->getImg()}}"
                                     alt="{{$product->name}}">
                            </a>
                        </div>
                        <div class="products-category__list__item__description">
                            <span class="products-price">{{$product->price}} руб.</span>
                            @auth
                                <a href="{{route('cart.product.add', $product)}}"
                                   class="btn btn-blue">Купить</a>
                            @endauth
                        </div>
                    </div>
                @empty
                    <p>No products</p>
                @endforelse
            </div>
        </div>

        {{ $products->links() }}

    </div>
@endsection

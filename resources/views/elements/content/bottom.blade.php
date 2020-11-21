<div class="content-bottom">
    <div class="line"></div>
    <div class="content-head__container">
        <div class="content-head__title-wrap">
            <div class="content-head__title-wrap__title bcg-title">Посмотрите наши товары</div>
        </div>
    </div>
    <div class="content-main__container">
        <div class="products-columns">
            @foreach($productsLimit as $product)
                <div class="products-columns__item">
                <div class="products-columns__item__title-product">
                    <a href="{{route('categories.product.show', [
                            'category' => $product->category, 'product' => $product
                            ])}}" class="products-columns__item__title-product__link">
                        {{$product->name}}
                    </a>
                </div>
                <div class="products-columns__item__thumbnail">
                    <a href="{{route('categories.product.show', [
                            'category' => $product->category, 'product' => $product
                            ])}}" class="products-columns__item__thumbnail__link">
                        <img src="{{$product->getImg()}}"
                             alt="{{$product->name}}"
                             class="products-columns__item__thumbnail__img">
                    </a>
                </div>
                <div class="products-columns__item__description">
                    <span class="products-price">{{$product->price}} руб</span>
                    @auth
                        <a href="{{route('cart.product.add', $product)}}"
                           class="btn btn-blue">Купить</a>
                    @endauth
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

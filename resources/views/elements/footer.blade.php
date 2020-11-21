<footer class="footer">
    <div class="footer__footer-content">
        <div class="random-product-container">
            <div class="random-product-container__head">Случайный товар</div>
            <div class="random-product-container__content">
                <div class="item-product">
                    <div class="item-product__title-product">
                        <a href="{{route('categories.product.show', [
                            'category' => $productRandom->category, 'product' => $productRandom
                            ])}}" class="item-product__title-product__link">
                            {{$productRandom->name}}
                        </a>
                    </div>
                    <div class="item-product__thumbnail">
                        <a href="{{route('categories.product.show', [
                            'category' => $productRandom->category, 'product' => $productRandom
                            ])}}" class="item-product__thumbnail__link">
                            <img src="{{$productRandom->getImg()}}"
                                 alt=" {{$productRandom->name}}"
                                 class="item-product__thumbnail__link__img">
                        </a>
                    </div>
                    <div class="item-product__description">
                        <div class="item-product__description__products-price">
                            <span class="products-price">{{$productRandom->price}} руб</span>
                        </div>
                        @auth
                            <div class="item-product__description__btn-block">
                                <a href="{{route('cart.product.add', $productRandom)}}"
                                   class="btn btn-blue">Купить</a>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__footer-content__main-content">
            {{$productRandom->description}}
        </div>
    </div>
    <div class="footer__social-block">
        <ul class="social-block__list bcg-social">
            <li class="social-block__list__item">
                <a href="#" class="social-block__list__item__link">
                    <i class="fa fa-facebook"></i>
                </a>
            </li>
            <li class="social-block__list__item">
                <a href="#" class="social-block__list__item__link">
                    <i class="fa fa-twitter"></i>
                </a>
            </li>
            <li class="social-block__list__item">
                <a href="#" class="social-block__list__item__link">
                    <i class="fa fa-instagram"></i>
                </a>
            </li>
        </ul>
    </div>
</footer>

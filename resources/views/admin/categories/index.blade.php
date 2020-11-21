@extends('layouts.admin')
@section('title', 'Categories')

@section('content')
    <div class="content-head__container">
        <div class="content-head__title-wrap">
            <div class="content-head__title-wrap__title bcg-title">
                Категории
            </div>
        </div>
    </div>

    <div class="content-main__container">
        <div><a href="{{route('admin.categories.create')}}" class="btn">Добавить категорию</a></div>
        <br>
        <div class="cart-product-list">
            @forelse($categories as $category)
                <div class="cart-product-list__item">
                    <div class="">{{$category->id}}</div>
                    <div class="cart-product__item__product-name">{{$category->name}}</div>
                    <div class="cart-product__item__cart-date">
                        <a href="{{route('admin.categories.edit', $category)}}" class="btn">
                            Редактировать
                        </a>
                    </div>
                    <div class="cart-product__item__cart-date">
                        <a href="{{route('admin.categories.destroy', $category->id)}}"
                           class="btn btn-red">
                            Удалить
                        </a>
                    </div>
                </div>
            @empty
                Нет категорий
            @endforelse
        </div>
    </div>
    {{ $categories->links() }}
@endsection

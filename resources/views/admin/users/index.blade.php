@extends('layouts.admin')
@section('title', 'Users')

@section('content')
    <div class="content-head__container">
        <div class="content-head__title-wrap">
            <div class="content-head__title-wrap__title bcg-title">
                Пользователи
            </div>
        </div>
    </div>

    <div class="content-main__container">
        <div class="cart-product-list">
            @forelse($users as $user)
                <div class="cart-product-list__item">
                    <div class="">{{$user->id}}</div>
                    <div class="cart-product__item__product-name">{{$user->name}}</div>
                    <div class="cart-product__item__product-name">{{$user->email}}</div>
                    <div class="cart-product__item__cart-date">
                        <a href="{{route('admin.users.edit', $user)}}" class="btn">
                            Редактировать
                        </a>
                    </div>
                </div>
            @empty
                Нет пользователей
            @endforelse
        </div>
    </div>
    {{ $users->links() }}
@endsection

<?php

namespace App\Providers;

use App\Order;
use App\Product;
use Illuminate\Support\ServiceProvider;
use App\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Illuminate\Database\Schema\Builder::defaultStringLength(191);


        //TODO FATAL view share дает ошибку при первом запуске миграций решить!!!!
        view()->share('categories', Category::where('status', true)->limit(5)->get());
        view()->share('productRandom', Product::where('status', true)->inRandomOrder()->first());
        view()->share('productsLimit', Product::with(['category'])
            ->where('status', true)
            ->limit(3)
            ->get());

        //TODO Сервис контейнер не знает о зарегестрированном пользователе. Решить данную проблему
        //   view()->share('countOrders', Order::where('user_id', auth()->id())->count());
    }
}

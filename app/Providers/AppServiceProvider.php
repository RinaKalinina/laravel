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

        view()->composer('elements.sidebar', function ($view) {
            $view->with('categories', Category::where('status', true)->limit(5)->get());
        });

        view()->composer('elements.footer', function ($view) {
            $view->with('productRandom', Product::where('status', true)->inRandomOrder()->first());
        });

        view()->composer('elements.content.bottom', function ($view) {
            $view->with('productsLimit', Product::with(['category'])
                ->where('status', true)
                ->limit(3)
                ->get());
        });

        view()->composer('elements.header', function ($view) {
            $view->with('countOrders', Order::where('user_id', auth()->id())
                ->where('payment_state', false)
                ->where('status', true)
                ->count());
        });
    }
}

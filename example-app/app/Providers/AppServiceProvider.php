<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Sliders;
use App\Cart;
use App\Menus;
use Session;

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
        view()->composer('layout.slider',function($view){
            $slider = sliders::all();
            $view->with('slider',$slider);
        });

        view()->composer('layout.header',function($view){
            $menu = Menus::all();
            $view->with('menu',$menu);
        });

        view()->composer(['layout.header','layout.cart'],function($view){
            if(Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
            
            }
        });
    }
}

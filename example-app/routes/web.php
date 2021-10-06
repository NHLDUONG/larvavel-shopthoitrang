<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Giao Diện
Route::get('index','PagesController@index');
Route::get('contact','ContactController@getlienhe');
Route::post('contact','ContactController@postlienhe');
Route::get('mail/send', 'SendmailController@sendMail');
Route::get('about','PagesController@about');
Route::get('blog','PagesController@blog');
Route::get('product','PagesController@product');
Route::get('product-women','PagesController@productwomen');
Route::get('product-men','PagesController@productmen');
Route::get('product-detail/{id}','PagesController@getChitiet');
Route::get('shoping-cart','PagesController@shopingcart');
Route::get('blog-detail','PagesController@blogdetail');

Route::get('signin',[
    'as'=>'singin',
    'uses'=>'AuthController@getSignin'
]);

Route::post('signin',[
    'as'=>'singin',
    'uses'=>'AuthController@postSignin'
]);
Route::get('login',[
    'as'=>'login',
    'uses'=>'AuthController@getLogin'
]);
Route::get('logout',[
    'as'=>'logiut',
    'uses'=>'AuthController@getLogout'
]);

Route::post('dang-nhap',[
    'as'=>'login',
    'uses'=>'AuthController@postLogin'
]);

Route::get('dat-hang', [
    'as'=>'dathang',
    'uses'=>'PagesController@getCheckout'
]);

Route::post('dat-hang', [
    'as'=>'dathang',
    'uses'=>'PagesController@postCheckout'
]);

Route::get('add-to-cart/{id}', [
    'as'=>'themgiohang',
    'uses'=>'PagesController@getAddtoCart'
]);
Route::get('getproduct/{id}', 'PagesController@getProduct'); //khi bấm vào quick view nó sẽ chạy vào cái route này và nhảy dến pagesController rồi vào hàm getProduct 

Route::get('add-to-like/{id}', [
    'as'=>'likegiohang',
    'uses'=>'PagesController@getAddtoLike'
]);

Route::get('getLike/{id}', 'PagesController@getLike'); 

Route::get('del-cart/{id}', [
    'as'=>'xoagiohang',
    'uses'=>'PagesController@getDelItemCart'
]);

Route::get('search',[
    'as'=>'search',
    'uses'=>'PagesController@getsearch'
]);

//Admin
Route::get('admin/login','AdminController@getlogin');
Route::post('admin/login','AdminController@postlogin');
Route::get('admin/danhsach','AdminController@getDanhSach');
Route::get('admin/home','AdminController@home');

Route::group(['prefix'=>'admin'],function(){
    Route::group(['prefix'=>'slide'],function(){
        //admin/slide/list 
        Route::get('list','SlideController@getSlide');

        Route::get('edit/{id}','SlideController@getEditSlide');
        Route::post('edit/{id}','SlideController@postEditSlide');

        Route::get('add','SlideController@getThem');
        Route::post('add','SlideController@postThem');
        
        Route::get('delete/{id}','SlideController@getXoa');
        
    });
});

// Route::group(['prefix'=>'admin'],function(){
//     Route::group(['prefix'=>'donhang'],function(){
//         //admin/slide/danhsach 
//         Route::get('danhsach','CartController@getdanhsach');

//         Route::get('edit/{id}','AdminController@getEditSlide');
//         Route::post('edit/{id}','AdminController@postEditSlide');

//         Route::get('add','AdminController@getThem');
//         Route::post('add','AdminController@postThem');
        
//         Route::get('delete/{id}','AdminController@getXoa');
        
//     });
// });



Route::resource('wishlist', 'WishlistController', ['except' => ['create', 'edit', 'show', 'update']]);












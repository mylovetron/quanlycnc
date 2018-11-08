<?php

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
    return view('user2.index');
});


Route::group(['prefix'=>'admin'],function (){
    Route::group(['prefix'=>'cate'],function (){
        Route::get('add',['as'=>'admin.cate.getAdd','uses'=>'CateController@getAdd']);
        Route::post('add',['as'=>'admin.cate.postAdd','uses'=>'CateController@postAdd']);
        Route::get('list',['as'=>'admin.cate.getList','uses'=>'CateController@getList']);
        Route::get('delete/{id}',['as'=>'admin.cate.getDelete','uses'=>'CateController@getDelete']);
        Route::get('edit/{id}',['as'=>'admin.cate.getEdit','uses'=>'CateController@getEdit']);
        Route::post('edit/{id}',['as'=>'admin.cate.postEdit','uses'=>'CateController@postEdit']);

    });

    Route::group(['prefix'=>'product'],function (){
        Route::get('add',['as'=>'admin.product.getAdd','uses'=>'ProductController@getAdd']);
        Route::post('add',['as'=>'admin.product.postAdd','uses'=>'ProductController@postAdd']);
        Route::get('list',['as'=>'admin.product.getList','uses'=>'ProductController@getList']);
        Route::get('delete/{id}',['as'=>'admin.product.getDelete','uses'=>'ProductController@getDelete']);
        Route::get('edit/{id}',['as'=>'admin.product.getEdit','uses'=>'ProductController@getEdit']);
        Route::post('edit/{id}',['as'=>'admin.product.postEdit','uses'=>'ProductController@postEdit']);
        Route::get('delimg/{id}',['as'=>'admin.product.getDelImg','uses'=>'ProductController@getDelImg']);
    });
    
});

//Route::get('/','WelcomeController@index');
     
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('loai_san_pham/{id}',['as'=>'loaisanpham','uses'=>'WelcomeController@loaisanpham']);
Route::get('chi-tiet-san-pham/{id}',['as'=>'chitietsanpham','uses'=>'WelcomeController@chitietsanpham']);
Route::get('mua-hang/{id}',['as'=>'muahang','uses'=>'WelcomeController@muahang']);
Route::get('gio-hang',['as'=>'giohang','uses'=>'WelcomeController@giohang']);
Route::get('xoa-san-pham/{id}',['as'=>'xoasanpham','uses'=>'WelcomeController@xoasanpham']);
Route::get('cap-nhat/{id}/{qty}',['as'=>'capnhat','uses'=>'WelcomeController@capnhat']);
Route::get('dat-hang',['as'=>'dathang','uses'=>'WelcomeController@getcheckout']);
Route::post('dat-hang',['as'=>'dathang','uses'=>'WelcomeController@postcheckout']);
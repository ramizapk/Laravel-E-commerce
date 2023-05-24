<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin;
use App\Http\Controllers\admin\BrandsController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\SubcategoriesController;
use App\Http\Controllers\admin\ProductsController;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\OrdersControlller;
use App\Http\Controllers\site\indexController;
use App\Http\Services\Payment;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['domain' => 'admin.market.local'], function()
{
    //admin index and auth pages
    Route::get('/',[AuthController::class,'login'])->middleware('isAdminAlreadyLoggedIn')->name('admin.login');
    Route::get('/login',[AuthController::class,'login'])->middleware('isAdminAlreadyLoggedIn')->name('admin.login');

    Route::post('/check',[AuthController::class,'check'])->middleware('isAdminAlreadyLoggedIn')->name('admin.login.check');
    Route::get('/index',[AuthController::class,'adminProfile'])->middleware('isAdminLogged')->name('admin.index');
    Route::get('/logout',[AuthController::class,'logout'])->middleware('isAdminLogged')->name('admin.logout');


 
    //brands 
    Route::get('/brands',[BrandsController::class,'show'])->middleware('isAdminLogged')->name('admin.brands.show');
    Route::get('/brands/add',[BrandsController::class,'add'])->middleware('isAdminLogged')->name('admin.brands.add');

    Route::post('/brands/save',[BrandsController::class,'storeData'])->middleware('isAdminLogged')->name('admin.brands.save');
    Route::get('/brands/edit/{id}',[BrandsController::class,'edit'])->middleware('isAdminLogged')->name('admin.edit.edit');
    Route::post('/brands/saveEdit/{brand_id}',[BrandsController::class,'saveEdit'])->middleware('isAdminLogged')->name('admin.brands.saveEdit');
    //ajax
    Route::get('/ajax/brands/delete/{id}',[BrandsController::class,'delete'])->middleware('isAdminLogged')->name('admin.brands.delete');
    Route::get('/ajax/brands/display/{id}',[BrandsController::class,'display'])->middleware('isAdminLogged')->name('admin.brands.display');

    //categories
    Route::get('/categories',[CategoriesController::class,'show'])->middleware('isAdminLogged')->name('admin.categories.show');
    Route::get('/categories/add',[CategoriesController::class,'add'])->middleware('isAdminLogged')->name('admin.categories.add');
    Route::post('/categories/save',[CategoriesController::class,'storeData'])->middleware('isAdminLogged')->name('admin.categories.save');
    Route::get('/categories/edit/{id}',[CategoriesController::class,'edit'])->middleware('isAdminLogged')->name('admin.categories.edit');
    Route::post('/categories/saveEdit/{sect_id}',[CategoriesController::class,'saveEdit'])->middleware('isAdminLogged')->name('admin.categories.saveEdit');
    //ajax
    Route::get('/ajax/categories/delete/{id}',[CategoriesController::class,'delete'])->middleware('isAdminLogged')->name('admin.categories.delete');
    Route::get('/ajax/categories/display/{id}',[CategoriesController::class,'display'])->middleware('isAdminLogged')->name('admin.categories.display');

    //subcategories
    Route::get('/subcategories/{id}',[SubcategoriesController::class,'show'])->middleware('isAdminLogged')->name('admin.subcategories.show');
    Route::get('/subcategories/add/{id}',[SubcategoriesController::class,'add'])->middleware('isAdminLogged')->name('admin.subcategories.add');
    Route::post('/subcategories/save/{sect_id}',[SubcategoriesController::class,'storeData'])->middleware('isAdminLogged')->name('admin.subcategories.save');
    Route::get('/subcategories/edit/{id}',[SubcategoriesController::class,'edit'])->middleware('isAdminLogged')->name('admin.subcategories.edit');
    Route::post('/subcategories/saveEdit/{cate_id}',[SubcategoriesController::class,'saveEdit'])->middleware('isAdminLogged')->name('admin.subcategories.saveEdit');
    //ajax
    Route::get('/ajax/subcategories/delete/{id}',[SubcategoriesController::class,'delete'])->middleware('isAdminLogged')->name('admin.subcategories.delete');
    Route::get('/ajax/subcategories/display/{id}',[SubcategoriesController::class,'display'])->middleware('isAdminLogged')->name('admin.subcategories.display');
    //ajax for products to get subcategories
    Route::get('ajax/subcategories/{id}',[SubcategoriesController::class,'ajaxGetSubById'])->middleware('isAdminLogged')->name('admin.ajax.subcategories.show');


    //products
    Route::get('/products',[ProductsController::class,'show'])->middleware('isAdminLogged')->name('admin.products.show');
    Route::get('/products/add',[ProductsController::class,'add'])->middleware('isAdminLogged')->name('admin.products.add');
    Route::post('/products/save',[ProductsController::class,'storeData'])->middleware('isAdminLogged')->name('admin.products.save');
    Route::get('/products/edit/{id}',[ProductsController::class,'edit'])->middleware('isAdminLogged')->name('admin.products.edit');
    Route::post('/products/saveEdit/{prod_id}',[ProductsController::class,'saveEdit'])->middleware('isAdminLogged')->name('admin.products.saveEdit');
    //ajax
    Route::get('/ajax/products/delete/{id}',[ProductsController::class,'delete'])->middleware('isAdminLogged')->name('admin.products.delete');
    Route::get('/ajax/products/display/{id}',[ProductsController::class,'display'])->middleware('isAdminLogged')->name('admin.products.display');


    //orders 
    Route::get('/orders/show',[OrdersControlller::class,'show'])->middleware('isAdminLogged')->name('admin.orders.show');
    Route::get('/order/info/{id}',[OrdersControlller::class,'showOrdersInfo'])->middleware('isAdminLogged')->name('admin.orders.info');

});


Route::group(['domain' => 'market.local'], function(){

    Route::get('/','App\Http\Controllers\site\indexController@index')->name('site.index.show');
    Route::get('/categories/all','App\Http\Controllers\site\CategoriesController@index')->name('site.categories.show');
    Route::get('/categories/{id}','App\Http\Controllers\site\SubcategoriesController@index')->name('site.subcategories.show');
    Route::get('/categories/{id}/products','App\Http\Controllers\site\ProductsController@getProductBySubCategory')->name('site.Products.ShowBySubCategories');
    Route::get('/categories/{id}/products/all','App\Http\Controllers\site\ProductsController@getProductByCategory')->name('site.Products.ShowByCategories');
    Route::get('/brands/{id}/products','App\Http\Controllers\site\ProductsController@getProductByBrand')->name('site.Products.ShowByBrands');
    Route::get('/allproducts','App\Http\Controllers\site\ProductsController@getAllProducts')->name('site.Products.all');


    //search 
    // Route::get('/ajax/search/{name}', function(){
    //     return 'asas';
    // });
    Route::get('/ajax/search/{name}','App\Http\Controllers\site\SearchControlller@search')->name('search');

    //product
    Route::get('/product/{id}','App\Http\Controllers\site\ProductsController@getProductInfo')->name('site.Product.show');
  

    //users
    //user auth
    
    Route::get('/login','App\Http\Controllers\site\AuthController@login')->name('user.auth.login');

    Route::post('/check','App\Http\Controllers\site\AuthController@check')->name('user.auth.check');

    Route::get('/logout','App\Http\Controllers\site\AuthController@logout')->name('user.auth.logout');
    Route::get('/signup','App\Http\Controllers\site\AuthController@sginup')->name('user.auth.sginup');
   

    //ajax

    Route::get('/ajax/addtocart/{prod_id}','App\Http\Controllers\site\usersaction\CartController@addToCart')->name('user.cart.add');
    Route::get('/user/cart','App\Http\Controllers\site\usersaction\CartController@showCartItems')->name('user.cart.show');
    Route::get('/ajax/deletCartItems/{prod_id}','App\Http\Controllers\site\usersaction\CartController@deletCartItems')->name('user.cart.delete');
    Route::get('/ajax/saveforlatter/{prod_id}','App\Http\Controllers\site\usersaction\CartController@saveForLatter')->name('user.cart.saveForLatter');
    Route::get('/ajax/love/{prod_id}','App\Http\Controllers\site\usersaction\LoveController@add')->name('user.love.add');


    Route::get('/user', function(){
        return view('site.userpage.index');
    });

    Route::get('/user/addresses', function(){
        return view('site.userpage.addresses');
    });

    Route::post('/user/addresses/add','App\Http\Controllers\site\users\AddressesController@add')->name('user.addresses.save');

    Route::get('/products', function(){
        return view('site.products.index');
    });

    Route::get('/categories', function(){
        return view('site.categories.index');
    });
    

    Route::get('/cart', function(){
        return view('site.cart.index');
    });


    Route::get('/login', function(){
        return view('site.login.index');
    });

    Route::post('/payment','App\Http\Controllers\site\PaymentController@payOrder')->name('user.payment.go');


    Route::get('/callback', function(){
        return 'success';
    });

    Route::get('/error', function(){
        return 'payment failed';
    });

    

    
 


    Route::get('/contact', function(){
        return view('site.contact.index');
      
    });


    Route::get('/about', function(){
        return view('site.about.index');
    });

    Route::get('/product', function(){
        return view('site.productpage.index');
    });


});
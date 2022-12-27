<?php

use Illuminate\Support\Facades\Route;

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

    // *****  Frontend Route Start   *****  //
    Route::get('hot_deals' , function(){
         $products = App\Models\Product::whereNotNull('offer_price')->where('status', 1)->orderBy('id' , 'desc')->paginate(10);
         return view('frontend.pages.hot_deals' , compact('products'));
    });

  Route::get('confirm-order', function(){
        return view('frontend.pages.c_order');
  })->name('c_order');

Route::get('/', 'App\Http\Controllers\Frontend\PagesController@homepage');
Route::get('/details/{id}', 'App\Http\Controllers\Frontend\PagesController@details')->name('details');
Route::get('/search','App\Http\Controllers\Frontend\PagesController@search')->name('search');
Route::get('category/{id}','App\Http\Controllers\Frontend\PagesController@category')->name('category');
Route::get('cart_plus/{id}', 'App\Http\Controllers\Frontend\PagesController@cart_plus')->name('cart_plus');
Route::get('qty_minus/{id}', 'App\Http\Controllers\Frontend\PagesController@qty_minus')->name('qty_minus');
Route::get('/ajax_find_shipping/{id}','App\Http\Controllers\Frontend\PagesController@ajax_find_shipping');
Route::post('/order', 'App\Http\Controllers\Frontend\PagesController@order')->name('order');





 // frontend cart start
 Route::group(['prefix' => 'cart'], function(){
    Route::get('/','App\Http\Controllers\Frontend\CartController@index')->name('cart.items');
    Route::post('/store','App\Http\Controllers\Frontend\CartController@store')->name('cart.store');
    Route::post('/o_store','App\Http\Controllers\Frontend\CartController@o_store')->name('o_cart.store');
    Route::post('update/{id}','App\Http\Controllers\Frontend\CartController@update')->name('cart.update');
    Route::get('destroy/{id}','App\Http\Controllers\Frontend\CartController@destroy')->name('cart.destroy');

 });







Route::get('/cart' , 'App\Http\Controllers\Frontend\PagesController@cart')->name('cart');
Route::get('/checkout' , 'App\Http\Controllers\Frontend\PagesController@checkout')->name('checkout');
Route::get('/customer-login' , 'App\Http\Controllers\Frontend\PagesController@login')->name('customer-login');


Route::group(['prefix' => 'user'] , function(){
// User Profile

Route::get('/my-profile', 'App\Http\Controllers\Frontend\UserController@index')->name('user-profile')->middleware('auth' , 'verified');
Route::get('/profile-update/{id}', 'App\Http\Controllers\Frontend\UserController@create')->middleware('auth')->name('profile.update');
Route::post('/profile-update/{id}', 'App\Http\Controllers\Frontend\UserController@store')->middleware('auth')->name('profile.store');

// order management
Route::get('/order-history' , 'App\Http\Controllers\Frontend\OrderManagementController@index')->name('order-history');

});

    // *****  Frontend Route End  *****  //



Route::get('/ajax_find_product/{id}', 'App\Http\Controllers\Backend\OrderController@ajax_find_product');
Route::get('/ajax_find_courier/{id}', 'App\Http\Controllers\Backend\OrderController@ajax_find_courier');
Route::get('/ajax_find_courier/{id}', 'App\Http\Controllers\Backend\OrderController@ajax_find_courier');
Route::get('/admin_cart/{id}', 'App\Http\Controllers\Backend\OrderController@admin_cart');
Route::get('/admin_cart_update/{id}', 'App\Http\Controllers\Backend\OrderController@admin_cart_update');
Route::get('/get_city', 'App\Http\Controllers\Backend\OrderController@get_city');
Route::get('/get_zone', 'App\Http\Controllers\Backend\OrderController@get_zone');

Route::get('/get_city/{id}', function($id){
   return json_encode(App\Models\City::where('courier_id', $id)->get());
});

Route::get('/get_zone/{id}', function($id){
    return json_encode(App\Models\Zone::where('city', $id)->get());
 });









// Admin Group
Route:: group(['prefix' => 'admin'] , function(){
    // Admin Dashboard page
   Route::get('/dashboard','App\Http\Controllers\Backend\PagesController@dashboard')->name('admin.dashboard')->middleware('auth' ,'verified');

//    Route::get('customers', function(){
//     return view('backend.pages.customers');
//    })->middleware('auth','admin')->name('customers');


Route::post('/cart_atr_edit/{id}', 'App\Http\Controllers\Backend\PagesController@cart_atr_edit')->middleware('auth')->name('cart_atr_edit');

   //brand Group

   Route::group(['prefix' => '/brand'], function(){

   Route::get('/manage','App\Http\Controllers\Backend\BrandController@index')->name('brand.manage')->middleware('auth');
   Route::get('/create','App\Http\Controllers\Backend\BrandController@create')->name('brand.create')->middleware('auth');
   Route::post('/store','App\Http\Controllers\Backend\BrandController@store')->name('brand.store')->middleware('auth');
   Route::get('/edit/{id}','App\Http\Controllers\Backend\BrandController@edit')->name('brand.edit')->middleware('auth');
   Route::post('/update/{id}','App\Http\Controllers\Backend\BrandController@update')->name('brand.update')->middleware('auth');
   Route::post('/destroy/{id}','App\Http\Controllers\Backend\BrandController@destroy')->name('brand.destroy')->middleware('auth');


 });
 // category Group

 Route::group(['prefix'  => '/category'] , function(){

    Route::get('/manage','App\Http\Controllers\Backend\CategoryController@index')->name('category.manage')->middleware('auth');
    Route::get('/create','App\Http\Controllers\Backend\CategoryController@create')->name('category.create')->middleware('auth');
    Route::post('/store','App\Http\Controllers\Backend\CategoryController@store')->name('category.store')->middleware('auth');
    Route::get('/edit/{id}','App\Http\Controllers\Backend\CategoryController@edit')->name('category.edit')->middleware('auth');
    Route::post('/update/{id}','App\Http\Controllers\Backend\CategoryController@update')->name('category.update')->middleware('auth');
    Route::post('/destroy/{id}','App\Http\Controllers\Backend\CategoryController@destroy')->name('category.destroy')->middleware('auth');
 });

     // slider group
     Route::group(['prefix'=>'/slider'],function(){
        Route::get('/manage', 'App\Http\Controllers\Backend\SliderController@index')->middleware('auth')->name('slider.manage');
        Route::get('/create', 'App\Http\Controllers\Backend\SliderController@create')->middleware('auth')->name('slider.create');
        Route::post('/store', 'App\Http\Controllers\Backend\SliderController@store')->middleware('auth')->name('slider.store');
        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\SliderController@edit')->middleware('auth')->name('slider.edit');
        Route::post('/update/{id}', 'App\Http\Controllers\Backend\SliderController@update')->middleware('auth')->name('slider.update');
        Route::post('/destroy/{id}', 'App\Http\Controllers\Backend\SliderController@destroy')->middleware('auth')->name('slider.destroy');

    });


  // product Group

  Route::group(['prefix'  => '/product'] , function(){

    Route::get('/manage','App\Http\Controllers\Backend\ProductController@index')->name('product.manage')->middleware('auth');
    Route::get('/create','App\Http\Controllers\Backend\ProductController@create')->name('product.create')->middleware('auth');
    Route::post('/store','App\Http\Controllers\Backend\ProductController@store')->name('product.store')->middleware('auth');
    Route::get('/edit/{id}','App\Http\Controllers\Backend\ProductController@edit')->name('product.edit')->middleware('auth');
    Route::post('/update/{id}','App\Http\Controllers\Backend\ProductController@update')->name('product.update')->middleware('auth');
    Route::post('/destroy/{id}','App\Http\Controllers\Backend\ProductController@destroy')->name('product.destroy')->middleware('auth');
    Route::get('/assign_dlt/{id}', 'App\Http\Controllers\Backend\ProductController@assign_dlt')->middleware('auth')->name('assign_dlt');

    Route::get('product-export', 'App\Http\Controllers\Backend\ProductController@exportIntoExcel')->middleware('auth')->name('product.export');

    Route::post('/selected-products', 'App\Http\Controllers\Backend\ProductController@deleteCheckedProducts')->middleware('auth')->name('deleteSelected');
    Route::post('/p-selected-status', 'App\Http\Controllers\Backend\ProductController@p_selected_status')->middleware('auth')->name('p_selected_status');
 });

Route::group(['prefix' => '/attribute'] , function(){

    Route::get('/manage', 'App\Http\Controllers\Backend\AttributeController@index')->middleware('auth')->name('attribute.manage');
    Route::post('/store', 'App\Http\Controllers\Backend\AttributeController@store')->middleware('auth')->name('attribute.store');
    Route::post('/update/{id}', 'App\Http\Controllers\Backend\AttributeController@update')->middleware('auth')->name('attribute.update');
    Route::post('/delete/{id}', 'App\Http\Controllers\Backend\AttributeController@destroy')->middleware('auth')->name('attribute.destroy');
    Route::post('/item_store', 'App\Http\Controllers\Backend\AttributeController@item_store')->middleware('auth')->name('attribute.item_store');
    Route::post('/item_update/{id}', 'App\Http\Controllers\Backend\AttributeController@item_update')->middleware('auth')->name('attribute.item_update');

    Route::post('/item_destroy/{id}', 'App\Http\Controllers\Backend\AttributeController@item_destroy')->middleware('auth')->name('attribute.item_destroy');

});

Route::post('p_i_e/{id}', 'App\Http\Controllers\Backend\PagesController@p_i_e')->middleware('auth')->name('p_i_e');
 Route::get('p_i_d/{id}', 'App\Http\Controllers\Backend\PagesController@p_i_d')->middleware('auth')->name('p_i_d');

 Route::post('p_g_e/{id}', 'App\Http\Controllers\Backend\PagesController@p_g_e')->middleware('auth')->name('p_g_e');
 Route::get('p_g_d/{id}', 'App\Http\Controllers\Backend\PagesController@p_g_d')->middleware('auth')->name('p_g_d');

  Route::post('p_s_e/{id}', 'App\Http\Controllers\Backend\PagesController@p_s_e')->middleware('auth')->name('p_s_e');
 Route::get('p_s_d/{id}', 'App\Http\Controllers\Backend\PagesController@p_s_d')->middleware('auth')->name('p_s_d');



// setting group
Route::group(['prefix'=>'settings'],function(){

    Route::get('/', 'App\Http\Controllers\Backend\PagesController@edit')->middleware('auth')->name('settings.edit');
    Route::post('update/{id}', 'App\Http\Controllers\Backend\PagesController@update')->middleware('auth')->name('settings.update');


});



  // product Group

  Route::group(['prefix'  => '/division'] , function(){

    Route::get('/manage','App\Http\Controllers\Backend\DivisionController@index')->name('division.manage')->middleware('auth');
    Route::get('/create','App\Http\Controllers\Backend\DivisionController@create')->name('division.create')->middleware('auth');
    Route::post('/store','App\Http\Controllers\Backend\DivisionController@store')->name('division.store')->middleware('auth');
    Route::get('/edit/{id}','App\Http\Controllers\Backend\DivisionController@edit')->name('division.edit')->middleware('auth');
    Route::post('/update/{id}','App\Http\Controllers\Backend\DivisionController@update')->name('division.update')->middleware('auth');
    Route::post('/destroy/{id}','App\Http\Controllers\Backend\DivisionController@destroy')->name('division.destroy')->middleware('auth');
 });

 Route::group(['prefix'  => '/district'] , function(){

    Route::get('/manage','App\Http\Controllers\Backend\DistrictController@index')->name('district.manage')->middleware('auth');
    Route::get('/create','App\Http\Controllers\Backend\DistrictController@create')->name('district.create')->middleware('auth');
    Route::post('/store','App\Http\Controllers\Backend\DistrictController@store')->name('district.store')->middleware('auth');
    Route::get('/edit/{id}','App\Http\Controllers\Backend\DistrictController@edit')->name('district.edit')->middleware('auth');
    Route::post('/update/{id}','App\Http\Controllers\Backend\DistrictController@update')->name('district.update')->middleware('auth');
    Route::post('/destroy/{id}','App\Http\Controllers\Backend\DistrictController@destroy')->name('district.destroy')->middleware('auth');
 });

 // Shipping group
 Route::group(['prefix'=>'shipping'],function(){
    Route::get('/manage', 'App\Http\Controllers\Backend\ShippingController@index')->middleware('auth')->name('shipping.manage');
    Route::get('/create', 'App\Http\Controllers\Backend\ShippingController@create')->middleware('auth')->name('shipping.create');
    Route::post('/store', 'App\Http\Controllers\Backend\ShippingController@store')->middleware('auth')->name('shipping.store');
    Route::get('/edit/{id}', 'App\Http\Controllers\Backend\ShippingController@edit')->middleware('auth')->name('shipping.edit');
    Route::post('/update/{id}', 'App\Http\Controllers\Backend\ShippingController@update')->middleware('auth')->name('shipping.update');
    Route::post('/destroy/{id}', 'App\Http\Controllers\Backend\ShippingController@destroy')->middleware('auth')->name('shipping.destroy');

});

 Route::group(['prefix'=>'courier'],function(){
    Route::get('/manage', 'App\Http\Controllers\Backend\CourierController@index')->middleware('auth')->name('courier.manage');
    Route::get('/create', 'App\Http\Controllers\Backend\CourierController@create')->middleware('auth')->name('courier.create');
    Route::post('/store', 'App\Http\Controllers\Backend\CourierController@store')->middleware('auth')->name('courier.store');
    Route::get('/edit/{id}', 'App\Http\Controllers\Backend\CourierController@edit')->middleware('auth')->name('courier.edit');
    Route::post('/update/{id}', 'App\Http\Controllers\Backend\CourierController@update')->middleware('auth')->name('courier.update');
    Route::post('/destroy/{id}', 'App\Http\Controllers\Backend\CourierController@destroy')->middleware('auth')->name('courier.destroy');

});


Route::group(['prefix'=>'city'],function(){
    Route::get('/manage', 'App\Http\Controllers\Backend\CityController@index')->middleware('auth')->name('city.manage');
    Route::get('/create', 'App\Http\Controllers\Backend\CityController@create')->middleware('auth')->name('city.create');
    Route::post('/store', 'App\Http\Controllers\Backend\CityController@store')->middleware('auth')->name('city.store');
    Route::get('/edit/{id}', 'App\Http\Controllers\Backend\CityController@edit')->middleware('auth')->name('city.edit');
    Route::post('/update/{id}', 'App\Http\Controllers\Backend\CityController@update')->middleware('auth')->name('city.update');
    Route::post('/destroy/{id}', 'App\Http\Controllers\Backend\CityController@destroy')->middleware('auth')->name('city.destroy');

});

Route::group(['prefix'=>'zone'],function(){
    Route::get('/manage', 'App\Http\Controllers\Backend\ZoneController@index')->middleware('auth')->name('zone.manage');
    Route::get('/create', 'App\Http\Controllers\Backend\ZoneController@create')->middleware('auth')->name('zone.create');
    Route::post('/store', 'App\Http\Controllers\Backend\ZoneController@store')->middleware('auth')->name('zone.store');
    Route::get('/edit/{id}', 'App\Http\Controllers\Backend\ZoneController@edit')->middleware('auth')->name('zone.edit');
    Route::post('/update/{id}', 'App\Http\Controllers\Backend\ZoneController@update')->middleware('auth')->name('zone.update');
    Route::post('/destroy/{id}', 'App\Http\Controllers\Backend\ZoneController@destroy')->middleware('auth')->name('zone.destroy');

});

     // user group
     Route::group(['prefix'=>'/user'],function(){
        Route::get('/manage', 'App\Http\Controllers\Backend\UserController@index')->middleware('auth')->name('user.manage');
        Route::get('/create', 'App\Http\Controllers\Backend\UserController@create')->middleware('auth')->name('user.create');
        Route::post('/store', 'App\Http\Controllers\Backend\UserController@store')->middleware('auth')->name('user.store');
        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\UserController@edit')->middleware('auth')->name('user.edit');
        Route::post('/update/{id}', 'App\Http\Controllers\Backend\UserController@update')->middleware('auth')->name('user.update');
        Route::post('/destroy/{id}', 'App\Http\Controllers\Backend\UserController@destroy')->middleware('auth')->name('user.destroy');
         Route::get('user-export', 'App\Http\Controllers\Backend\UserController@exportIntoExcel')->middleware('auth')->name('user.export');

         Route::post('/selected-products', 'App\Http\Controllers\Backend\UserController@deleteChecketProducts')->middleware('auth')->name('deleteSelectedU');
});

Route::group(['prefix' => '/order-management'],function(){
    Route::get('/manage', 'App\Http\Controllers\Backend\OrderController@index')->middleware('auth')->name('order.manage');
    Route::get('processing', 'App\Http\Controllers\Backend\OrderController@processing')->middleware('auth')->name('order.processing');
    Route::get('pending', 'App\Http\Controllers\Backend\OrderController@pending')->middleware('auth')->name('order.pending');
    Route::get('hold', 'App\Http\Controllers\Backend\OrderController@hold')->middleware('auth')->name('order.hold');
    Route::get('canceled', 'App\Http\Controllers\Backend\OrderController@canceled')->middleware('auth')->name('order.cancel');
    Route::get('completed', 'App\Http\Controllers\Backend\OrderController@completed')->middleware('auth')->name('order.completed');
    Route::get('pending_p', 'App\Http\Controllers\Backend\OrderController@pending_p')->middleware('auth')->name('order.pending_p');
    Route::get('order-details/{id}', 'App\Http\Controllers\Backend\OrderController@show')->middleware('auth')->name('order.details');
    Route::get('create', 'App\Http\Controllers\Backend\OrderController@create')->middleware('auth')->name('order.create');
    Route::post('store', 'App\Http\Controllers\Backend\OrderController@store')->middleware('auth')->name('order.store');
    Route::post('assign-edit/{id}', 'App\Http\Controllers\Backend\OrderController@assign-edit')->middleware('auth')->name('order.assign-edit');
    Route::get('edit/{id}', 'App\Http\Controllers\Backend\OrderController@edit')->middleware('auth')->name('order.edit');
    Route::get('assign-edit/{id}', 'App\Http\Controllers\Backend\OrderController@assign-edit')->middleware('auth')->name('order.assign-edit');
    Route::get('print/{id}', 'App\Http\Controllers\Backend\OrderController@print')->middleware('auth')->name('order.print');

                                                                                                                                                 // order status
    Route::get('/order/processing/{id}', 'App\Http\Controllers\Backend\OrderController@to_processing')->middleware('auth')->name('order.to_processing');

    Route::get('/order/pending/{id}', 'App\Http\Controllers\Backend\OrderController@to_pending')->middleware('auth')->name('order.to_pending');

    Route::get('/order/hold/{id}', 'App\Http\Controllers\Backend\OrderController@to_hold')->middleware('auth')->name('order.to_hold');

    Route::get('/order/cancel/{id}', 'App\Http\Controllers\Backend\OrderController@to_cancel')->middleware('auth')->name('order.to_cancel');

    Route::get('/order/completed/{id}', 'App\Http\Controllers\Backend\OrderController@to_completed')->middleware('auth')->name('order.to_completed');

    Route::get('/order/pending_p/{id}', 'App\Http\Controllers\Backend\OrderController@to_pending_p')->middleware('auth')->name('order.to_pending_p');

    Route::post('/update/{id}', 'App\Http\Controllers\Backend\OrderController@update')->middleware('auth')->name('order.update');
    Route::post('/update_s/{id}', 'App\Http\Controllers\Backend\OrderController@update_s')->middleware('auth')->name('order.update_s');
    Route::post('/update_auto/{id}', 'App\Http\Controllers\Backend\OrderController@update_auto')->middleware('auth');
    Route::post('/destroy/{id}', 'App\Http\Controllers\Backend\OrderController@destroy')->middleware('auth')->name('order.destroy');
    Route::get('order-export', 'App\Http\Controllers\Backend\OrderController@orderExport')->middleware('auth')->name('order.export');Route::post('/selected-orders', 'App\Http\Controllers\Backend\OrderController@deleteCheckedOrders')->middleware('auth')->name('deleteCheckedOrders');
    Route::post('/printed-orders', 'App\Http\Controllers\Backend\OrderController@printCheckedOrders')->middleware('auth')->name('printCheckedOrders');
    Route::post('/selected-status', 'App\Http\Controllers\Backend\OrderController@selected_status')->middleware('auth')->name('selected_status');
    Route::post('/selected-e_assign', 'App\Http\Controllers\Backend\OrderController@selected_e_assign')->middleware('auth')->name('selected_e_assign');

});

});


// Manager panel

Route::group( ['prefix'=>'manager'], function(){
    // admin dashboard page page
    Route::get('/dashboard', 'App\Http\Controllers\Manager\PagesController@dashboard')->name('manager.dashboard')->middleware('auth','manager');

    Route::get('managerreset', function(){
        return view('manager.pages.reset');
    })->name('manager.reset')->middleware('auth','manager');
    Route::post('/r_store', 'App\Http\Controllers\Manager\PagesController@user_store')->name('manager.r_store')->middleware('auth','manager');

Route::group(['prefix'=>'courier'],function(){
    Route::get('/manage', 'App\Http\Controllers\Manager\CourierController@index')->middleware('auth','manager')->name('manager.courier.manage');
    Route::get('/create', 'App\Http\Controllers\Manager\CourierController@create')->middleware('auth','manager')->name('manager.courier.create');
    Route::post('/store', 'App\Http\Controllers\Manager\CourierController@store')->middleware('auth','manager')->name('manager.courier.store');
    Route::get('/edit/{id}', 'App\Http\Controllers\Manager\CourierController@edit')->middleware('auth','manager')->name('manager.courier.edit');
    Route::post('/update/{id}', 'App\Http\Controllers\Manager\CourierController@update')->middleware('auth','manager')->name('manager.courier.update');
    Route::post('/destroy/{id}', 'App\Http\Controllers\Manager\CourierController@destroy')->middleware('auth','manager')->name('manager.courier.destroy');

    });

    Route::group(['prefix'=>'city'],function(){
        Route::get('/manage', 'App\Http\Controllers\Manager\CityController@index')->middleware('auth','manager')->name('manager.city.manage');
        Route::get('/create', 'App\Http\Controllers\Manager\CityController@create')->middleware('auth','manager')->name('manager.city.create');
        Route::post('/store', 'App\Http\Controllers\Manager\CityController@store')->middleware('auth','manager')->name('manager.city.store');
        Route::get('/edit/{id}', 'App\Http\Controllers\Manager\CityController@edit')->middleware('auth','manager')->name('manager.city.edit');
        Route::post('/update/{id}', 'App\Http\Controllers\Manager\CityController@update')->middleware('auth','manager')->name('manager.city.update');
        Route::post('/destroy/{id}', 'App\Http\Controllers\Manager\CityController@destroy')->middleware('auth','manager')->name('manager.city.destroy');

    });

    Route::group(['prefix'=>'zone'],function(){
        Route::get('/manage', 'App\Http\Controllers\Manager\ZoneController@index')->middleware('auth','manager')->name('manager.zone.manage');
        Route::get('/create', 'App\Http\Controllers\Manager\ZoneController@create')->middleware('auth','manager')->name('manager.zone.create');
        Route::post('/store', 'App\Http\Controllers\Manager\ZoneController@store')->middleware('auth','manager')->name('manager.zone.store');
        Route::get('/edit/{id}', 'App\Http\Controllers\Manager\ZoneController@edit')->middleware('auth','manager')->name('manager.zone.edit');
        Route::post('/update/{id}', 'App\Http\Controllers\Manager\ZoneController@update')->middleware('auth','manager')->name('manager.zone.update');
        Route::post('/destroy/{id}', 'App\Http\Controllers\Manager\ZoneController@destroy')->middleware('auth','manager')->name('manager.zone.destroy');

    });

          // product group
          Route::group(['prefix'=>'/product'],function(){
            Route::get('/manage', 'App\Http\Controllers\Manager\ProductController@index')->middleware('auth','manager')->name('manager.product.manage');
            Route::get('/create', 'App\Http\Controllers\Manager\ProductController@create')->middleware('auth','manager')->name('manager.product.create');
            Route::post('/store', 'App\Http\Controllers\Manager\ProductController@store')->middleware('auth','manager')->name('manager.product.store');
            Route::get('/edit/{id}', 'App\Http\Controllers\Manager\ProductController@edit')->middleware('auth','manager')->name('manager.product.edit');
            Route::post('/update/{id}', 'App\Http\Controllers\Manager\ProductController@update')->middleware('auth','manager')->name('manager.product.update');
            Route::get('/destroy/{id}', 'App\Http\Controllers\Manager\ProductController@destroy')->middleware('auth','manager')->name('manager.product.destroy');

            Route::get('/assign_dlt/{id}', 'App\Http\Controllers\Manager\ProductController@assign_dlt')->middleware('auth','manager')->name('manager.assign_dlt');

             Route::get('product-export', 'App\Http\Controllers\Manager\ProductController@exportIntoExcel')->middleware('auth','manager')->name('manager.product.export');

             Route::post('/selected-products', 'App\Http\Controllers\Manager\ProductController@deleteCheckedProducts')->middleware('auth','manager')->name('manager.deleteSelected');
             Route::post('/p-selected-status', 'App\Http\Controllers\Manager\ProductController@p_selected_status')->middleware('auth','manager')->name('manager.p_selected_status');


        });

         // Order Management Route
    Route::group(['prefix'=>'/order-management'],function(){
        Route::get('/manage', 'App\Http\Controllers\Manager\OrderController@index')->middleware('auth','manager')->name('manager.order.manage');
        // status
        Route::get('processing', 'App\Http\Controllers\Manager\OrderController@processing')->middleware('auth','manager')->name('manager.order.processing');
        Route::get('pending', 'App\Http\Controllers\Manager\OrderController@pending')->middleware('auth','manager')->name('manager.order.pending');
         Route::get('pending_p', 'App\Http\Controllers\Manager\OrderController@pending_p')->middleware('auth','manager')->name('manager.order.pending_p');

        Route::get('hold', 'App\Http\Controllers\Manager\OrderController@hold')->middleware('auth','manager')->name('manager.order.hold');
        Route::get('cancel', 'App\Http\Controllers\Manager\OrderController@cancel')->middleware('auth','manager')->name('manager.order.cancel');
        Route::get('completed', 'App\Http\Controllers\Manager\OrderController@completed')->middleware('auth','manager')->name('manager.order.completed');

        Route::get('order-details/{id}', 'App\Http\Controllers\Manager\OrderController@show')->middleware('auth','manager')->name('manager.order.details');

        Route::get('create', 'App\Http\Controllers\Manager\OrderController@create')->middleware('auth','manager')->name('manager.order.create');

        Route::post('store', 'App\Http\Controllers\Manager\OrderController@store')->middleware('auth','manager')->name('manager.order.store');

        Route::get('/edit/{id}', 'App\Http\Controllers\Manager\OrderController@edit')->middleware('auth','manager')->name('manager.order.edit');


        // order status
        Route::get('/order/processing/{id}', 'App\Http\Controllers\Manager\OrderController@to_processing')->middleware('auth','manager')->name('manager.order.to_processing');

        Route::get('/order/pending/{id}', 'App\Http\Controllers\Manager\OrderController@to_pending')->middleware('auth','manager')->name('manager.order.to_pending');

        Route::get('/order/hold/{id}', 'App\Http\Controllers\Manager\OrderController@to_hold')->middleware('auth','manager')->name('manager.order.to_hold');

        Route::get('/order/cancel/{id}', 'App\Http\Controllers\Manager\OrderController@to_cancel')->middleware('auth','manager')->name('manager.order.to_cancel');

        Route::get('/order/completed/{id}', 'App\Http\Controllers\Manager\OrderController@to_completed')->middleware('auth','manager')->name('manager.order.to_completed');



        Route::post('/update/{id}', 'App\Http\Controllers\Manager\OrderController@update')->middleware('auth','manager')->name('manager.order.update');
        Route::post('/update_s/{id}', 'App\Http\Controllers\Manager\OrderController@update_s')->middleware('auth','manager')->name('manager.order.update_s');

         Route::post('update_auto', 'App\Http\Controllers\Manager\OrderController@update_auto')->middleware('auth','manager');


        Route::post('/destroy/{id}', 'App\Http\Controllers\Manager\OrderController@destroy')->middleware('auth','manager')->name('manager.order.destroy');
          Route::get('order-export', 'App\Http\Controllers\Manager\OrderController@orderExport')->middleware('auth','manager')->name('manager.order.export');

         Route::post('/selected-orders', 'App\Http\Controllers\Manager\OrderController@deleteCheckedOrders')->middleware('auth','manager','manager')->name('manager.deleteCheckedOrders');

          Route::post('/selected-status', 'App\Http\Controllers\Manager\OrderController@selected_status')->middleware('auth','manager')->name('manager.selected_status');


});

});

require __DIR__.'/auth.php';


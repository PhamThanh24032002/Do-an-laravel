<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Attribute\ColorController;
use App\Http\Controllers\Admin\Attribute\SizeController;
use App\Http\Controllers\Admin\Blog\BlogController;
use App\Http\Controllers\Admin\Blog\Category_BlogController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Product\TrashbinController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Banner\bannerController;
use App\Http\Controllers\Admin\bannerpage\BannerPagesController;
use App\Http\Controllers\Admin\Contact\ContactController;
use App\Http\Controllers\Admin\Logo\logoController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\map\mapController;
use App\Http\Controllers\admin\Orders\OrdersController;
use App\Http\Controllers\Admin\slider\sliderController;
use App\Http\Controllers\Customer\AccountController;
use App\Http\Controllers\Customer\BloguserController;
use App\Http\Controllers\Customer\ContactuserController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Customer\ShopController;
use App\Http\Controllers\Customer\ShopDetailController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\WishlistController;

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
  
});
  
  


Route::get('admin/login',[LoginController::class,'showLoginForm'])->name('show.admin.login');
Route::post('admin/login',[LoginController::class,'login'])->name('admin.login');
Route::get('admin/logout',[LoginController::class,'logout'])->name('show.admin.logout');
Route::get('/repass',[AdminController::class,'show_mail_to_repass'])->name('show.mail.to.repass');
Route::post('/repass',[AdminController::class,'post_mail_to_repass']);
Route::get('/reset_pass_admin',[AdminController::class,'show_reset_pass_admin'])->name('reset.pass.admin');
Route::post('/reset_pass_admin',[AdminController::class,'reset_pass_admin']);


Route::group(['prefix' => 'admin','middleware'=>['auth:admin']], function () {
  // Route::resource('/category', CategoryController::class);
  Route::get('/category',[CategoryController::class,'index'])->name('category.index');
  Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
  Route::post('/category',[CategoryController::class,'store'])->name('category.store');
  Route::get('/category/{id}/edit',[CategoryController::class,'edit'])->name('category.edit');
  
    // Route::resource('/color', ColorController::class);
    Route::get('/color',[ColorController::class,'index'])->name('color.index');
    Route::get('/color/create',[ColorController::class,'create'])->name('color.create');
    Route::post('/color',[ColorController::class,'store'])->name('color.store');
    Route::get('/color/{id}/edit',[ColorController::class,'edit'])->name('color.edit');
    

    // Route::resource('/size', SizeController::class);
    Route::get('/size',[SizeController::class,'index'])->name('size.index');
    Route::get('/size/create',[SizeController::class,'create'])->name('size.create');
    Route::post('/size',[SizeController::class,'store'])->name('size.store');
    Route::get('/size/{id}/edit',[SizeController::class,'edit'])->name('size.edit');
    

    // Route::resource('/blog', BlogController::class);
    Route::get('/blog',[BlogController::class,'index'])->name('blog.index');
    Route::get('/blog/create',[BlogController::class,'create'])->name('blog.create');
    Route::post('/blog',[BlogController::class,'store'])->name('blog.store');
    Route::get('/blog/{id}',[BlogController::class,'show'])->name('blog.show');
    Route::get('/blog/{id}/edit',[BlogController::class,'edit'])->name('blog.edit');
    

    // Route::resource('/category_blog', Category_BlogController::class);
    Route::get('/category_blog',[Category_BlogController::class,'index'])->name('category_blog.index');
    Route::get('/category_blog/create',[Category_BlogController::class,'create'])->name('category_blog.create');
    Route::post('/category_blog',[Category_BlogController::class,'store'])->name('category_blog.store');
    Route::get('/category_blog/{id}/edit',[Category_BlogController::class,'edit'])->name('category_blog.edit');
    

    // Route::resource('/banner', bannerController::class);
    Route::get('/banner',[bannerController::class,'index'])->name('banner.index');
    Route::get('/banner/create',[bannerController::class,'create'])->name('banner.create');
    Route::post('/banner',[bannerController::class,'store'])->name('banner.store');
    Route::get('/banner/{id}/edit',[bannerController::class,'edit'])->name('banner.edit');
    

    // Route::resource('/banner_page', BannerPagesController::class);
    Route::get('/banner_page',[BannerPagesController::class,'index'])->name('banner_page.index');
    Route::get('/banner_page/create',[BannerPagesController::class,'create'])->name('banner_page.create');
    Route::post('/banner_page',[BannerPagesController::class,'store'])->name('banner_page.store');
    Route::get('/banner_page/{id}/edit',[BannerPagesController::class,'edit'])->name('banner_page.edit');
    

    // Route::resource('/logo', logoController::class);
    Route::get('/logo',[logoController::class,'index'])->name('logo.index');
    Route::get('/logo/create',[logoController::class,'create'])->name('logo.create');
    Route::post('/logo',[logoController::class,'store'])->name('logo.store');
    Route::get('/logo/{id}/edit',[logoController::class,'edit'])->name('logo.edit');
    

    // Route::resource('/googlemap', mapController::class);
    Route::get('/googlemap',[mapController::class,'index'])->name('googlemap.index');
    Route::get('/googlemap/create',[mapController::class,'create'])->name('googlemap.create');
    Route::post('/googlemap',[mapController::class,'store'])->name('googlemap.store');
    Route::get('/googlemap/{id}/edit',[mapController::class,'edit'])->name('googlemap.edit');
    

    // Route::resource('/slider', sliderController::class);
    Route::get('/slider',[sliderController::class,'index'])->name('slider.index');
    Route::get('/slider/create',[sliderController::class,'create'])->name('slider.create');
    Route::post('/slider',[sliderController::class,'store'])->name('slider.store');
    Route::get('/slider/{id}/edit',[sliderController::class,'edit'])->name('slider.edit');
    

    Route::group(['prefix' => 'product'], function () {
      Route::delete('delete-all',[ProductController::class,'deleteAll'])->name('product.deleteAll');
    });
    // Route::resource('/product', ProductController::class);
    Route::get('/product',[ProductController::class,'index'])->name('product.index');
    Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
    Route::post('/product',[ProductController::class,'store'])->name('product.store');
    Route::get('/product/{id}/edit',[ProductController::class,'edit'])->name('product.edit');
    

    Route::group(['prefix' => 'trashbin'], function () {
      Route::delete('recover-all',[TrashbinController::class,'recoverAll'])->name('trashbin.recoverAll');
    });
    // Route::resource('/trashbin', TrashbinController::class);
    Route::get('/trashbin',[TrashbinController::class,'index'])->name('trashbin.index');
    Route::get('/trashbin/create',[TrashbinController::class,'create'])->name('trashbin.create');
    Route::post('/trashbin',[TrashbinController::class,'store'])->name('trashbin.store');
    Route::get('/trashbin/{id}/edit',[TrashbinController::class,'edit'])->name('trashbin.edit');
    

    

    Route::get('orders',[OrdersController::class,'orders'])->name('orders');
    
    Route::get('orders_detail/{order_id}',[OrdersController::class,'orders_detail'])->name('orders_detail');
    Route::post('orders_detail/{order_id}',[OrdersController::class,'orders_detail_post']);
    Route::get('profit',[AdminController::class,'profit'])->name('profit');
    Route::post('filter_by_date',[AdminController::class,'filter_by_date'])->name('filter_by_date');
    Route::post('dashboard_filter',[AdminController::class,'dashboard_filter'])->name('dashboard_filter');
    Route::post('days_order',[AdminController::class,'days_order'])->name('days_order');
    
    Route::get('/',[AdminController::class,'index'])->name('admin');
    Route::get('/profile',[AdminController::class,'update_profile'])->name('admin.update.profile');
    Route::post('/profile',[AdminController::class,'post_update_profile']);
    Route::get('/list_account_admin',[AdminController::class,'show_list_admin'])->name('admin.list.admin');
    Route::get('/detail_account_admin/{id}',[AdminController::class,'show_detail_account_admin'])->name('show.detail.account.admin');
    Route::get('/list_account_customer',[AdminController::class,'show_list_customer'])->name('admin.list.customer');
    Route::get('/detail_account_customer/{id}',[AdminController::class,'show_detail_account_customer'])->name('show.detail.account.customer');
    
    Route::get('/change_password',[AdminController::class,'show_change_password'])->name('change.password');
    Route::post('/change_password',[AdminController::class,'change_password']);  
    Route::get('/list_contact',[ContactController::class,'index'])->name('admin.list.contact');
    Route::get('/register_contact',[ContactController::class,'create'])->name('register.contact');
    Route::post('/register_contact',[ContactController::class,'store']);
    Route::get('/detail_contact/{id}',[ContactController::class,'show'])->name('show.detail.contact');
    Route::post('/detail_contact/{id}',[ContactController::class,'update']);
    Route::get('/delete_contact/{id}',[ContactController::class,'destroy'])->name('delete.contact');   
    Route::get('/feedback',[AdminController::class,'feedback'])->name('feedback');
    Route::post('/feedback',[AdminController::class,'feedback_post']);

    Route::group(['middleware'=>['CheckRoleCensor']],function(){
        // người có quyền + sửa xóa
        
        Route::put('/category/{id}',[CategoryController::class,'update'])->name('category.update');
        Route::delete('/category/{id}',[CategoryController::class,'destroy'])->name('category.destroy');

        
    Route::put('/color/{id}',[ColorController::class,'update'])->name('color.update');
    Route::delete('/color/{id}',[ColorController::class,'destroy'])->name('color.destroy');

    
    Route::put('/size/{id}',[SizeController::class,'update'])->name('size.update');
    Route::delete('/size/{id}',[SizeController::class,'destroy'])->name('size.destroy');

    
    Route::put('/blog/{id}',[BlogController::class,'update'])->name('blog.update');
    Route::delete('/blog/{id}',[BlogController::class,'destroy'])->name('blog.destroy');

    
    Route::put('/category_blog/{id}',[Category_BlogController::class,'update'])->name('category_blog.update');
    Route::delete('/category_blog/{id}',[Category_BlogController::class,'destroy'])->name('category_blog.destroy');

    
    Route::put('/banner/{id}',[bannerController::class,'update'])->name('banner.update');
    Route::delete('/banner/{id}',[bannerController::class,'destroy'])->name('banner.destroy');

    
    Route::put('/banner_page/{id}',[BannerPagesController::class,'update'])->name('banner_page.update');
    Route::delete('/banner_page/{id}',[BannerPagesController::class,'destroy'])->name('banner_page.destroy');

    
    Route::put('/logo/{id}',[logoController::class,'update'])->name('logo.update');
    Route::delete('/logo/{id}',[logoController::class,'destroy'])->name('logo.destroy');

    
    Route::put('/googlemap/{id}',[mapController::class,'update'])->name('googlemap.update');
    Route::delete('/googlemap/{id}',[mapController::class,'destroy'])->name('googlemap.destroy');

    
    Route::put('/slider/{id}',[sliderController::class,'update'])->name('slider.update');
    Route::delete('/slider/{id}',[sliderController::class,'destroy'])->name('slider.destroy');

    
    Route::put('/product/{id}',[ProductController::class,'update'])->name('product.update');
    Route::delete('/product/{id}',[ProductController::class,'destroy'])->name('product.destroy');

    
    Route::put('/trashbin/{id}',[TrashbinController::class,'update'])->name('trashbin.update');
    Route::delete('/trashbin/{id}',[TrashbinController::class,'destroy'])->name('trashbin.destroy');

    

        Route::group(['middleware'=>['CheckRoleAdmin']],function(){
            // người có quyền + quản lý tài khoản admin
            Route::get('/delete_account_admin/{id}',[AdminController::class,'delete_account_admin'])->name('delete.account.admin');
            Route::post('/detail_account_admin/{id}',[AdminController::class,'update_detail_account_admin']);
            Route::post('/detail_account_customer/{id}',[AdminController::class,'update_detail_account_customer']);
            Route::get('/register_account_admin',[AdminController::class,'show_register_account_admin'])->name('register.account.admin');
            Route::post('/register_account_admin',[AdminController::class,'register_account_admin']);
        });
    });
  });
  Route::group(['prefix' => '/','middleware'=>['Customer']], function () {
    Route::get('/',[CustomerController::class,'index'])->name('home');
    Route::get('/shop',[CustomerController::class,'shop'])->name('shop');
    Route::get('/shop',[ShopController::class,'list'])->name('shop.list');    
    Route::get('/shop_detail/{id}',[ShopDetailController::class,'shop_detail'])->name('shop.detail');
    Route::get('/cancel_order/{id}',[CustomerController::class,'cancel_order'])->name('cancel_order');
    Route::post('/shop_detail/{id}',[CartController::class,'add_cart_shop_detail'])->name('add_cart_shop_detail');

    Route::get('/blog',[BloguserController::class,'blog'])->name('blog');
    Route::get('/blog_detail/{id}',[BloguserController::class,'blog_detail'])->name('blog_detail');
    Route::post('/blog_detail',[BloguserController::class,'post_reviews'])->name('post_reviews');
    Route::post('/edit_comment/{id}',[BloguserController::class,'edit_comment'])->name('customer.edit_comment');
    Route::get('/delete/{id}',[BloguserController::class,'delete_comment'])->name('comment.delete');
    Route::post('/reply_comment',[BloguserController::class,'reply_comment'])->name('reply_comment');
    Route::post('/edit_reply_comment/{id}',[BloguserController::class,'edit_reply_comment'])->name('edit_reply_comment');
    Route::get('/deletereply/{id}',[BloguserController::class,'deletereply'])->name('deletereply');

    Route::get('/contact',[ContactuserController::class,'contact'])->name('contact');
    Route::post('/contactpost',[ContactuserController::class,'contactpost'])->name('contactpost');
    Route::get('/favorite',[CustomerController::class,'favorite'])->name('favorite');
    Route::get('/checkout',[CustomerController::class,'checkout'])->name('checkout');
    Route::get('/complete_checkout',[CustomerController::class,'complete_checkout'])->name('complete_checkout');
    Route::post('/checkout',[CustomerController::class,'post_checkout'])->name('post_checkout');

    Route::get('/cartproduct',[CustomerController::class,'cartproduct'])->name('cartproduct');
    Route::post('/cartproduct',[CustomerController::class,'cartproduct']);
    Route::post('/rating',[CustomerController::class,'rating'])->name('customer.rating');
    Route::post('/comment',[CustomerController::class,'comment'])->name('customer.comment');
    
    Route::get('/order_history',[CustomerController::class,'order_history'])->name('order_history');
    Route::get('/detail_history/{id}',[CustomerController::class,'detail_history'])->name('detail_history');

    Route::get('/myaccount',[AccountController::class,'myaccount'])->name('myaccount');
    Route::post('/myaccount',[AccountController::class,'post_myaccount']);
    Route::get('/changepasscus',[AccountController::class,'changepasscus'])->name('changepasscus');
    Route::post('/changepasscus',[AccountController::class,'post_changepasscus']);
    Route::get('/ajax_quick_cart',[CartController::class,'ajax_quick_cart'])->name('ajax_quick_cart');
    Route::get('/change_detail_cart',[CartController::class,'change_detail_cart'])->name('change_detail_cart');
    Route::get('/ajax_add_cart_mini',[CartController::class,'ajax_add_cart_mini'])->name('ajax_add_cart_mini');
    Route::get('/list_cart_remove',[CartController::class,'cart_remove'])->name('cart_remove');
    Route::get('/list_cart_remove_mini',[CartController::class,'cart_remove_mini'])->name('cart_remove_mini');
    Route::get('/render_cart_mini',[CartController::class,'render_cart_mini'])->name('render_cart_mini');
    Route::get('/render_cart',[CartController::class,'render_cart'])->name('render_cart');
 
  });
  Route::get('/',[CustomerController::class,'index'])->name('home');
  Route::get('/logincus',[AccountController::class,'logincus'])->name('logincus');
  Route::post('/logincus',[AccountController::class,'post_logincus']);
  Route::get('/logoutcus',[AccountController::class,'logout'])->name('logout');
  Route::get('/registercus',[AccountController::class,'registercus'])->name('registercus');
  Route::post('/registercus',[AccountController::class,'post_registercus']);
  Route::get('/check_regis',[AccountController::class,'check_regis'])->name('check_regis');
  Route::get('/get_email_to_repasscus',[AccountController::class,'get_email_to_repasscus'])->name('get_email_to_repasscus');
  Route::post('/get_email_to_repasscus',[AccountController::class,'post_email_to_repasscus']);
  Route::get('/repasscus',[AccountController::class,'repasscus'])->name('repasscus');
  Route::post('/repasscus',[AccountController::class,'post_repasscus']);
  Route::get('/ajax_wishlist',[WishlistController::class,'ajax_wishlist'])->name('ajax_wishlist');
  Route::get('/wish_list_product_remove',[WishlistController::class,'product_remove'])->name('product_remove');

  

  
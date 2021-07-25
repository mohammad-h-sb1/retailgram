<?php

use App\Http\Controllers\Admin\AnswerController;
use App\Http\Controllers\Admin\CustomerClubController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Front\LikeController;
use App\Http\Controllers\Front\AboutRetilgramController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\ColorController;
use App\Http\Controllers\Front\OrderController;
use App\Http\Controllers\Front\QuestionController;
use App\Http\Controllers\Front\SizeController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Front\ProfileController;
//use App\Http\Controllers\Admin\CustomerController as AdminClub;
use App\Http\Controllers\Admin\DataController;
use App\Http\Controllers\Admin\ShopController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Front\CategoryController;
use App\Http\Controllers\Front\CenterShopController;
use App\Http\Controllers\Front\ProductRatingController;
use App\Http\Controllers\Admin\ProductController as AdminProduct;
use App\Http\Controllers\Admin\CenterShopController as AdminCenterShop;
//use App\Http\Controllers\Admin\ProductSoldController as AdminProductSold;
use App\Http\Controllers\Admin\CommentController as AdminComment;
use App\Http\Controllers\Admin\CategoryController as AdminCategory;
use App\Http\Controllers\Admin\ProductRatingController as AdminProductRating;
use App\Http\Controllers\Admin\ProfileController as AdminProfile;
use App\Http\Controllers\Admin\StylistController as AdminStylist;
use App\Http\Controllers\Admin\AboutRetilgramController as AboutRetilgram;
use App\Http\Controllers\Admin\SizeController as AdminSize;
use App\Http\Controllers\Admin\ColorController as AdminColor;
use App\Http\Controllers\Admin\InfluencerController as AdminInfluencer;


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
Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::name('front.')->group(function (){
//    Route::resource('centerShop',CenterShopController::class)->except('store','edit','update','destroy','create');
//    Route::resource('category',CategoryController::class)->except('store','edit','update','destroy','create');
//    Route::resource('productsSold',ProductSoldController::class)->except('edit','update',);
//    Route::middleware('auth')->resource('comment',CommentController::class);
//    Route::middleware('auth')->resource('product/rating',ProductRatingController::class);
//    Route::middleware('auth')->resource('question',QuestionController::class);
//    Route::middleware('auth')->resource('product',ProductController::class)->except('create','edit','store','update','destroy');
//    Route::middleware('auth')->resource('profile',ProfileController::class)->except('edit','update','store','index','destroy');
//    Route::middleware('auth')->resource('customer/club',CustomerClubController::class)->except('edit','update','store','destroy');
//    Route::middleware('auth')->post('/add/to/level/club',[CustomerClubController::class,'addToLevelClub'])->name('add.to.level');
//    Route::middleware('auth')->resource('/aboutRetilgram',AboutRetilgramController::class,)->except('show','edit','update','destroy','index');
//    Route::middleware('auth')->resource('/cart',CartController::class,);
//    Route::middleware('admin_center')->post('cart/status/{id}',[CartController::class,'status'])->name('shopStatus');
//    Route::middleware('auth')->resource('/order',OrderController::class,);
//    Route::middleware('auth')->post('tagSizes',[SizeController::class,'index'])->name('index');
//    Route::middleware('auth')->post('tagSize/{id}',[SizeController::class,'show'])->name('show');
//    Route::middleware('auth')->post('tagColor/{id}',[ColorController::class,'show'])->name('show');
//    Route::middleware('auth')->post('tagColor',[ColorController::class,'index'])->name('index');
//    Route::middleware('auth')->resource('/like',LikeController::class,);
//    Route::middleware('auth')->post('createDiscount',[CartController::class,'createDiscount'])->name('createDiscount');
//    Route::middleware('NumberCodeUse')->post('NumberCodeUse',[AdminInfluencer::class,' NumberCodeUse'])->name(' NumberCodeUse');
});
//
Route::name('admin.')->group(function (){
//    Route::resource('admin/centerShop',AdminCenterShop::class);
//    Route::middleware('admin')->post('center/status/{id}',[AdminCenterShop::class,'status'])->name('centerStatus');
//    Route::middleware('admin_center')->resource('admin/shop',ShopController::class);
//    Route::middleware('admin_center')->post('shop/status/{id}',[ShopController::class,'status'])->name('shopStatus');
//    Route::middleware('manager')->resource('admin/category',AdminCategory::class);
//    Route::middleware('auth')->post('add/user',[UserController::class,'store1'])->name('user.add');
//    Route::middleware('admin')->resource('user/add',UserController::class);
//    Route::middleware('admin')->resource('admin/productsSold',AdminProductSold::class);
//    Route::middleware('admin')->post('status/product/sold/{id}',[AdminProductSold::class,'status'])->name('status.product.sold');
//    Route::middleware('admin')->resource('admin/productsSold',AdminComment::class);
//    Route::middleware('manager')->post('comment/status/{id}',[AdminComment::class,'status'])->name('shopStatus');
//    Route::middleware('admin')->resource('product/rating',AdminProductRating::class);
//    Route::middleware('admin')->resource('data',DataController::class);
//    Route::middleware('admin_center')->resource('tag',TagController::class);
//    Route::middleware('auth')->resource('question',QuestionController::class);
//    Route::middleware('manager')->resource('question',AnswerController::class);
//    Route::middleware('manager')->post('answer/question/{middleware('manager')->id}',[AnswerController::class,'answer'])->name('answer');
//    Route::middleware('admin_center')->resource('product',AdminProduct::class);
//    Route::middleware('admin_center')->post('product/status/{id}',[AdminProduct::class,'status'])->name('shopStatus');
//    Route::middleware('admin')->resource('profile',AdminProfile::class);
//    Route::middleware('admin')->resource('discount',DiscountController::class);
//    Route::middleware('admin')->post('discount/status/{id}',[DiscountController::class,'status'])->name('shopStatus');
//    Route::middleware('admin')->resource('customer/club',CustomerClubController::class);
//    Route::resource('aboutRetilgram',AboutRetilgram::class);
//    Route::middleware('admin_center')->resource('size', AdminSize::class);
//    Route::middleware('admin_center')->resource('color', AdminColor::class);

});

//Route::name('stylist')->group(function (){
//    Route::middleware('stylist')->resource('stylist',AdminStylist::class);
//
//});
//require __DIR__.'/auth.php';


<?php

use App\Http\Controllers\Admin\InfluencerController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\PaymentLogController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PermissionLogController;
use App\Http\Controllers\Admin\SizeLogController;
use App\Http\Controllers\Admin\ProductShopController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Buy\BuyController;
use App\Http\Controllers\Front\ImageController;
use App\Http\Controllers\Front\ProductRatingLogController;
use App\Http\Controllers\Front\ProductStylistController;
use App\Http\Controllers\Front\SearchController;
use App\Http\Controllers\Front\StylistController;
use App\Http\Controllers\Front\StylistProductController;
use App\Http\Controllers\Front\UserRatingLogController;
use App\Http\Resources\Admin\CategoryCollection;
use App\Http\Resources\Front\StyListCollection;
use App\Http\Resources\Front\UserRatingLogCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\ProductSoldController;
use App\Http\Controllers\Admin\AnswerController;
use App\Http\Controllers\Front\CommentController;
use App\Http\Controllers\Admin\CustomerClubController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Front\LikeController;
use App\Http\Controllers\Front\AboutRetilgramController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\ColorController;
use App\Http\Controllers\Front\OrderController;
use App\Http\Controllers\Front\QuestionController;
use App\Http\Controllers\Front\SizeController;
use App\Http\Controllers\Front\Product1Controller;
use App\Http\Controllers\Admin\CommentController as AdminComment;
use App\Http\Controllers\Front\ProfileController;
//use App\Http\Controllers\Admin\CustomerController as AdminClub;
use App\Http\Controllers\Admin\DataController;
use App\Http\Controllers\Admin\ShopController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Front\CategoryController;
use App\Http\Controllers\Front\CenterShopController;
use App\Http\Controllers\Admin\Product1Controller as AdminProduct;
use App\Http\Controllers\Admin\CenterShopController as AdminCenterShop;
use App\Http\Controllers\Admin\ProductSoldController as AdminProductSold;
//use App\Http\Controllers\Admin\CommentController as AdminComment;
use App\Http\Controllers\Admin\CategoryController as AdminCategory;
use App\Http\Controllers\Admin\ProductRatingController as AdminProductRating;
use App\Http\Controllers\Admin\ProfileController as AdminProfile;
use App\Http\Controllers\Admin\StylistController as AdminStylist;
use App\Http\Controllers\Admin\AboutRetilgramController as AboutRetilgram;
use App\Http\Controllers\Admin\SizeController as AdminSize;
use App\Http\Controllers\Admin\ColorController as AdminColor;
use App\Http\Controllers\Admin\InfluencerController as AdminInfluencer;
use App\Http\Controllers\Admin\ImageController as AdminImage;
use App\Http\Controllers\Front\UserRatingController;
use App\Http\Controllers\Front\FavoriteListController;
use App\Http\Controllers\Front\UserController as FrontUser;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Route::name('front.')->group(function (){
//    Route::middleware('admin_center')->prefix('admin.center')->group(function (){
////        Route::post('cart/status/{id}',[CartController::class,'status'])->name('shopStatus');
//    });
//    Route::middleware('auth')->group(function (){
////        Route::resource('comment',CommentController::class);
////        Route::post('/add/to/level/club',[CustomerClubController::class,'addToLevelClub'])->name('add.to.level');
////        Route::get('tagSizes',[SizeController::class,'index'])->name('index');
////        Route::get('tagSize/{id}',[SizeController::class,'show'])->name('show');
////        Route::post('tagColor/{id}',[ColorController::class,'show'])->name('show');
////        Route::post('tagColor',[ColorController::class,'index'])->name('index');
////        Route::resource('/like',LikeController::class,);
////        Route::resource('productsSold',ProductSoldController::class)->except('edit','update',);
////        Route::resource('question',QuestionController::class);
////        Route::resource('profile',ProfileController::class)->except('index');
////        Route::resource('customer/club',CustomerClubController::class)->except('edit','update','store','destroy');
////        Route::get('addLevel',[CustomerClubController::class,'addToLevelClub'])->name('addToLevelClub');
////        Route::resource('favoriteList', FavoriteListController::class)->except('edit','update');
////        Route::resource('upload/img',ImageController::class);
////        Route::resource('product/Rating/log' ,ProductRatingLogController::class);
////        Route::post('createDiscount/',[CartController::class,'createDiscount'])->name('createDiscount');
////        Route::resource('/cart',CartController::class,);
//    });
////    Route::resource('centerShop',CenterShopController::class)->except('create','store','edit','update','destroy');
////    Route::resource('category',CategoryController::class)->except('store','edit','update','destroy','create');
////    Route::resource('product',ProductController::class)->except('create','edit','store','update','destroy');
////    Route::resource('/aboutRetilgram',AboutRetilgramController::class,)->except('show','edit','update','destroy','index');
////    Route::resource('/order',OrderController::class,);
////    Route::post('search',[SearchController::class,'store'])->name('search');
////    Route::middleware('influencer')->get('NumberCodeUse',[AdminInfluencer::class,'NumberCodeUse'])->name('NumberCodeUse');
////    Route::middleware('shop')->resource('productShop',ProductShopController::class);
//});
//Route::prefix('admin/')->name('admin.')->group(function (){
//    Route::middleware('admin')->group(function (){
////        Route::resource('category',AdminCategory::class);
////        Route::post('center/status/{id}',[AdminCenterShop::class,'status'])->name('centerStatus');
////        Route::resource('user/add',UserController::class);
////        Route::resource('data',DataController::class);
////        Route::resource('customer/club',CustomerClubController::class);
////        Route::resource('profile',AdminProfile::class);
////        Route::resource('discount',DiscountController::class);
////        Route::post('discount/status/{id}',[DiscountController::class,'status'])->name('shopStatus');
////        Route::resource('influencer' ,InfluencerController::class);
////        Route::resource('permissionLog',PermissionLogController::class);
//    });
////    Route::middleware('admin_center')->prefix('center')->name('center.')->group(function (){
////        Route::resource('shop',ShopController::class);
////        Route::post('shop/status/{id}',[ShopController::class,'status'])->name('shopStatus');
////        Route::post('product/status/{id}',[AdminProduct::class,'status'])->name('shopStatus');
////        Route::resource('size', AdminSize::class);
////        Route::resource('size/log', SizeLogController::class);
////        Route::resource('productsSold',AdminProductSold::class);
//
////        Route::resource('color', AdminColor::class);
////        Route::resource('property',PropertyController::class);
////        Route::resource('product',AdminProduct::class);
////        Route::resource('image',AdminImage::class);
////        Route::resource('productRating', AdminProductRating::class);
////        Route::post('status/product/sold/{id}',[AdminProductSold::class,'status'])->name('status.product.sold');
////        Route::resource('product/rating', AdminProductRating::class);
//
////    });
////    Route::middleware('manager')->prefix('manager')->group(function (){
////        Route::resource('comment',AdminComment::class);
////        Route::post('comment/status/{id}',[AdminComment::class,'status'])->name('commentStatus');
////        Route::resource('question',AnswerController::class);
////        Route::post('answer/question/{id}',[AnswerController::class,'answer'])->name('answer');
////    });
////    Route::middleware('auth')->group(function (){
////        Route::post('add/user',[UserController::class,'store1'])->name('user.add');
////        Route::resource('question',QuestionController::class);
////        Route::post('code_validity/{code}',[DiscountController::class,'code_validity'])->name('code_validity');
////        Route::resource('centerShop',AdminCenterShop::class);
////        Route::resource('payment',PaymentController::class);
////        Route::resource('payment/log',PaymentLogController::class);
////        Route::resource('permission',PermissionController::class);
////    });
//    Route::middleware('stylist')->resource('productStylist',StylistProductController::class);
//});
Route::middleware('auth:api')->group(function () {

    Route::name('admin.')->group(function () {
        //admin category
        Route::prefix('category')->name('category')->group(function () {
            Route::get('/', [AdminCategory::class, 'index'])->middleware('checkGate:index_category');
            Route::post('store', [AdminCategory::class, 'store'])->middleware('checkGate:update_category');
            Route::get('show/{category}', [AdminCategory::class, 'show'])->middleware('checkGate:show_category');
            Route::get('edit/{category}', [AdminCategory::class, 'edit'])->middleware('checkGate:edit_category');
            Route::put('update/{category}', [AdminCategory::class, 'update'])->middleware('checkGate:update_category');
            Route::delete('delete/{category}', [AdminCategory::class, 'destroy'])->middleware('checkGate:delete_category');
        });

        //admin brand
        Route::prefix('brand')->name('brand')->group(function () {
            Route::get('/', [AdminCenterShop::class, 'index'])->middleware('checkGate:index_brand_admin');
            Route::post('store', [AdminCenterShop::class, 'store'])->middleware('checkGate:add_brand_admin');
            Route::get('show/{centerShop}', [AdminCenterShop::class, 'show'])->middleware('checkGate:show_brand_admin');
            Route::get('edit/{centerShop}', [AdminCenterShop::class, 'edit'])->middleware('checkGate:edit_brand_admin');
            Route::put('update/{centerShop}', [AdminCenterShop::class, 'update'])->middleware('checkGate:update_brand_admin');
            Route::delete('delete/{centerShop}', [AdminCenterShop::class, 'destroy'])->middleware('checkGate:delete_brand_admin');
            Route::post('status/{centerShop}', [AdminCenterShop::class, 'status'])->middleware('checkGate:status_brand_admin');

        });

        //admin discount
        Route::prefix('discount')->name('discount')->group(function () {
            Route::get('/', [DiscountController::class, 'index'])->middleware('checkGate:index_discount_admin');
            Route::post('/store', [DiscountController::class, 'store'])->middleware('checkGate:add_discount_admin');
            Route::get('/show/{discount}', [DiscountController::class, 'show'])->middleware('checkGate:show_discount_admin');
            Route::get('/edit/{discount}', [DiscountController::class, 'edit'])->middleware('checkGate:edit_discount_admin');
            Route::put('/update/{discount}', [DiscountController::class, 'update'])->middleware('checkGate:update_discount_admin');
            Route::delete('/delete/{discount}', [DiscountController::class, 'destroy'])->middleware('checkGate:delete_discount_admin');
            Route::post('/status/{discount}', [DiscountController::class, 'status'])->middleware('checkGate:status_discount_admin');
        });

        //admin customer
        Route::prefix('customer')->name('customer')->group(function () {
            Route::get('/', [CustomerClubController::class, 'index'])->middleware('checkGate:index_customer_admin');
            Route::post('/store', [CustomerClubController::class, 'store'])->middleware('checkGate:add_customer_admin');
            Route::get('/show/{customerClub}', [CustomerClubController::class, 'show'])->middleware('checkGate:show_customer_admin');
            Route::get('/edit/{customerClub}', [CustomerClubController::class, 'edit'])->middleware('checkGate:edit_customer_admin');
            Route::put('/update/{customerClub}', [CustomerClubController::class, 'update'])->middleware('checkGate:update_customer_admin');
            Route::delete('/delete/{customerClub}', [CustomerClubController::class, 'destroy'])->middleware('checkGate:delete_customer_admin');
        });

        //admin permission
        Route::prefix('permission')->name('permission')->group(function () {
            Route::get('/', [PermissionController::class, 'index'])->middleware('checkGate:index_permission_admin');
            Route::post('/store', [PermissionController::class, 'store'])->middleware('checkGate:add_permission_admin');
            Route::get('/show/{permission}', [PermissionController::class, 'show'])->middleware('checkGate:show_permission_admin');
            Route::get('/edit/{permission}', [PermissionController::class, 'edit'])->middleware('checkGate:edit_permission_admin');
            Route::put('/update/{permission}', [PermissionController::class, 'update'])->middleware('checkGate:update_permission_admin');
            Route::delete('/delete/{permission}', [PermissionController::class, 'destroy'])->middleware('checkGate:delete_permission_admin');
        });

        //admin profile
        Route::prefix('profile')->name('profile')->group(function () {
            Route::get('/', [AdminProfile::class, 'index'])->middleware('checkGate:index_profile_admin');
            Route::post('store', [AdminProfile::class, 'store'])->middleware('checkGate:add_profile_admin');
            Route::get('/show/{profile}', [AdminProfile::class, 'show'])->middleware('checkGate:show_profile_admin');
            Route::get('/edit/{profile}', [AdminProfile::class, 'edit'])->middleware('checkGate:edit_profile_admin');
            Route::put('/update/{profile}', [AdminProfile::class, 'update'])->middleware('checkGate:update_profile_admin');
            Route::delete('/delete/{profile}', [AdminProfile::class, 'destroy'])->middleware('checkGate:delete_profile_admin');
        });

        //admin img
        Route::prefix('img')->name('img')->group(function () {
            Route::get('/', [ImageController::class, 'index'])->middleware('checkGate:index_img_admin');
            Route::post('/store', [ImageController::class, 'store'])->middleware('checkGate:add_img_admin');
            Route::get('/show/{img}', [ImageController::class, 'show'])->middleware('checkGate:show_img_admin');
            Route::get('/edit/{img}', [ImageController::class, 'edit'])->middleware('checkGate:edit_img_admin');
            Route::put('/update/{img}', [ImageController::class, 'update'])->middleware('checkGate:update_img_admin');
            Route::delete('/delete/{img}', [ImageController::class, 'destroy'])->middleware('checkGate:delete_delete_admin');
        });

        //admin add user
        Route::prefix('add/user')->name('add.name')->group(function () {
            Route::get('/', [UserController::class, 'index'])->middleware('checkGate:index_user_admin');
            Route::post('/store', [UserController::class, 'store'])->middleware('checkGate:store_user_admin');
            Route::get('/show/{user}', [UserController::class, 'show'])->middleware('checkGate:show_user_admin');
            Route::get('/edit/{user}', [UserController::class, 'edit'])->middleware('checkGate:edit_user_admin');
            Route::put('/update/{user}', [UserController::class, 'update'])->middleware('checkGate:update_user_admin');
            Route::delete('/delete/{user}', [UserController::class, 'destroy'])->middleware('checkGate:delete_delete_admin');
        });

//        admin influencer
        Route::prefix('influencer')->name('influencer')->group(function () {
            Route::get('/', [InfluencerController::class, 'index'])->middleware('checkGate:index_influencer_admin');
            Route::post('/store', [InfluencerController::class, 'store'])->middleware('checkGate:store_influencer_admin');
            Route::get('/show/{influencer}', [InfluencerController::class, 'show'])->middleware('checkGate:show_influencer_admin');
            Route::get('/edit/{influencer}', [InfluencerController::class, 'edit'])->middleware('checkGate:edit_influencer_admin');
            Route::put('/update/{influencer}', [InfluencerController::class, 'update'])->middleware('checkGate:update_influencer_admin');
            Route::delete('/delete/{influencer}', [InfluencerController::class, 'destroy'])->middleware('checkGate:delete_influencer_admin');
        });

        // admin permission Log
        Route::prefix('user/permission')->name('user/permission')->group(function () {
            Route::post('/store', [PermissionLogController::class, 'store'])->middleware('checkGate:store_permission_log_admin');
            Route::get('/show/{user}', [PermissionLogController::class, 'show'])->middleware('checkGate:show_permission_log_admin');
            Route::get('/edit/{permissionLog}', [PermissionLogController::class, 'edit'])->middleware('checkGate:edit_permission_log_admin');
            Route::put('/update/{permissionLog}', [PermissionLogController::class, 'update'])->middleware('checkGate:update_permission_log_admin');
            Route::delete('/delete/{permissionLog}', [PermissionLogController::class, 'destroy'])->middleware('checkGate:delete_permission_log_admin');
        });

//        admin add stylist
        Route::prefix('stylist')->name('stylist')->group(function () {
            Route::get('/', [AdminStylist::class, 'index'])->middleware('checkGate:index_stylist_admin');
            Route::post('/store', [AdminStylist::class, 'store'])->middleware('checkGate:store_stylist_admin');
            Route::get('/show/{stylist}', [AdminStylist::class, 'show'])->middleware('checkGate:show_stylist_admin');
            Route::delete('/delete/{stylist}', [AdminStylist::class, 'delete'])->middleware('checkGate:delete_stylist_admin');
        });

    });

//    Route::name('admin_center')->group(function (){
////    //admin center shop
//        Route::prefix('shop')->name('shop')->group(function (){
//            Route::get('/',[ShopController::class,'index'])->middleware('checkGate:index_shop_admin_center');
//            Route::post('/store',[ShopController::class,'store'])->middleware('checkGate:store_shop_admin_center');
//            Route::get('/show/{shop}',[ShopController::class,'show'])->middleware('checkGate:show_shop_admin_center');
//            Route::get('/edit/{shop}',[ShopController::class,'edit'])->middleware('checkGate:edit_shop_admin_center');
//            Route::put('/update/{shop}',[ShopController::class,'update'])->middleware('checkGate:update_shop_admin_center');
//            Route::delete('/delete/{shop}',[ShopController::class,'destroy'])->middleware('checkGate:delete_shop_admin_center');
//            Route::post('/status/{id}',[ShopController::class,'status'])->middleware('checkGate:status_customer_club_user');
//        });
//
//        //admin center size
//        Route::prefix('size')->name('size')->group(function (){
//            Route::get('/',[AdminSize::class,'index'])->middleware('checkGate:index_shop_admin_center');
//            Route::post('/store',[AdminSize::class,'store'])->middleware('checkGate:store_shop_admin_center');
//            Route::get('/show/{size}',[AdminSize::class,'show'])->middleware('checkGate:show_shop_admin_center');
//            Route::get('/edit/{size}',[AdminSize::class,'edit'])->middleware('checkGate:edit_shop_admin_center');
//            Route::put('/update/{size}',[AdminSize::class,'update'])->middleware('checkGate:update_shop_admin_center');
//            Route::delete('/delete/{size}',[AdminSize::class,'destroy'])->middleware('checkGate:delete_shop_admin_center');
//        });
////
////    //admin center size log
//        Route::prefix('size/log')->name('size/log')->group(function (){
//            Route::get('/',[SizeLogController::class,'index'])->middleware('checkGate:index_size_log_center');
//            Route::post('/store',[SizeLogController::class,'store'])->middleware('checkGate:store_size_log_center');
//            Route::get('/show/{sizeLog}',[SizeLogController::class,'show'])->middleware('checkGate:show_size_log_center');
//            Route::get('/edit/{sizeLog}',[SizeLogController::class,'edit'])->middleware('checkGate:edit_size_log_center');
//            Route::put('/update/{sizeLog}',[SizeLogController::class,'update'])->middleware('checkGate:update_size_log_center');
//            Route::delete('/delete/{sizeLog}',[SizeLogController::class,'destroy'])->middleware('checkGate:delete_size_log_center');
//        });
////
////    //admin center product sold
//        Route::prefix('brand/product/sold')->name('brand/product/sold')->group(function (){
//            Route::get('/',[AdminProductSold::class,'index'])->middleware('checkGate:index_product_sold_center');
//            Route::get('/store',[AdminProductSold::class,'store'])->middleware('checkGate:store_product_sold_center');
//            Route::get('/show/{productsSold}',[AdminProductSold::class,'show'])->middleware('checkGate:show_product_sold_center');
//            Route::get('/edit/{productsSold}',[AdminProductSold::class,'edit'])->middleware('checkGate:edit_product_sold_center');
//            Route::get('/update/{productsSold}',[AdminProductSold::class,'update'])->middleware('checkGate:update_product_sold_center');
//            Route::get('/delete/{productsSold}',[AdminProductSold::class,'destroy'])->middleware('checkGate:delete_product_sold_center');
//            Route::post('status/{id}',[AdminProductSold::class,'status'])->middleware('checkGate:status_product_sold_center');
//
//        });
////
////    //admin center tag
//        Route::prefix('tag')->name('tag')->group(function (){
//            Route::get('/',[TagController::class,'index'])->middleware('checkGate:index_tag_center');
//            Route::post('/store',[TagController::class,'store'])->middleware('checkGate:store_tag_center');
//            Route::get('/show/{tag}',[TagController::class,'show'])->middleware('checkGate:show_tag_center');
//            Route::get('/edit/{tag}',[TagController::class,'edit'])->middleware('checkGate:edit_tag_center');
//            Route::put('/update/{tag}',[TagController::class,'update'])->middleware('checkGate:update_tag_center');
//            Route::delete('/delete/{tag}',[TagController::class,'destroy'])->middleware('checkGate:delete_tag_center');
//        });
////
////    //admin center property
//        Route::prefix('property')->name('property')->group(function (){
//            Route::get('/',[PropertyController::class,'index'])->middleware('checkGate:index_property_admin_center');
//            Route::post('/store',[PropertyController::class,'store'])->middleware('checkGate:store_property_admin_center');
//            Route::get('/show/{property}',[PropertyController::class,'show'])->middleware('checkGate:show_property_admin_center');
//            Route::get('/edit/{property}',[PropertyController::class,'edit'])->middleware('checkGate:edit_property_admin_center');
//            Route::put('/update/{property}',[PropertyController::class,'update'])->middleware('checkGate:update_property_admin_center');
//            Route::delete('/delete/{property}',[PropertyController::class,'destroy'])->middleware('checkGate:delete_property_admin_center');
//        });
////
//        //admin center product
//        Route::prefix('product')->name('product')->group(function (){
//            Route::get('/',[AdminProduct::class,'index'])->middleware('checkGate:index_property_admin_center');
//            Route::post('/store',[AdminProduct::class,'store'])->middleware('checkGate:store_property_admin_center');
//            Route::get('/show/{product}',[AdminProduct::class,'show'])->middleware('checkGate:show_property_admin_center');
//            Route::get('/edit/{product}',[AdminProduct::class,'edit'])->middleware('checkGate:edit_property_admin_center');
//            Route::put('/update/{product}',[AdminProduct::class,'update'])->middleware('checkGate:update_property_admin_center');
//            Route::delete('/delete/{product}',[AdminProduct::class,'destroy'])->middleware('checkGate:delete_property_admin_center');
//            Route::delete('/status/{id}',[AdminProduct::class,'status'])->middleware('checkGate:status_property_admin_center');
//
//        });
////
////    //admin img
//        Route::prefix('admin/center/img')->name('admin.center.img.')->group(function (){
//            Route::get('/',[AdminImage::class,'index'])->middleware();
//            Route::post('/store',[AdminImage::class,'store'])->middleware('checkGate:index_img_admin_center');
//            Route::get('/show/{image}',[AdminImage::class,'show'])->middleware('checkGate:store_img_admin_center');
//            Route::get('/edit/{image}',[AdminImage::class,'edit'])->middleware('checkGate:show_img_admin_center');
//            Route::put('/update/{image}',[AdminImage::class,'update'])->middleware('checkGate:edit_img_admin_center');
//            Route::delete('/delete/{image}',[AdminImage::class,'destroy'])->middleware('checkGate:edit_img_admin_center');
//        });
////
////    //admin rating
//        Route::prefix('productRating')->name('productRating')->group(function (){
//            Route::get('/',[AdminProductRating::class,'index'])->middleware('checkGate:index_product_rating_admin_center');
//            Route::post('/store',[AdminProductRating::class,'store'])->middleware('checkGate:store_product_rating_admin_center');
//            Route::get('/show/{Rating}',[AdminProductRating::class,'show'])->middleware('checkGate:show_product_rating_admin_center');
//            Route::get('/edit/{Rating}',[AdminProductRating::class,'edit'])->middleware('checkGate:edit_product_rating_admin_center');
//            Route::put('/update/{Rating}',[AdminProductRating::class,'update'])->middleware('checkGate:update_product_rating_admin_center');
//            Route::delete('/delete/{Rating}',[AdminProductRating::class,'destroy'])->middleware('checkGate:delete_product_rating_admin_center');
//
//        });
//
//    });

    Route::name('manager.')->group(function (){
    //manger comment
    Route::prefix('comment')->name('comment')->group(function (){
        Route::get('/',[AdminComment::class,'index'])->middleware('checkGate:index_discount_manager');
        Route::post('/store',[AdminComment::class,'store'])->middleware('checkGate:add_discount_manager');
        Route::get('/show/{comment}',[AdminComment::class,'show'])->middleware('checkGate:show_comment_manager');
        Route::get('/edit/{comment}',[AdminComment::class,'edit'])->middleware('checkGate:edit_comment_manager');
        Route::put('/update/{comment}',[AdminComment::class,'update'])->middleware('checkGate:update_comment_manager');
        Route::delete('/delete/{comment}',[AdminComment::class,'destroy'])->middleware('checkGate:delete_comment_manager');
        Route::post('/status/{comment}',[AdminComment::class,'status'])->middleware('checkGate:status_comment_manager');
    });

    //manger question
    Route::prefix('question')->name('question')->group(function (){
        Route::get('/',[AnswerController::class,'index'])->middleware('checkGate:index_question_manager');
        Route::post('/store',[AnswerController::class,'store'])->middleware('checkGate:add_question_manager');
        Route::get('/show/{question}',[AnswerController::class,'show'])->middleware('checkGate:show_question_manager');
        Route::get('/edit/{question}',[AnswerController::class,'edit'])->middleware('checkGate:edit_question_manager');
        Route::put('/update/{question}',[AnswerController::class,'update'])->middleware('checkGate:update_question_manager');
        Route::delete('/delete/{question}',[AnswerController::class,'destroy'])->middleware('checkGate:delete_question_manager');
        Route::get('answer/{id}',[AnswerController::class,'answer'])->middleware('checkGate:answer_manager');
    });

    //manager data
    Route::prefix('data')->name('date')->group(function (){
        Route::get('/',[DataController::class,'index'])->middleware('checkGate:index_data_manager');
        Route::post('/store',[DataController::class,'store'])->middleware('checkGate:add_data_manager');
        Route::get('/show/{data}',[DataController::class,'show'])->middleware('checkGate:show_data_manager');
        Route::get('/edit/{data}',[DataController::class,'edit'])->middleware('checkGate:edit_data_manager');
        Route::put('/update/{data}',[DataController::class,'update'])->middleware('checkGate:update_data_manager');
        Route::delete('/delete/{data}',[DataController::class,'destroy'])->middleware('checkGate:delete_data_manager');
        Route::post('/status/{id}',[DataController::class,'status'])->name('shopStatus_manager');
    });

    //manager about retilgram
    Route::prefix('about/retilgram')->name('about/retilgram')->group(function (){
        Route::get('/',[AboutRetilgram::class,'index'])->middleware('checkGate:index_about_manager');
        Route::post('/store',[AboutRetilgram::class,'store'])->middleware('checkGate:add_about_manager');
        Route::get('/show/{aboutR}',[AboutRetilgram::class,'show'])->middleware('checkGate:show_about_manager');
        Route::get('/edit/{aboutR}',[AboutRetilgram::class,'edit'])->middleware('checkGate:edit_about_manager');
        Route::put('/update/{aboutR}',[AboutRetilgram::class,'update'])->middleware('checkGate:update_about_manager');
        Route::delete('/delete/{aboutR}',[AboutRetilgram::class,'destroy'])->middleware('checkGate:delete_about_manager');
    });

});

    Route::name('user.')->group(function (){
        //Introducing the brand
        Route::prefix('introducing/the/brand')->group(function (){
            Route::post('/store',[CenterShopController::class,'store'])->middleware('checkGate:add_brand');
            Route::get('/edit/{centerShop}',[CenterShopController::class,'edit'])->middleware('checkGate:edit_brand');
            Route::put('/update/{centerShop}',[CenterShopController::class,'update'])->middleware('checkGate:update_brand');
            Route::delete('/delete/{centerShop}',[CenterShopController::class,'destroy'])->middleware('checkGate:delete_brand');
        });

        //User comment
        Route::prefix('comment/')->name('comment.')->group(function (){
            Route::get('/',[CommentController::class,'index'])->middleware('checkGate:index_comment_user');
            Route::post('store',[CommentController::class,'store'])->middleware('checkGate:add_comment_user');
            Route::get('show/{comment}',[CommentController::class,'show'])->middleware('checkGate:show_comment_user');
            Route::get('edit/{comment}',[CommentController::class,'edit'])->middleware('checkGate:edit_comment_user');
            Route::put('update/{comment}',[CommentController::class,'update'])->middleware('checkGate:update_comment_user');
            Route::delete('delete/{comment}',[CommentController::class,'delete'])->middleware('checkGate:delete_comment_user');
        });

        //user customer club
        Route::prefix('customer/club')->name('customer/club')->group(function (){
            Route::get('/',[CustomerClubController::class,'index'])->middleware('checkGate:index_customer_club_user');
            Route::get('/show/{}',[CustomerClubController::class,'show'])->middleware('checkGate:show_customer_club_user');
            Route::post('/add/to/level/club/{customerClub}',[CustomerClubController::class,'addToLevelClub'])->middleware('checkGate:add_to_level_club');

        });

        //user show tag
        Route::name('tag/size')->group(function (){
            Route::get('tagSizes',[SizeController::class,'index'])->middleware('checkGate:index_tag');
            Route::get('tagSize/{id}',[SizeController::class,'show'])->middleware('checkGate:show_tag');
            Route::get('tagProperties/{id}',[ColorController::class,'show'])->middleware('checkGate:show_properties');
            Route::get('tagProperties',[ColorController::class,'index'])->middleware('checkGate:show_properties');
        });

        //user like
        Route::prefix('like')->name('like')->group(function (){
            Route::get('/',[LikeController::class,'index'])->middleware('checkGate:index_like');
            Route::post('store',[LikeController::class,'store'])->middleware('checkGate:add_like');
            Route::get('show/{like}',[LikeController::class,'show'])->middleware('checkGate:show_like');
            Route::get('edit/{like}',[LikeController::class,'edit'])->middleware('checkGate:edit_like');
            Route::put('update/{like}',[LikeController::class,'update'])->middleware('checkGate:update_like');
            Route::delete('delete/{like}',[LikeController::class,'destroy'])->middleware('checkGate:delete_like');
        });

        //user Product Sold
        Route::prefix('product/sold/')->name('product.sold.')->group(function (){
            Route::get('/',[ProductSoldController::class,'index'])->middleware('checkGate:index_productsSold');
            Route::post('store',[ProductSoldController::class,'store'])->middleware('checkGate:add_productsSold');
            Route::get('show/{productsSold}',[ProductSoldController::class,'show'])->middleware('checkGate:show_productsSold');
            Route::delete('delete/{productsSold}',[ProductSoldController::class,'destroy'])->middleware('checkGate:delete_productsSold');
        });

        //user profile
        Route::prefix('profile')->name('profile')->group(function (){
            Route::post('/store',[ProfileController::class,'store'])->middleware('checkGate:add_profile');
            Route::get('/show/{profile}',[ProfileController::class,'show'])->middleware('checkGate:show_profile');
            Route::get('/edit/{profile}',[ProfileController::class,'edit'])->middleware('checkGate:edit_profile');
            Route::put('/update/{profile}',[ProfileController::class,'update'])->middleware('checkGate:update_profile');
            Route::delete('/delete/{profile}',[ProfileController::class,'destroy'])->middleware('checkGate:delete_profile');
        });

        //user favoriteList
        Route::prefix('favoriteList')->name('favoriteList')->group(function (){
            Route::get('/',[FavoriteListController::class,'index'])->middleware('checkGate:favoriteList_index');
            Route::post('/store',[FavoriteListController::class,'store'])->middleware('checkGate:favoriteList_store');
            Route::get('/show/{favoriteList}',[FavoriteListController::class,'show'])->middleware('checkGate:favoriteList_show');
            Route::delete('/delete/{favoriteList}',[FavoriteListController::class,'destroy'])->middleware('checkGate:favoriteList_delete');
        });

        //user img
        Route::prefix('img/user')->name('img')->group(function (){
            Route::get('/',[ImageController::class,'index'])->middleware('checkGate:index_img');
            Route::post('/store',[ImageController::class,'store'])->middleware('checkGate:add_imgn');
            Route::get('/show/{img}',[ImageController::class,'show'])->middleware('checkGate:show_img');
            Route::get('/edit/{img}',[ImageController::class,'edit'])->middleware('checkGate:edit_img');
            Route::put('/update/{img}',[ImageController::class,'update'])->middleware('checkGate:update_img');
            Route::delete('/delete/{img}',[ImageController::class,'destroy'])->middleware('checkGate:delete_delete');
        });

        //user product rating log
        Route::prefix('product/Rating/log')->name('product/Rating/log')->group(function (){
            Route::get('/',[ProductRatingLogController::class,'index'])->middleware('checkGate:rating_index');
            Route::post('/store',[ProductRatingLogController::class,'store'])->middleware('checkGate:rating_store');
        });

        //user cart
        Route::prefix('cart')->name('cart')->group(function (){
            Route::get('/',[CartController::class,'index'])->middleware('checkGate:cart_index');
            Route::post('/store',[CartController::class,'store'])->middleware('checkGate:cart_store');
            Route::get('/show/{cart}',[CartController::class,'show'])->middleware('checkGate:cart_show');
            Route::get('/edit/{cart}',[CartController::class,'edit'])->middleware('checkGate:cart_edit');
            Route::put('/update/{cart}',[CartController::class,'update'])->middleware('checkGate:cart_update');
            Route::delete('/delete/{cart}',[CartController::class,'destroy'])->middleware('checkGate:cart_delete');
        });

        //user date
        Route::prefix('data')->name('date')->group(function (){
            Route::get('/',[DataController::class,'index'])->middleware('checkGate:data_index');
            Route::get('/show/{data}',[DataController::class,'show'])->middleware('checkGate:data_show');
        });

        //user about retilgram
        Route::prefix('about/retilgram')->name('about/retilgram')->group(function () {
            Route::get('/', [AboutRetilgram::class, 'index'])->middleware('checkGate:index_about');
            Route::post('/show/{aboutR}', [AboutRetilgram::class, 'show'])->middleware('checkGate:show_about');
        });

        //user brand
        Route::prefix('brand')->name('brand')->group(function (){
            Route::get('/',[CenterShopController::class,'index'])->middleware('checkGate:index_brand');
            Route::get('/show/{centerShop}',[CenterShopController::class,'show'])->middleware('checkGate:show_brand');
        });

        //payment
        Route::prefix('payment')->name('payment')->group(function (){
            Route::get('/',[PaymentController::class,'index'])->middleware('checkGate:payment_index');
            Route::post('/store',[PaymentController::class,'store'])->middleware('checkGate:payment_store');
            Route::get('/show/{payment}',[PaymentController::class,'show'])->middleware('checkGate:payment_show');
            Route::get('/edit/{payment}',[PaymentController::class,'edit'])->middleware('checkGate:payment_edit');
            Route::put('/update/{payment}',[PaymentController::class,'update'])->middleware('checkGate:payment_update');
            Route::delete('/delete/{payment}',[PaymentController::class,'destroy'])->middleware('checkGate:payment_delete');
            Route::post('/status/{id}',[PaymentController::class,'status'])->middleware('checkGate:status');
        });

        //payment log
        Route::prefix('payment/log')->name('payment.log')->group(function (){
            Route::get('/',[PaymentLogController::class,'index'])->middleware('checkGate:payment_log_index');
            Route::post('/store',[PaymentLogController::class,'store'])->middleware('checkGate:payment_log_store');
            Route::get('/show/{log}',[PaymentLogController::class,'show'])->middleware('checkGate:payment_log_show');
            Route::get('/edit/{log}',[PaymentLogController::class,'edit'])->middleware('checkGate:payment_log_edit');
            Route::put('/update/{log}',[PaymentLogController::class,'update'])->middleware('checkGate:payment_log_update');
            Route::delete('/delete/{log}',[PaymentLogController::class,'destroy'])->middleware('checkGate:payment_log_delete');
        });

        //permission
        Route::prefix('permission')->name('permission')->group(function (){
            Route::get('/show/{permission}',[PermissionController::class,'show'])->middleware('checkGate:permission_show');
        });

        //product
        Route::prefix('product')->name('product')->group(function (){
            Route::get('/',[Product1Controller::class,'index'])->middleware('checkGate:product_index');
            Route::get('/show/{product}',[Product1Controller::class,'show'])->middleware('checkGate:product_show');
        });

        //orders
        Route::prefix('order')->name('order')->group(function (){
            Route::get('/',[OrderController::class,'index'])->middleware('checkGate:index_order');
            Route::post('/store',[OrderController::class,'store'])->middleware('checkGate:add_order');
            Route::get('/show/{order}',[OrderController::class,'show'])->middleware('checkGate:show_order');
            Route::get('/edit/{order}',[OrderController::class,'edit'])->middleware('checkGate:edit_order');
            Route::put('/update/{order}',[OrderController::class,'update'])->middleware('checkGate:update_order');
            Route::delete('/delete/{order}',[OrderController::class,'destroy'])->middleware('checkGate:delete_order');
        });

        //rating
        Route::prefix('rating')->name('rating')->group(function (){
            Route::post('/store',[UserRatingController::class,'store'])->middleware('checkGate:add_rating');
            Route::get('/show',[UserRatingController::class,'show'])->middleware('checkGate:show_rating');
        });

        //stylist
        Route::prefix('stylist')->name('stylist')->group(function (){
            Route::get('/',[StylistController::class,'index'])->middleware('checkGate:index_stylist');
            Route::get('/show/{stylist}',[StylistController::class,'show'])->middleware('checkGate:show_stylist');
        });
    });

    Route::name('Stylist')->group(function (){
    //stylist product
    Route::prefix('stylist/product')->name('Product')->group(function (){
        Route::get('/',[StylistProductController::class,'index'])->middleware('checkGate:index_product_stylist_center');
        Route::post('/store',[StylistProductController::class,'store'])->middleware('checkGate:store_product_stylist_center');
        Route::get('/show/{productStylist}',[StylistProductController::class,'show'])->middleware('checkGate:show_product_stylist_center');
        Route::get('/edit/{productStylist}',[StylistProductController::class,'edit'])->middleware('checkGate:edit_product_stylist_center');
        Route::put('/update/{productStylist}',[StylistProductController::class,'update'])->middleware('checkGate:update_product_stylist_center');
        Route::delete('/delete/{productStylist}',[StylistProductController::class,'destroy'])->middleware('checkGate:delete_product_stylist_center');
    });

    //edit
    Route::prefix('stylist')->name('stylist')->group(function (){
        Route::get('/show/{stylist}',[StylistController::class,'show'])->middleware('checkGate:show_stylist_center');
        Route::get('/edit/{stylist}',[StylistController::class,'edit'])->middleware('checkGate:edit_stylist_center');
        Route::put('/update/{stylist}',[StylistController::class,'update'])->middleware('checkGate:update_stylist_center');
    });

});

    Route::name('influencer')->group(function (){
        //show influencer
        Route::get('/show/{influencer}',[AdminInfluencer::class,'show'])->middleware('checkGate:show_Influencer');
        Route::get('/number/code/use/',[AdminInfluencer::class,'NumberCodeUse'])->middleware('checkGate:show_Influencer');
    });

    Route::post('logout',[FrontUser::class,'logout']);

});
Route::post('login',[FrontUser::class,'login']);
Route::post('register',[FrontUser::class,'register']);


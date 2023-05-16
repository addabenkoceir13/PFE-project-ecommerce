<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\FrontConteroller;
use App\Http\Controllers\Frontend\CommandeController;
use App\Http\Controller\Frontend\CkeckoutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ContectController;
use App\Http\Controllers\Admin\FrontController;
use App\Http\Controllers\Admin\MapController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\SuppliersController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\WishlistContrller;
use App\Http\Controllers\Frontend\RatingController;
use App\Http\Controllers\Frontend\RecommendationController;
use App\Http\Controllers\Frontend\ReviewContoller;
use App\Models\Suppliers;

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

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Router for Frontend
Route::get('/', [FrontConteroller::class , 'index']);

Route::get('/home', [FrontConteroller::class , 'index'])->name('home');

Route::get('categorys' , [FrontConteroller::class, 'category']);

Route::get('view-category/{name}', [FrontConteroller::class, 'viewcategory']);

Route::get('category/{namecate}/{nameprod}', [FrontConteroller::class, 'viewproduct']);
//
Route::get('product-list', [FrontConteroller::class, 'productlistajax']);
//
Route::post('searchproduct' ,[FrontConteroller::class, 'searchProduct']);

Route::post('add-to-cart', [CommandeController::class, 'addProduct']);
//
Route::post('delete-cart-item', [CommandeController::class, 'deletecartprod']);
//
Route::post('update_cart', [CommandeController::class, 'updatecart']);
//
Route::get('load-cart-data', [CommandeController::class, 'cartcount']);
// Router for add wishlist
Route::post('add-to-wishlist', [WishlistContrller::class,'AddWish']);
//
Route::post('delete-wishlist-item', [WishlistContrller::class, 'deletedwish']);
//
Route::get('load-wishlist-count', [WishlistContrller::class, 'wishlistcount']);

Route::get('recommndation', [RecommendationController::class , 'extractFeatures']);


Route::middleware(['auth'])->group(function(){

    // Route::post('add-to-cart', [CommandeController::class, 'addProduct']);

    Route::get('cart', [CommandeController::class, 'viewcart']);

    Route::get('checkout', [CheckoutController::class, 'index']);

    Route::post('place-order', [CheckoutController::class, 'placeorder']);
    //
    Route::post('proceed-to-pay', [CheckoutController::class, 'razorpaycheck']);

    // Router for page Wishlist
    Route::get('wishlist', [WishlistContrller::class, 'index']);
    //
    Route::post('add-rating', [RatingController::class, 'addrating']);

    // outer for Review
    //
    Route::post('add-review',[ReviewContoller::class, 'addreview']);
    //
    Route::get('edit-review/{nameprod}/userreview', [ReviewContoller::class, 'editreview']);
    //
    Route::put('edit-review',[ReviewContoller::class, 'update']);

    // Router For Users
    Route::get('my-profile', [UserController::class, 'viewindex']);
    //
    Route::post('edit-profile', [UserController::class, 'editProfile']);
     //
    Route::get('my-orders', [UserController::class, 'index']);
    //
    Route::get('view-order/{id}', [UserController::class, 'vieworder']);
    //
    Route::post('delete-all-orders', [UserController::class, 'deletedOrder']);

});



// Router for Admin
Route::middleware(['auth', 'isAdmin'])->group(function() {

    // Router for dashboard
    Route::get('dashboard' , [DashboardController::class , 'index']);
    // Router for page category
    Route::get('category' , [CategoryController::class , 'index']);
    // Router for Add cagory page
    Route::get('add-category' , [CategoryController::class , 'addcate']);
    // Router for insert date add new category
    Route::post('insert-category' , [CategoryController::class ,  'insert']);
    // Router for find id category and view data category
    Route::get('edit-category/{id}' , [CategoryController::class , 'editCate']);
    // Router for Update Category
    Route::put('update-category/{id}' , [CategoryController::class , 'update']);
    // Router for deleted category
    Route::get('deleted-category/{id}' , [CategoryController::class , 'dropCate']);

    // Router for Products
    Route::get('products', [ProductController::class, 'index']);
    // Router for add products
    Route::get('add-products', [ProductController::class, 'addprod']);
    // Router for inser date add new products
    Route::post('insert-product', [ProductController::class, 'insert']);
    // Router for find id products and view data products
    Route::get('edit-products/{id}', [ProductController::class, 'editProd']);
    // Router for modify data products
    Route::put('update-products/{id}', [ProductController::class, 'update']);
    // Router for deleted products
    Route::get('deleted-products/{id}', [ProductController::class, 'dropProd']);
    //
    Route::get('products-list', [ProductController::class, 'searchProducts']);


    // Router for Orders
    Route::get('orders', [OrdersController::class, 'index']);
    //
    Route::get('admin/view-order/{id}', [OrdersController::class, 'viweorder']);
    //
    Route::any('update-order/{id}', [OrdersController::class, 'updateorder']);
    //
    Route::get('order-history', [OrdersController::class, 'historyorder']);
    //



    // Router For Front
    // Router for users
    Route::get('users', [UsersController::class, 'users']);
    //
    Route::get('view-user/{id}', [UsersController::class, 'viewuser']);
    //
    Route::get('users-list',[UsersController::class,  'searchUsers']);
    //
    Route::post('deleted-user', [UsersController::class, 'deletedUser']);

    // Router For Suppliers
    Route::get('suppliers', [SuppliersController::class, 'index']);
    //
    Route::post('insert-supplier' , [SuppliersController::class, 'insert']);
    //
    Route::delete('remove-supplier/{id}', [SuppliersController::class, 'removeSupp'])->name('supplier.deleted');
    //
    Route::get('view-suppliers/{id}', [SuppliersController::class, 'viewSupplier']);
    //
    Route::post('update-supplier/{id}', [SuppliersController::class, 'updateSupplier']);
    //
    Route::get('send-email-suppliers/{id}',[SuppliersController::class, 'viewForm']);
    //
    Route::post('send-email',[ContectController::class, 'sendEmailSupplier']);
    //
    Route::get('send-email',[ContectController::class, 'sendEmail']);

    // Router For map suppliers
    Route::get('map', [MapController::class, 'index']);

    // Router Fordmin
    Route::get('admin-profile', [AdminController::class, 'index']);
    //
    Route::post('edit-profile-admin', [AdminController::class, 'editProfileadmin']);
    //
    Route::get('admin', [AdminController::class, 'admin']);
    //
    Route::post('add-admin', [AdminController::class, 'addAdmin']);

    //
    Route::get('load-orders-count', [OrdersController::class, 'ordersCount']);




});


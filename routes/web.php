<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/login", function() {
    return view('login');
});

// Route::get('/logout', function() {
//     Session::forget('user');
//     return redirect('login');
// });

// Route::get('/logout', function(Request $request) {
//     $request->session()->forget('user');
//     return redirect('login');
// });

Route::get('/logout', function(Request $request) {
    $productController = new ProductController();
    $productController->cartItem($request);
    $request->session()->forget('user');
    return redirect('/login');
});

// Route::view("/", "login"); // Without creating Controller using Route
Route::view('/register','register');
Route::post("/login", [UserController::class, 'login']);
Route::post("/register", [UserController::class, 'register']);
Route::get("/", [ProductController::class, 'index']);
Route::get("detail/{id}", [ProductController::class, 'detail']);
Route::get("search", [ProductController::class, 'search']);
Route::post("/add_to_cart", [ProductController::class, 'addToCart']);
Route::get("cartlist",[ProductController::class,'cartList']);
Route::get("removecart/{id}", [ProductController::class, 'removecart']);
Route::get("ordernow",[ProductController::class,'orderNow']); 
Route::post("orderplace",[ProductController::class,'orderPlace']);
Route::get("myorders",[ProductController::class,'myOrders']);
Route::get("product" , [ProductController::class, 'store'])->name('product');;
Route::post("myproduct", [ProductController::class, 'myproduct'])->name('myproduct');
// Route::match(['GET', 'POST'], "/myproduct", [ProductController::class, 'myproduct'])->name('myproduct');







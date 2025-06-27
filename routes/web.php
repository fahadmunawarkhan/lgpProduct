<?php

use App\Livewire\Admin\AddCustomers;
use App\Livewire\Admin\Customers;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Employee\AddEmployee;
use App\Livewire\Admin\Employee\EditEmployee;
use App\Livewire\Admin\Employee\Employee;
use App\Livewire\Admin\Products\ProductCategory;
use App\Livewire\Admin\Products\ProductList;
use App\Livewire\Website\AboutUs;
use App\Livewire\Website\Auth\LoginPage;
use App\Livewire\Website\Auth\RegisterPage;
use App\Livewire\Website\Cart;
use App\Livewire\Website\Checkout;
use App\Livewire\Website\ContactU;
use App\Livewire\Website\IndexHome;
use App\Livewire\Website\Services;
use App\Livewire\Website\Shop;
use App\Livewire\Website\SingleProduct;
use App\Livewire\Website\SingleProductCheckout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', IndexHome::class)->name('index');
Route::get('/about_us', AboutUs::class)->name('about');
Route::get('/services', Services::class)->name('services');
Route::get('/contact_us', ContactU::class)->name('contact');
Route::get('/shop', Shop::class)->name('shop');
Route::get('/cart', Cart::class)->name('cart');
Route::get('/checkout', Checkout::class)->name('checkout');
Route::get('/product/{id}', SingleProduct::class)->name('single.Product');
Route::get('/product-checkout/{id}/{quantity}', SingleProductCheckout::class)->name('single.Product.checkout');
Route::get('/user-login', LoginPage::class)->name('user.login');
Route::get('/user-register', RegisterPage::class)->name('user.register');

Route::get('/user-dashboard', RegisterPage::class)->name('user.dashboard');








// Admin


Route::get('/dashboard', Dashboard::class)->name('admin.dashboard');
Route::get('/customers', Customers::class)->name('admin.customers');
Route::get('/create_customers', AddCustomers::class)->name('admin.create.customers');

Route::get('/create_employee', AddEmployee::class)->name('admin.create.employee');
Route::get('/create_employee/{id}', EditEmployee::class)->name('admin.edit.employee');
Route::get('/manage_employee', Employee::class)->name('admin.employee');


Route::get('/manage_product_category', ProductCategory::class)->name('admin.product.category');
Route::get('/manage_product', ProductList::class)->name('admin.list.product');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

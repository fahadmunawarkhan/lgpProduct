<?php

use App\Livewire\Admin\AddCustomers;
use App\Livewire\Admin\Chat\ChatList;
use App\Livewire\Admin\Chat\UserChatList;
use App\Livewire\Admin\Customers;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Employee\AddEmployee;
use App\Livewire\Admin\Employee\EditEmployee;
use App\Livewire\Admin\Employee\Employee;
use App\Livewire\Admin\HRM\Roles;
use App\Livewire\Admin\HRM\RolesAndPermissions;
use App\Livewire\Admin\Products\ProductCategory;
use App\Livewire\Admin\Products\ProductList;
use App\Livewire\Website\AboutUs;
use App\Livewire\Website\Auth\LoginPage;
use App\Livewire\Website\Auth\RegisterPage;
use App\Livewire\Website\Cart;
use App\Livewire\Website\Chat\UserChatList as ChatUserChatList;
use App\Livewire\Website\Checkout;
use App\Livewire\Website\ContactU;
use App\Livewire\Website\Dashboard\MyDashboard;
use App\Livewire\Website\Dashboard\MyOrders;
use App\Livewire\Website\Dashboard\MyWallet;
use App\Livewire\Website\IndexHome;
use App\Livewire\Website\POS\InvoicePOS;
use App\Livewire\Website\POS\POSApp;
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

Route::get('/user-dashboard', MyDashboard::class)->name('user.dashboard');
Route::get('/user-orders', MyOrders::class)->name('user.orders');
Route::get('/user-wallet', MyWallet::class)->name('user.wallet');

Route::get('/user_chat_list', ChatUserChatList::class)->name('user.chat')->middleware('permission:users.chats');
Route::get('/pos', POSApp::class)->name('user.pos')->middleware('permission:users.pos');
Route::get('/pos-invoice', InvoicePOS::class)->name('user.pos.invoice')->middleware('permission:users.pos.invoice');







// Admin
Route::get('/customers', Customers::class)->name('admin.customers');
Route::get('/create_customers', AddCustomers::class)->name('admin.create.customers')->middleware('permission:create.customers');

Route::get('/create_employee', AddEmployee::class)->name('admin.create.employee')->middleware('permission:create.customers');

Route::get('/create_employee/{id}', EditEmployee::class)->name('admin.edit.employee')->middleware(('permission:edit.employee'));
Route::get('/manage_employee', Employee::class)->name('admin.employee')->middleware('permission:manage.employees');


Route::get('/manage_product_category', ProductCategory::class)->name('admin.product.category')->middleware('permission:manage.product.category');
Route::get('/manage_product', ProductList::class)->name('admin.list.product')->middleware('permission:manage.product.list');
Route::get('/manage_role', RolesAndPermissions::class)->name('admin.manage.role')->middleware('permission:manage.roles');
Route::get('/add_roles', Roles::class)->name('admin.add.role')->middleware('permission:manage.roles');
Route::get('/chat_list', ChatList::class)->name('admin.manage.chat')->middleware('permission:manage.chats');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

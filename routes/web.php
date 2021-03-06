<?php

use App\Http\Controllers\DashboardCon;
use App\Http\Controllers\LoginCon;
use App\Http\Controllers\CategoryCon;
use App\Http\Controllers\CustomerCon;
use App\Http\Controllers\PosCon;
use App\Http\Controllers\PaymentCon;
use App\Http\Controllers\SupplierCon;
use App\Http\Controllers\ProductCon;
use App\Http\Controllers\PurchaseCon;
use App\Http\Controllers\ReportCon;
use App\Http\Controllers\StockCon;
use App\Http\Controllers\ReturnProductCon;
use App\Http\Controllers\UserCon;
use Illuminate\Support\Facades\Route;
use JetBrains\PhpStorm\Internal\ReturnTypeContract;

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

// Route::get('/m', function () {
//     return view('backend.layout.addcategory');
// });

Route::get('/',[LoginCon::class,'log'])->name('log');
Route::post('/login',[LoginCon::class,'login_user'])->name('login');
Route::group(['middleware'=>'auth'],function()
// ,'middleware'=>'auth'

{
    Route::group(['prefix'=>'admin','middleware'=>'Admin'],function (){
        //dash
        Route::get('/dashboard',[DashboardCon::class,'dashboard'])->name('dash');
        //dash

        //user start
        Route::get('/user',[UserCon::class,'user'])->name('user');
        Route::get('/user/manage',[UserCon::class,'usermanage'])->name('usermanage');
        Route::post('/useradd',[UserCon::class,'useradd'])->name('useradd');
        Route::get('/delete/{id}',[UserCon::class,'delete'])->name('delete');
        //user end

        });



        // Login start

        // Login end



        //pos
        Route::get('/pos',[PosCon::class,'pos'])->name('pos');
        Route::get('/manage/sale',[PosCon::class,'manage_sale'])->name('manage_sale');
        Route::get('/manage/sale/list/{id}',[PosCon::class,'sale_list'])->name('sale_list');
        Route::get('/pos/sale/details',[PosCon::class,'sale_details'])->name('sale_details');
        Route::post('/pos/cart',[PosCon::class,'poscart'])->name('poscart');
        Route::get('/cart/forget',[PosCon::class,'pos_forget'])->name('pos_forget');
        Route::post('/cart/pos',[PosCon::class,'pos_post'])->name('pos_post');
        //pos

        //return
        // Route::get('/return',[ReturnProductCon::class,'return'])->name('return');
        // Route::get('/manage/return',[ReturnProductCon::class,'manage_return'])->name('manage_return');
        // Route::get('/manage/return/list/{id}',[ReturnProductCon::class,'return_list'])->name('return_list');
        // Route::get('/return/sale/details',[ReturnProductCon::class,'return_details'])->name('return_details');
        // Route::post('/return/cart',[ReturnProductCon::class,'poscart'])->name('poscart');
        // Route::get('/return/forget',[ReturnProductCon::class,'pos_forget'])->name('pos_forget');
        // Route::post('/cart/return',[ReturnProductCon::class,'pos_post'])->name('pos_post');
        //return

        //customer start
        Route::get('/customer',[CustomerCon::class,'customers'])->name('customer');
        Route::get('/customer/manage',[CustomerCon::class,'customermanage'])->name('customer_manage');
        Route::get('/customer/delete/{id}',[CustomerCon::class,'customerdelete'])->name('customer_delete');
        Route::post('/customeradd',[CustomerCon::class,'customeradd'])->name('customer_add');
        Route::get('/customer/edit/{id}',[CustomerCon::class,'customeredit'])->name('customer_edit');
        Route::put('/customer/update/{id}',[CustomerCon::class,'customerupdate'])->name('customer_update');
        //customer end

        //supplier start
        Route::get('/supplier',[SupplierCon::class,'supplier'])->name('supplier');
        Route::get('/supplier/manage',[SupplierCon::class,'suppliermanage'])->name('supplier_manage');
        Route::post('/supplieradd',[SupplierCon::class,'supplieradd'])->name('supplieradd');
        Route::get('/supplier/delete/{id}',[SupplierCon::class,'supplierdelete'])->name('supplier_delete');
        Route::get('/supplier/edit/{id}',[SupplierCon::class,'supplieredit'])->name('supplier_edit');
        Route::put('/supplier/update/{id}',[SupplierCon::class,'supplierupdate'])->name('supplier_update');
        //supplier end

        //dashboard
        Route::get('/dashboard',[DashboardCon::class,'dashboard'])->name('dash');

        //dashboard


        //payment
        Route::get('/addpay/supplier/{id}',[PaymentCon::class,'addpay_supplier'])->name('addpay_supplier');
        Route::get('/addpay/customer/{id}',[PaymentCon::class,'addpay_customer'])->name('addpay_customer');
        Route::get('/payment/manage',[PaymentCon::class,'paymanage'])->name('paymanage');
        Route::get('/payment/manage/customer',[PaymentCon::class,'paymanage_customer'])->name('paymanage_customer');
        Route::post('/payments/supplier',[PaymentCon::class,'payments_supplier'])->name('payments_supplier');
        Route::post('/payments/custome',[PaymentCon::class,'payments_customer'])->name('payments_customer');
        //payment


        // category start
        Route::get('/category',[CategoryCon::class,'categories'])->name('category');
        Route::get('/category/{id}details',[CategoryCon::class,'categories_details'])->name('categories_details');
        Route::get('/category/delete/{id}',[CategoryCon::class,'categories_delete'])->name('categories_delete');
        Route::post('/categories',[CategoryCon::class,'category_add'])->name('categoryadd');
        // category end

        // product
        Route::get('/product',[ProductCon::class,'productadd'])->name('product');
        Route::get('/products',[ProductCon::class,'product_add'])->name('products');
        Route::post('/product/add',[ProductCon::class,'products'])->name('productadded');
        Route::get('/products/delete/{id}',[ProductCon::class,'product_delete'])->name('product_delete');
        Route::get('/products/edit/{id}',[ProductCon::class,'product_edit'])->name('product_edit');
        Route::put('/products/update/{id}',[ProductCon::class,'product_update'])->name('product_update');
        // product

        // purchase
        Route::get('/purchase',[PurchaseCon::class,'purchaseadd'])->name('Purchase');
        Route::get('/purchaseadd',[PurchaseCon::class,'purchase_add'])->name('Purchaseadd');
        Route::post('/purchase/cart/',[PurchaseCon::class,'addToCart'])->name('addToCart');
        Route::get('/purchaselist/{id}',[PurchaseCon::class,'purchase_list'])->name('Purchaselist');
        Route::get('/purchase/session/delete',[PurchaseCon::class,'purchase_forget'])->name('Purchaseforget');
        Route::get('/purchase/parchases',[PurchaseCon::class,'purchase_parchases'])->name('Purchaseparchases');
        Route::get('/purchase/details',[PurchaseCon::class,'purchase_details'])->name('Purchasedetails');
        Route::post('/purchase/post',[PurchaseCon::class,'purchasepost'])->name('Purchase_post');
        Route::post('/purchase/manage',[PurchaseCon::class,'purchases_manage'])->name('Purchase_manage');
        Route::get('/purchase/delete/{id}',[PurchaseCon::class,'purchases_delete'])->name('purchases_delete');
        // purchase

        // stock
        Route::get('/stock',[StockCon::class,'stock'])->name('stock');
        // Route::get('/purchaseadd',[StockCon::class,'purchase_add'])->name('Purchaseadd');
        // Route::post('/purchase/add',[StockCon::class,'purchases'])->name('Purchase_add');
        // stock

        //report
        Route::get('/report/purchase',[ReportCon::class,'report_purchase'])->name('report_purchase');
        Route::get('/report/sales',[ReportCon::class,'report_sale'])->name('report_sale');
        //report






    Route::get('/logout',[LoginCon::class,'logout'])->name('logout');
});








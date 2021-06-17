<?php


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

// Route::get('/checkout', 'CheckoutController@checkout');
// Route::get('/yajra', 'ProductController@yajra');

Route::get('/pr', function () {
    foreach (App\Model\Product::all() as $product) {
        $product->status = 1;
        $product->save();
    }
});

Route::get('/logout', function () {
    session()->flush();
});

Route::get('/form-data', 'FontendController@form');



Route::get('config-clear', function () {
    \Artisan::call('cache:clear');
    \Artisan::call('config:clear');
    \Artisan::call('route:clear');
    dd("All clear!");
});

Auth::routes(['register' => false]);


//AdminController authentication
Route::get('/admin/login', 'AdminController@showAdminLoginForm');
Route::post('/admin/login', 'AdminController@adminLogin');



Route::group(['middleware' => 'admin'], function() {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/stock/index', 'StockController@stocks');

    //AdminDashboardController
    Route::get('/admin/dashboard', 'AdminDashboardController@showAdminDashboard');
    Route::get('/order/view/{id}', 'AdminDashboardController@orderView');
    Route::get('/feature/field/delete/{id}', 'ProductController@featureFieldDelete');
    Route::get('/product/export', 'WebProductController@export');
    Route::get('/admin/logout', 'AdminController@adminLogout');

    // user authentication from admin
    Route::get('/admin/user/manage', 'AdminController@manageUser');
    Route::get('/admin/user/create', 'AdminController@createUser');
    Route::post('/admin/user/store', 'AdminController@storeUser');
    Route::get('/admin/user/edit/{id}', 'AdminController@editUser');
    Route::post('/admin/user/update/{id}', 'AdminController@updateUser');
    Route::post('/admin/user/delete/{id}', 'AdminController@userDelete');
    Route::get('/admin/user/permission', 'AdminController@permission');
    Route::post('/admin/user/permission/update/{id}', 'AdminController@permissionUpdate');

    //CustomerController
    Route::resource('customers', 'CustomerController');
// Customer trash list
    Route::get('customer/trash-list', 'CustomerController@trashList');
    Route::get('customer/restore/{customer}', 'CustomerController@restore');
    Route::delete('customer/destroy/{customer}', 'CustomerController@permantlyDelete');
    Route::get('/sale/payment/{sale_id}', 'CustomerController@salePayment');
    Route::get('sale/customer/invoice/{id}', 'CustomerController@customerInvoice');
    Route::get('online/customer/invoice/{id}', 'CustomerController@onlineCustomerInvoice');
    Route::get('customer/vouser/{id}', 'CustomerController@customerReceipt');
    Route::get('customer/receipt/download/{id}', 'CustomerController@customerReceiptDownload');
    Route::post('sale/payment/update/{sale_id}', 'CustomerController@salePaymentUpdate');
    Route::get('customer/money-receipts', 'CustomerController@customerMoneyReceipts');

    Route::get('customer/orders', 'CustomerController@customerOrders');
    Route::get('customer/order/invoice/{customer_id}', 'CustomerController@customerOrderInvoice');


//SupplierController
    Route::resource('suppliers', 'SupplierController');
// SupplierController trash list
    Route::get('supplier/trash-list', 'SupplierController@trashList');
    Route::get('supplier/restore/{supplier}', 'SupplierController@restore');
    Route::delete('supplier/destroy/{supplier}', 'SupplierController@permantlyDelete');

    Route::get('supplier/advance/{supplier}', 'SupplierController@supplierAdvance');
    Route::get('supplier/invoice/{supplier}', 'SupplierController@supplierInvoice');
    Route::get('supplier/vouser/{id}', 'SupplierController@supplierReceipt');
    Route::get('supplier/receipt/download/{id}', 'SupplierController@supplierReceiptDownload');
    Route::post('supplier/advance/update/{supplier}', 'SupplierController@supplierAdvanceUpdate');
    Route::get('supplier/money-receipts', 'SupplierController@supplierMoneyReceipts');

//CategoryController
    Route::resource('categories', 'CategoryController');
    Route::get('category/active/{category}', 'CategoryController@active');
    Route::get('category/inactive/{category}', 'CategoryController@inactive');

//SubCategoryController
    Route::resource('subcategories', 'SubcategoryController');
    Route::get('subcategory/active/{subcategory}', 'SubcategoryController@active');
    Route::get('subcategory/inactive/{subcategory}', 'SubcategoryController@inactive');

//BrandController
    Route::resource('brands', 'BrandController');
    Route::get('brand/active/{brand}', 'BrandController@active');
    Route::get('brand/inactive/{brand}', 'BrandController@inactive');

//ProductController
    Route::get('products/index', 'ProductController@index');
    Route::get('products/create', 'ProductController@create');
    Route::post('products/store', 'ProductController@store');
    Route::get('products/edit/{product}', 'ProductController@edit');
    Route::post('products/update/{product}', 'ProductController@update');
    Route::delete('products/delete/{product}', 'ProductController@destroy');
    Route::get('edit/multiple/image/delete/{id}', 'ProductController@editProductDelete');
    Route::get('edit/single/image/delete/{id}', 'ProductController@editSingleProductDelete');
    Route::get('category/wish-subcategory/{id}', 'ProductController@categoryWishProduct');
    Route::get('product/active/{product}', 'ProductController@active');
    Route::get('product/inactive/{product}', 'ProductController@inactive');

    //accessories
    Route::get('edit/multiple/accessories/image/delete/{id}', 'AccessoriesController@editAccessoriesProductDelete');
    Route::get('accessories/index', 'AccessoriesController@accessoriesManage');
    Route::get('accessories/create', 'AccessoriesController@create');
    Route::post('accessories/store', 'AccessoriesController@store');
    Route::post('bulk/accessories/store', 'AccessoriesController@bulkAccessoriesStore');
    Route::get('accessories/edit/{accessories}', 'AccessoriesController@edit');
    Route::post('accessories/update/{accessories}', 'AccessoriesController@update');
    Route::delete('accessories/delete/{accessories}', 'AccessoriesController@destroy');

//ProductUnitController
    Route::resource('units', 'ProductUnitController');
    Route::get('unit/active/{id}', 'ProductUnitController@active');
    Route::get('unit/inactive/{id}', 'ProductUnitController@inactive');

    //ConditionController
    Route::get('/products/condition', 'ConditionController@index');
    Route::get('/products/condition/create', 'ConditionController@create');
    Route::post('/products/condition/store', 'ConditionController@store');
    Route::get('/products/condition/edit/{id}', 'ConditionController@edit');
    Route::post('/products/condition/update/{id}', 'ConditionController@update');
    Route::get('/products/condition/delete/{id}', 'ConditionController@destroy');

    //CurrencyController
    Route::get('/admin/currency/index', 'CurrencyController@index');
    Route::get('/admin/currency/create', 'CurrencyController@create');
    Route::post('/admin/currency/store', 'CurrencyController@store');
    Route::get('/admin/currency/edit/{currency}', 'CurrencyController@edit');
    Route::post('/admin/currency/update/{currency}', 'CurrencyController@update');
    Route::get('/admin/currency/delete/{currency}', 'CurrencyController@destroy');

//PurchaseController

    Route::group(['prefix' => 'purchase/'], function () {
        Route::get('index', 'PurchaseController@index');
        Route::get('create', 'PurchaseController@create');
        Route::get('product/{id}', 'PurchaseController@purchaseProducts');
        Route::get('supplier/balance/{id}', 'PurchaseController@purchaseSupplierBalance');
        Route::post('product', 'PurchaseController@purchaseProductStore');
        Route::get('delete/{id}', 'PurchaseController@purchaseProductDelete');
        Route::get('excel/export', 'PurchaseController@purchaseExportExcel');
        Route::get('csv/export', 'PurchaseController@purchaseExportCsv');
        Route::get('pdf/export', 'PurchaseController@purchaseExportPdf');
        Route::get('invoice/{id}', 'PurchaseController@purchaseInvoice');
        Route::get('edit/{purchase_id}', 'PurchaseController@purchaseEdit');
        Route::post('product/update/{purchase}', 'PurchaseController@purchaseUpdate');
    });

//SaleController

    Route::group(['prefix' => 'sale/'], function () {
        Route::get('index', 'SaleController@index');
        Route::get('create', 'SaleController@create');
        Route::get('product/{id}', 'SaleController@saleProducts');
        Route::get('customer/balance/{id}', 'SaleController@saleCustomerBalance');
        Route::post('product/store', 'SaleController@saleProductStore');
        Route::delete('delete/{id}', 'SaleController@saleProductDelete');
        Route::get('excel/export', 'SaleController@saleExportExcel');
        Route::get('csv/export', 'SaleController@saleExportCsv');
        Route::get('pdf/export', 'SaleController@saleExportPdf');
        Route::get('invoice/{id}', 'SaleController@saleInvoice');
        Route::get('edit/{id}', 'SaleController@saleEdit');
        Route::post('product/update/{sale}', 'SaleController@saleUpdate');
    });

//ReportController

    Route::get('today/sales/report', 'ReportController@todaySalesReport');
    Route::get('today/sale/pdf/{id}', 'ReportController@todaySalesReportPdf');
    Route::get('today/sale/excel/{id}', 'ReportController@todaySalesReportExcel');

    Route::get('today/purchase/report', 'ReportController@todayPurchaseReport');
    Route::get('today/purchase/pdf/{id}', 'ReportController@todayPurchaseReportPdf');

    Route::get('today/customer/receipt', 'ReportController@todayCustomerReceipt');
    Route::get('today/receipt/view/{id}', 'ReportController@customerReceipt');
    Route::get('today/customer/receipt/download/{id}', 'ReportController@customerReceiptDownload');

    // Due Report
    Route::get('due/sales/report', 'ReportController@dueSalesReport');
    Route::get('due/purchase/report', 'ReportController@duePurchaseReport');
    Route::get('profit/report', 'ReportController@profitReport');

    // Account Controller
    //Route::get('/cash/book', 'AccountController@cashBook');
    Route::get('/chart/account', 'AccountController@chartAccount');
    Route::get('/customer/all/data/{id}', 'AccountController@customersData');
    Route::get('/customer/invoice/{id}', 'AccountController@customersInvoice');
    Route::get('/supplier/all/data/{id}', 'AccountController@suppliersData');
    Route::get('/supplier/invoice/{id}', 'AccountController@suppliersInvoice');


    Route::post('admin/chart/account/head-store', 'AccountController@headStore');


//Web All Functional
    Route::group(['prefix' => 'web/'], function () {
        Route::get('index', 'WebCategoryController@index');
        Route::get('create', 'WebCategoryController@create');
        Route::post('store', 'WebCategoryController@store');
        Route::get('category/edit/{id}', 'WebCategoryController@edit');
        Route::post('update/category/{id}', 'WebCategoryController@update');
        Route::get('category-delete/{id}', 'WebCategoryController@destroy');
    });

    Route::group(['prefix' => 'web/'], function () {
        Route::get('products', 'WebProductController@index');
        Route::get('bulk/products', 'WebProductController@bulkProductsView');
        Route::post('bulk/products/store', 'WebProductController@bulkProductsStore');
        Route::get('products/create', 'WebProductController@create');
        Route::post('products/store', 'WebProductController@store');
        Route::get('product/edit/{id}', 'WebProductController@edit');
        Route::post('products/update/{id}', 'WebProductController@update');
        Route::get('product-delete/{id}', 'WebProductController@destroy');
        Route::get('downloads', 'WebProductController@downloads');
        Route::get('downloads/add', 'WebProductController@addDownloads');
        Route::post('downloads/store', 'WebProductController@storeDownloads');
        Route::get('downloads/edit/{id}', 'WebProductController@editDownloads');
        Route::post('downloads/update/{id}', 'WebProductController@updateDownloads');
        Route::post('downloads/delete/{id}', 'WebProductController@deleteDownloads');
    });

    Route::group(['prefix' => 'web/'], function () {
        Route::get('brands', 'WebBrandController@index');
        Route::get('brand/create', 'WebBrandController@create');
        Route::post('brand/store', 'WebBrandController@store');
        Route::get('brand/edit/{id}', 'WebBrandController@edit');
        Route::post('brand/update/{id}', 'WebBrandController@update');
        Route::get('brand-delete/{id}', 'WebBrandController@destroy');
    });

    Route::group(['prefix' => 'web/'], function () {
        Route::get('manufacture', 'WebManufactureController@index');
        Route::get('manufacture/create', 'WebManufactureController@create');
        Route::post('manufacture/store', 'WebManufactureController@store');
        Route::get('manufacture/edit/{id}', 'WebManufactureController@edit');
        Route::post('manufacture/update/{id}', 'WebManufactureController@update');
        Route::get('manufacture-delete/{id}', 'WebManufactureController@destroy');
    });

    Route::group(['prefix' => 'web/'], function () {
        Route::get('about', 'AboutController@index');
        Route::post('about/store', 'AboutController@store');

        Route::get('contact', 'AboutController@contactIndex');
        Route::post('contact/store', 'AboutController@contactStore');

        Route::get('team/index', 'AboutController@teamIndex');
        Route::get('team/form', 'AboutController@showTeamForm');
        Route::post('professional/team/store', 'AboutController@teamStore');
        Route::get('team/edit/{id}', 'AboutController@teamEdit');
        Route::post('professional/team/update/{team}', 'AboutController@teamUpdate');
        Route::get('team/delete/{team}', 'AboutController@teamDelete');

        Route::get('testimonial/index', 'AboutController@testimonialIndex');
        Route::get('testimonial/form', 'AboutController@showTestimonialForm');
        Route::post('testimonial/store', 'AboutController@testimonialStore');
        Route::get('testimonial/edit/{id}', 'AboutController@testimonialEdit');
        Route::post('testimonial/update/{testimonial}', 'AboutController@testimonialUpdate');
        Route::get('testimonial/delete/{testimonial}', 'AboutController@testimonialDelete');

        //Video Controller
        Route::get('/video', 'CountryController@videoList');
        Route::get('video/create', 'CountryController@videoCreate');
        Route::post('video/store', 'CountryController@videoStore');
        Route::get('video/edit/{id}', 'CountryController@videoEdit');
        Route::post('video/update/{video}', 'CountryController@videoUpdate');
        Route::get('video/delete/{video}', 'CountryController@videoDestroy');

        //Country Controller
        Route::get('country/list', 'CountryController@index');
        Route::get('country/create', 'CountryController@create');
        Route::post('country/store', 'CountryController@store');
        Route::get('country/edit/{id}', 'CountryController@edit');
        Route::post('country/update/{country}', 'CountryController@update');
        Route::get('country/delete/{country}', 'CountryController@destroy');

        //Banner Controller
        Route::get('banner/images', 'BannerController@index');
        Route::get('banner/create', 'BannerController@create');
        Route::post('banner/store', 'BannerController@store');
        Route::get('banner/edit/{banner}', 'BannerController@edit');
        Route::post('banner/update/{banner}', 'BannerController@update');
        Route::get('banner/delete/{banner}', 'BannerController@destroy');
    });
});



// Fontend ProductTrait details Controller
Route::get('/upcoming/product/details/{id}', 'ProductDetailsController@productDetails');
Route::get('/accessories/product/details/{id}', 'ProductDetailsController@accessoriesProductDetails');
Route::get('/telr/bank/information', 'BankInformationController@bankInformation');
Route::post('/telr/bank/information/store', 'BankInformationController@bankInformationStore');




// Fontend Controller
Route::get('/', 'FontendController@index');
Route::get('/search', 'FontendController@searchPage');

Route::get('/searchData', 'FontendController@sliderPrice');
Route::get('/search-data-all-page/', 'FontendController@searchAllPage');


Route::get('/featureproduct/view', 'FontendController@getModalData');

Route::get('/product/search', 'FontendController@searching');
Route::get('/product/mobile/search', 'FontendController@searchingForMobile');
Route::get('/show/upcoming/product', 'FontendController@upcomingProduct');
Route::get('/show/top/product', 'FontendController@topProduct');
Route::get('/best/seller', 'FontendController@bestSeller');
Route::get('/new/arrival', 'FontendController@newArrival');
Route::get('/offers', 'FontendController@offers');
Route::get('/videos', 'FontendController@videos');
Route::get('/supper/deals', 'FontendController@supperDeals');
Route::get('/show/best/product', 'FontendController@bestProduct');
Route::get('/show/feature/product', 'FontendController@featureProduct');
Route::get('/show/discount/product', 'FontendController@discountProduct');
Route::get('/show/new/product', 'FontendController@newProduct');
Route::get('/show/our/product', 'FontendController@ourProduct');
Route::get('/show/attention/product', 'FontendController@atentionProduct');
Route::get('/show/latest/product', 'FontendController@latestProduct');


Route::get('/upcoming/products', 'UpcomingController@upcomingProducts');
Route::get('/discount/products', 'UpcomingController@discountProducts');
Route::get('/attention/products', 'AttensionController@attensionProducts');
Route::get('/free/shipping', 'AttensionController@freeShipping');
Route::get('/feature/products', 'FeatureController@featureProducts');
Route::get('/our/products', 'FeatureController@ourProducts');

//Upcoming Controller
Route::get('/show/abouts', 'FontendController@showAbout');
Route::get('/supper/deals', 'FontendController@superDeals');
Route::get('/about/us', 'FontendController@aboutUs');
Route::get('/contact/us', 'FontendController@contactUs');
Route::post('/client/message', 'FontendController@leaveMessage');
Route::get('/software', 'FontendController@software');
Route::get('/top/rated', 'FontendController@topRated');
Route::get('/new/arrival', 'FontendController@newArrival');
Route::get('/best/seller', 'FontendController@bestSeller');
// Route::get('/offers', 'FontendController@offers');
Route::get('/country/wise/products/{id}/{name}', 'FontendController@countryWiseProduct');

//Main Focus Work
Route::get('/product/filtering/{brandId}', 'Frontend\BrandController@sliderPrice');
Route::get('/manufacture/product/filtering/{manufactureId}', 'Frontend\ManufactureController@sliderPrice');
Route::get('/category/product/filtering/{categoryId}', 'Frontend\CategoryController@sliderPrice');

Route::get('/car/brand/{id}', 'Frontend\BrandController@carBrand');

Route::get('/car/brand/{id}/{slug}', 'Frontend\BrandController@carBrandCurrency');

Route::get('/show/car/brand/filter/product/{id}', 'Frontend\BrandController@filterCarBrandProducts');

Route::get('/cat/manufacture/{id}', 'Frontend\ManufactureController@carManufacture');
Route::get('/show/car/manufacture/filter/product/{id}', 'Frontend\ManufactureController@filterCarManufactureProducts');

Route::get('/category/wish/product/{id}', 'Frontend\CategoryController@categoryWishProducts');
Route::get('/show/all/filter/product/{id}', 'Frontend\CategoryController@filterProducts');
//Main Focus Work

//Paypal integration
Route::get('handle-payment', 'PayPalPaymentController@handlePayment')->name('make.payment');
Route::get('cancel-payment', 'PayPalPaymentController@paymentCancel')->name('cancel.payment');
Route::get('payment-success', 'PayPalPaymentController@paymentSuccess')->name('success.payment');

//Telr payment methods
Route::get('handle-payment/success', 'TelrPaymentController@success');
Route::get('handle-payment/cancel', 'TelrPaymentController@cancel');
Route::get('handle-payment/declined', 'TelrPaymentController@declined');


Route::get('/professional/teams', 'FontendController@professionalTeams');
Route::get('/show/testimonial', 'FontendController@showTestimonial');
Route::get('/show/address', 'FontendController@showAddress');
Route::get('/feature/product/details/{id}', 'FontendController@featureProductDetails');
Route::get('/seller/product/details/{id}', 'FontendController@sellerProductDetails');
Route::get('/top/product/details/{id}', 'FontendController@topProductDetails');
Route::get('/web/all/brands', 'FontendController@allBrands');
Route::get('/brand/product/details/{id}', 'FontendController@brandsDetails');
Route::get('/show/all/products', 'FontendController@searchProducts');



Route::get('/show/all/subcategory/filter/product/{id}', 'FontendController@filterSubcategoryProducts');
Route::get('/show/all/condition/filter/product/{id}', 'FontendController@filterConditionProducts');


Route::get('/manufacture/product/details/{id}', 'FontendController@manufactureDetails');
Route::get('/web/all/manufacture', 'FontendController@allManufacture');
Route::get('/all/category/products', 'FontendController@categoryProducts');


Route::get('/downloads', 'FontendController@downloads');


Route::get('/category/wish/brand/product/{id}/{brand_id}', 'FontendController@categoryWiseBrandProducts');

Route::get('/category/product/details/{id}', 'FontendController@categoryProductsDetails');
Route::get('/add-to-card/{id}', 'CartController@addToCart');
Route::get('/add-to-cart-multiple/', 'CartController@addToCartMultiple');
Route::get('/accessories/add-to-card/{id}', 'CartController@addToCartAccessories');
Route::get('/accessories/add-to-wise-list/{id}', 'CartController@accessoriesWiseListProducts');
Route::post('/add-to-card/details/{id}', 'CartController@addToCartDetails');
Route::post('/accessories/add-to-card/details/{id}', 'CartController@accessoriesAddToCartDetails');
Route::post('/accessories/add-to-wise-list/details/{id}', 'CartController@accessoriesAddToWiseList');
Route::get('/add-to-wise-list/{id}', 'CartController@wiseListProducts');



Route::get('/show-cart-products', 'CartController@allCartProducts');
Route::get('/checkout', 'CheckoutController@checkout');
Route::get('/cart/product/delete/{id}', 'CartController@productDelete');
Route::post('/update-cart', 'CartController@showCartProductUpdate');
Route::get('/shipping', 'CheckoutController@shipping');
Route::post('/shipping/submit', 'CheckoutController@shippingStore');
Route::get('/payment/methods', 'CheckoutController@paymentMethod');
Route::post('/payment/methods/submit', 'CheckoutController@paymentMethodStore');
Route::get('/complete/order', 'CheckoutController@completeOrder');
Route::post('/customer/login', 'CheckoutController@customerLogin');
Route::post('/checkout/submit', 'CheckoutController@checkoutStore');
Route::get('/customer/checkout/{token}', 'CheckoutController@emailVerification');


// bugged routes


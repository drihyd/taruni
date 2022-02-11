<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ContentPagesController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\RazorpayController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Auth\SocialAccountController;
use App\Http\Controllers\Auth\LinkedSocialAccountController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ThemeoptionsController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyAccountController;
use App\Http\Controllers\LocationsController;
use App\Http\Controllers\FAQsController;
use App\Http\Controllers\CouponsController;
use App\Http\Controllers\AttributesController;
use App\Http\Controllers\AttributesMasterController;
use App\Http\Controllers\BulkImagesUploadController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ImportExportController;
use App\Http\Controllers\ParentAttributesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsermanagementController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\ShippingRatesController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\DataStatisticsController;
use App\Http\Controllers\FashionjournalsController;
use App\Http\Controllers\CollectionsController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\GTMTrackingController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\RazorpayApi;
use App\Http\Controllers\Cart_Checking_status;
use App\Http\Controllers\SitemapController;



/*Sitemap.xml*/
Route::get('sitemapgen.xml',[SitemapController::class,'load_xml_category_data'])->name('sitemap.category.xml');
Route::get('sitemapgen.xml/category',[SitemapController::class,'load_xml_category_data'])->name('sitemap.category.xml');


Route::get('/clear-cache', function() {
     $exitCode = Artisan::call('cache:clear');
     return 'Application cache cleared';
 });

Route::group(['prefix' => 'finance',  'middleware' => 'finance'], function()
{
    Route::get('dashboard',[FinanceController::class,'dashboard'])->name('finance.dashboard');
	Route::any('payments/{type?}', [FinanceController::class,'Listing'])->name('finance.payments');
	
});


Route::group(['prefix' => 'content',  'middleware' => 'contentwriter'], function()
{
		Route::get('dashboard',[ContentController::class,'dashboard'])->name('content.dashboard');
		Route::get('banners',[HomeController::class,'list_banners']);
		Route::get('delete_homepagebanner/{id}',[HomeController::class,'delete_banner']);
		Route::get('edit_homepagebanner/{id}',[HomeController::class,'edit_banner']);
		Route::get('homebanner/add',[HomeController::class,'create_banners']);
		Route::post('store_homepagebanners',[HomeController::class,'store_homepagebanner']);
		Route::post('update_homepagebanners',[HomeController::class,'update_homepagebanners']);
		
		
		/*Admin FAQs*/
Route::resource('faqs', FAQsController::class);
Route::get('faqs/create',[FAQsController::class,'create_faq']);
Route::post('faqs/store',[FAQsController::class,'store_faq']);
Route::get('faqs/edit/{id}',[FAQsController::class,'edit_faq']);
Route::post('faqs/update',[FAQsController::class,'update_faq']);
Route::get('faqs/delete/{id}',[FAQsController::class,'delete_faq']);
Route::get('support_leads',[FAQsController::class,'support_leads']);
Route::get('support_leads/reply/{id}',[FAQsController::class,'support_leads_reply']);
Route::post('support_leads/reply/store',[FAQsController::class,'update_support_lead']);
		
	
	

	
	/*Admin Pages */
Route::resource('pages', PageController::class);
	
	/* End Content Prefix */

});


/* Data Statistics of elastic account */
Route::get('statistics_elastic_account',[DataStatisticsController::class,'ElasticAccountInfo'])->name('statistics.elastic.account');
/* End */


Route::any('/admin',[LoginController::class, 'adminLogin']);
Route::post('adminlogin-verification',[LoginController::class, 'Loginsubmit'])->name('adminlogin.verification');


Route::any('admin-order-invoice', [OrdersController::class,'Single_Order_Invoice'])->name('admin.order.invoice');
Route::any('admin-order-print/{param?}', [OrdersController::class,'print_placed_orders'])->name('admin-order-print');

Route::any('general-order-print/{param?}', [OrdersController::class,'print_placed_orders'])->name('general-order-print');

Route::get('callback/{order_id?}',[RazorpayController::class, 'payment_callback']);



Route::group(['prefix' => 'general',  'middleware' => 'general'], function()
{
	
	
Route::any('admin-order-invoice', [OrdersController::class,'Single_Order_Invoice'])->name('general.order.invoice');	

Route::get('dashboard',[GeneralController::class,'dashboard'])->name('general.dashboard');	
Route::any('orders', [OrdersController::class,'Listing'])->name('general.orders');	
Route::any('orders/{type}', [OrdersController::class,'Listing'])->name('general.orders.types');
Route::any('order/{param1?}', [OrdersController::class,'Single_Listing'])->name('general.single.order');	
Route::any('admin-order-status', [OrdersController::class,'Single_Order_Status'])->name('general.order.status');


	
	/*Admin Departments */
Route::get('departments',[CategoriesController::class,'department_listing'])->middleware('general');

Route::get('departments/create',[CategoriesController::class,'create_department'])->middleware('general');
Route::post('departments/store',[CategoriesController::class,'store_department'])->middleware('general');
Route::get('departments/edit/{id}',[CategoriesController::class,'edit_department'])->middleware('general');
Route::post('departments/update',[CategoriesController::class,'update_department'])->middleware('general');
Route::get('departments/delete/{id}',[CategoriesController::class,'delete_department'])->middleware('general');




/*Admin Categories */
Route::resource('categories', CategoriesController::class)->middleware('general');
Route::get('categories/create',[CategoriesController::class,'create_category'])->middleware('general');
Route::post('categories/store',[CategoriesController::class,'store_category'])->middleware('general');
Route::get('categories/edit/{id}',[CategoriesController::class,'edit_category'])->middleware('general');
Route::post('categories/update',[CategoriesController::class,'update_category'])->middleware('general');
Route::get('categories/delete/{id}',[CategoriesController::class,'delete_category'])->middleware('general');
Route::get('products-export-products', [ImportExportController::class, 'product_export_download'])->name('products.export.products');
	
Route::any('bulk-images-upload', [BulkImagesUploadController::class, 'dropzone'])->name('general.products.upload.images');
	
Route::post('dropzone/store', [BulkImagesUploadController::class, 'dropzoneStore'])->name('general.dropzone.store');
Route::post('bulk_images_upload/delete', [BulkImagesUploadController::class, 'destroy']);



Route::get('profile/',[UsermanagementController::class,'profile']);
Route::post('profile/update',[UsermanagementController::class,'update_profile']);
	
});




Route::group( ['prefix' => 'admin','middleware' => 'admin'],function(){

	

	Route::any('orders', [OrdersController::class,'Listing'])->name('admin.orders');
	
	Route::any('orders/{type}', [OrdersController::class,'Listing'])->name('admin.orders.types');
	

	Route::any('order/{param1?}', [OrdersController::class,'Single_Listing'])->name('admin.single.order');
	Route::any('admin-order-status', [OrdersController::class,'Single_Order_Status'])->name('admin.order.status');
	
	Route::any('login',[LoginController::class, 'adminLogin'])->name('admin.login');
	
	Route::any('account_report/{type?}', [ReportController::class,'account_report'])->name('admin.account.report');
	Route::any('export-account-report', [ReportController::class, 'export_account_report'])->name('admin.report.export');


	Route::any('account_report_second/{type?}', [ReportController::class,'account_report_second'])->name('admin.account.report.second');
	Route::any('export-account-report-second', [ReportController::class, 'export_account_report_second'])->name('admin.report.export.second');


	Route::get('dashboard',[DashboardController::class,'dashboard'])->name('admin.dashboard');
	Route::get('logout', [LoginController::class,'logout'])->name('admin.logout');
	
	Route::get('import-export-view', [ImportExportController::class, 'importExportView'])->name('products.import.export');
	Route::get('export', [MyController::class, 'export'])->name('export');
	Route::get('products-export-products', [ImportExportController::class, 'product_export_download'])->name('products.export.products');
	Route::any('bulk-images-upload', [BulkImagesUploadController::class, 'dropzone'])->name('admin.products.upload.images');
	
	
	Route::post('products-import', [ImportExportController::class, 'import'])->name('products.import');
	
	Route::any('importproducts/{id}', [ImportExportController::class, 'destroy']);
	Route::delete('importsDeleteAll', [ImportExportController::class, 'deleteAll']);
	Route::any('importsMigrateAll', [ImportExportController::class, 'migrateAll']);
	
	Route::any('move-temp-actual-products', [ImportExportController::class, 'move_temp_actual_products'])->name('move.temp.actual.products');
	
	Route::any('update-productid-with-productcode', [ImportExportController::class, 'update_productid_with_product_code'])->name('update.productid.with.productcode');


Route::get('upload', [FileUploadController::class, 'showUploadForm']);

Route::post('action_upload', [FileUploadController::class, 'storeUploads']);








/*Admin FAQs*/
Route::resource('faqs', FAQsController::class);
Route::get('faqs/create',[FAQsController::class,'create_faq']);
Route::post('faqs/store',[FAQsController::class,'store_faq']);
Route::get('faqs/edit/{id}',[FAQsController::class,'edit_faq']);
Route::post('faqs/update',[FAQsController::class,'update_faq']);
Route::get('faqs/delete/{id}',[FAQsController::class,'delete_faq']);
Route::get('support_leads',[FAQsController::class,'support_leads']);
Route::get('support_leads/reply/{id}',[FAQsController::class,'support_leads_reply']);
Route::post('support_leads/reply/store',[FAQsController::class,'update_support_lead']);








/*Admin Pages */
Route::resource('pages', PageController::class);

/* End admin Prefix */

});


Route::get('/send-markdown-mail', [MailController::class, 'sendOfferMail']);
Route::get('/send-reset-password', [CustomerController::class, 'submitForgetPasswordForm']);
Route::get('/send-confirmation-order', [RazorpayController::class, 'send_order_confirmation_mail']);
Route::get('/send-order-dispatched', [OrdersController::class, 'send_order_dispatched_mail']);



Route::get('/stock_decreansed_afplaceorder', [RazorpayController::class, 'Decrease_stocks_applaceorder']);

Route::get('forget-password', [CustomerController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [CustomerController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 

Route::get('reset-password/{token}', [CustomerController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [CustomerController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::get('paywithrazorpay', [RazorpayController::class,'payWithRazorpay'])->name('paywithrazorpay');
Route::any('paymentprocessing', [RazorpayController::class,'paymentprocessing'])->name('paymentprocessing');
Route::post('callbackrazorpayment', [RazorpayController::class,'payment'])->name('callbackrazorpayment');
Route::get('payment-success', [RazorpayController::class,'payment_success'])->name('payment.success');
Route::get('payment-error', [RazorpayController::class,'payment_failed'])->name('payment.error');
Route::get('admin-order-items-recheck/{type?}', [RazorpayController::class,'Recheck_Order_Itemsform_Order'])->name('admin.order.items.recheck');
Route::get('admin-move-cart-as-order/{type?}', [RazorpayController::class,'move_cart_as_order'])->name('admin.move.cart.as.order');
Route::get('auto_update_payment_response_data', [RazorpayController::class,'Auto_update_payment_response_data'])->name('auto.update.payment.response.data');

Route::get('currency/{lang}', ['as' => 'currency.switch', 'uses' => 'App\Http\Controllers\CurrencyController@switchLang']);


Route::get('resend-activation-link', [CustomerController::class, 'resend_activation_link'])->name('resend.activation.link');
Route::post('resend-activation-post', [CustomerController::class, 'resend_activation_post'])->name('resend.activation.post');

 
Route::post('address-auto-filling', [MyAccountController::class, 'address_auto_filling'])->name('address.auto.filling'); 




/* File Upload */



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



/* Email verification */

/* New Added Routes */
Route::get('/', [HomeController::class,'front_end_homepage'])->name('froentend.home'); 
Route::get('account/verify/{token}', [CustomerController::class, 'verifyAccount'])->name('user.verify'); 



/* End */


/* Payment gateway API Calls */
Route::get('razor_pay_api_call/{type?}',[RazorpayApi::class,'fetch_created_payments'])->name('razor.pay.api.call');
/* End */


/* Payment gateway API Calls */
Route::get('failed_order_cart_order/{type?}',[Cart_Checking_status::class,'movecart_order'])->name('razor.pay.move.cart.payment');
/* End */


/* Abanded cart items API Calls */
Route::get('abanded_cart_orders/{type?}',[Cart_Checking_status::class,'abanded_cart_orders'])->name('razor.abanded_cart_orders');
/* End */

Route::any('/category/{slug?}/{param1?}/{param2?}', [CategoriesController::class,'load_cat_products'])->name('frontend.cat.products');

Route::any('/department/{slug?}', [CategoriesController::class,'all_department_products'])->name('all.department.products');

Route::any('/product/{slug?}', [ProductsController::class,'show_product'])->name('frontend.single.product');
Route::get('collections/{type?}', [CategoriesController::class,'collections_products']);
Route::get('/sale', [CategoriesController::class,'sale_products'])->name('frontend.sale');
Route::get('/newarrivals', [CategoriesController::class,'new_arrivals'])->name('frontend.newarrivals');

Route::any('product-sku-prices', [ProductsController::class,'show_product'])->name('product.sku.prices');




Route::get('/loadmore', [CategoriesController::class, 'index1']);
Route::post('/loadmore/load_data', [CategoriesController::class, 'load_data'])->name('loadmore.load_data');



Route::any('products-search', [ProductsController::class,'filter_products'])->name('products.search');
Route::any('productssearch', [ProductsController::class,'products_header_search'])->name('products.headersearch');

Route::get('/payment', [ProductsController::class,'show_payments'])->name('pay.payment');


Route::post('/product/add/cart', [CartController::class,'addToCart'])->name('product.add.cart');
Route::get('/cart', [CartController::class,'getCart'])->name('orders.show_cart');
Route::get('review-cart', [CartController::class,'show_checkout_review'])->name('orders.review_cart');
Route::get('/cart/item/{id}/remove', [CartController::class,'removeItem'])->name('checkout.cart.remove');
Route::post('/cart/item/{id}/update', [CartController::class,'update_cart'])->name('checkout.cart.update');

Route::get('/checkout', [CartController::class,'show_checkout'])->name('orders.checkout'); 

Route::get('/guestcheckout', [CartController::class,'guest_checkout'])->name('guest.checkout');
Route::post('guest-checkout', [CartController::class,'guest_checkout_review'])->name('post.guest.checkout'); 

Route::post('address-auto-filling', [MyAccountController::class, 'address_auto_filling'])->name('address.auto.filling');


Route::post('apply-coupon', [CartController::class,'checkCoupon'])->name('apply.coupon');
Route::post('apply-coupon-remove', [CartController::class,'checkCoupon_remove'])->name('apply.coupon.remove');



Route::post('/color/{id}', [CartController::class,'capture_alterations'])->name('capture.alterations');
Route::post('product-sleeve-alterations', [CartController::class,'capture_sleeve_alterations'])->name('product.sleeve.alterations');
Route::post('product-alterations', [CartController::class,'capture_sl_alterations'])->name('product.alterations');



Route::get('/color/{id}/edit', [CartController::class,'update_alterations'])->name('update.alterations');


Route::get('/migrate_cart_order_tables', [RazorpayController::class,'migrate_cart_order_tables'])->name('migrate.cart.order.tables');
Route::get('/missed_alteration_order_table', [RazorpayController::class,'missed_alteration_order_table'])->name('missed.alteration.order.table');






Route::get('/merge_cart_items', [CartController::class,'merge_cart_items'])->name('merge.cart.items');
Route::get('update-cartnew-prices', [CartController::class,'update_cartnew_prices'])->name('update.cartnew.prices');

Route::get('wishlist-store/{id?}', [WishlistController::class,'store'])->name('wishlist.store');
Route::get('wishlist-destroy/{id?}', [WishlistController::class,'destroy'])->name('wishlist.destroy');

Route::get('/wishlist', [WishlistController::class,'index'])->name('wishlist.index');

Route::post('custom-registration', [CustomerController::class,'customRegistration'])->name('register.customer');
Route::post('custom-login', [CustomerController::class,'customLogin'])->name('register.login');

Route::post('checkout-registration', [CartController::class,'show_checkout_review'])->name('register.checkout');

Route::any('customer-logout', [CustomerController::class,'logout'])->name('register.logout');



Route::get('/products/locations', function () {	
    return view('frontend.product_location');
});



Route::any('customer-myaccount', [CustomerController::class,'customRegistration'])->name('customer.myaccount');
Route::any('customer-signin', [CustomerController::class,'signin'])->name('customer.signin');

Route::any('myorders', [MyAccountController::class,'my_account'])->name('customer.myaccount');
Route::any('myorders/{order_number}', [MyAccountController::class,'my_order_view']);
Route::any('myprofile', [MyAccountController::class,'my_profile']);
Route::any('myfitprofile', [MyAccountController::class,'my_fit_profile']);
Route::get('myfitprofile/add', [MyAccountController::class,'my_fit_profile_add']);
Route::post('myfitprofile/store', [MyAccountController::class,'my_fit_profile_store']);
Route::get('myfitprofile/edit/{slug}', [MyAccountController::class,'my_fit_profile_edit']);
Route::post('myfitprofile/update', [MyAccountController::class,'my_fit_profile_update']);
Route::get('myfitprofile/delete/{id}', [MyAccountController::class,'my_fit_profile_delete']);
Route::post('myprofile/update', [MyAccountController::class,'my_profile_update']);
Route::any('myaddresses', [MyAccountController::class,'my_addresses']);
Route::any('myaddresses/create', [MyAccountController::class,'my_addresses_create']);
Route::post('myaddresses/store', [MyAccountController::class,'store_address']);
Route::get('myaddresses/edit/{id}', [MyAccountController::class,'edit_address']);
Route::post('myaddresses/update', [MyAccountController::class,'update_address']);
Route::get('myaddresses/delete/{id}', [MyAccountController::class,'delete_address']);
Route::get('change_password', [MyAccountController::class,'change_password']);


Route::post('change_password/store', [MyAccountController::class,'store_change_password']);
Route::get('mycoupons', [MyAccountController::class,'my_coupons']);
Route::get('mywishlist', [MyAccountController::class,'my_wishlist']);
Route::get('mytickets', [MyAccountController::class,'my_tickets']);


Route::any('payment-selected', function (Request $request) {	
if($request->paymentMode=="epay-razorpay")
{
	return view('frontend.razorpayform');
}
else{
	//return redirect()->back()->with('error', 'Selected Payment gateway not activated.');
}

})->name('payment.selected');

Route::get('contact-us', [ContactsController::class,'frontend_contact_page'])->name('frontend.contactus');
Route::post('contact-us/store', [ContactsController::class,'store_contact']);
Route::get('/help', [ContentPagesController::class,'show_help_page']);
Route::get('/registration', [ContentPagesController::class,'show_registration_page'])->name('registeration.form');
// Route::get('/terms_conditions', [ContentPagesController::class,'show_terms_conditions_page']);
// Route::get('/faqs', [ContentPagesController::class,'show_faqs_page']);
// Route::get('/how_it_works', [ContentPagesController::class,'show_how_it_works']);
// Route::get('/canellation_and_refund_policy', [ContentPagesController::class,'show_canc_refund_page']);
// Route::get('/shipping_and_delivery', [ContentPagesController::class,'show_shipping_delivery_page']);
// Route::get('/disclaimer', [ContentPagesController::class,'show_disclaimer_page']);
// Route::get('/privany_policy', [ContentPagesController::class,'show_privany_policy_page']);



Route::group(['middleware' => 'under-construction'], function () {	

	Route::get('/blog', function() {  });


	
});



Route::get('/test-mail', function()
{
	$beautymail = app()->make(Snowfire\Beautymail\Beautymail::class);
	$beautymail->send('emails.welcome', [], function($message)
	{
		$message
			->from('bar@example.com')
			->to('foo@example.com', 'John Smith')
			->subject('Welcome!');
	});

});


Route::get('login/{provider}', [SocialAccountController::class,'redirectToProvider']);
Route::get('login/{provider}/callback', [SocialAccountController::class,'handleProviderCallback']);



/*Admin Departments */
Route::get('admin/departments',[CategoriesController::class,'department_listing'])->middleware('admin');
Route::get('admin/departments/create',[CategoriesController::class,'create_department'])->middleware('admin');
Route::post('admin/departments/store',[CategoriesController::class,'store_department'])->middleware('admin');
Route::get('admin/departments/edit/{id}',[CategoriesController::class,'edit_department'])->middleware('admin');
Route::post('admin/departments/update',[CategoriesController::class,'update_department'])->middleware('admin');
Route::get('admin/departments/delete/{id}',[CategoriesController::class,'delete_department'])->middleware('admin');


Route::post('newsletter',[NewsletterController::class,'store_newsletter'])->name('newsletter.post');

Route::get('admin/newsletters',[NewsletterController::class,'listing'])->middleware('admin');

/*Admin Categories */
Route::resource('admin/categories', CategoriesController::class)->middleware('admin');
Route::get('admin/categories/create',[CategoriesController::class,'create_category'])->middleware('admin');
Route::post('admin/categories/store',[CategoriesController::class,'store_category'])->middleware('admin');
Route::get('admin/categories/edit/{id}',[CategoriesController::class,'edit_category'])->middleware('admin');
Route::post('admin/categories/update',[CategoriesController::class,'update_category'])->middleware('admin');
Route::get('admin/categories/delete/{id}',[CategoriesController::class,'delete_category'])->middleware('admin');

/*Admin Orders */


/*Admin Theme options*/
Route::resource('admin/theme_options', ThemeoptionsController::class)->middleware('admin');
Route::get('admin/theme_options/create',[ThemeoptionsController::class,'create_theme_options'])->middleware('admin');
Route::post('admin/theme_options/store',[ThemeoptionsController::class,'store_theme_options'])->middleware('admin');
Route::get('admin/theme_options/edit/{id}',[ThemeoptionsController::class,'edit_theme_options'])->middleware('admin');
Route::post('admin/theme_options/update',[ThemeoptionsController::class,'update_theme_options'])->middleware('admin');
Route::get('admin/theme_options/delete/{id}',[ThemeoptionsController::class,'delete_theme_options'])->middleware('admin');

/*Admin Menu */
Route::resource('admin/menu', MenuController::class)->middleware('admin');
Route::get('admin/menu/create',[MenuController::class,'create_menu'])->middleware('admin');
Route::post('admin/menu/store',[MenuController::class,'store_menu'])->middleware('admin');
Route::get('admin/menu/edit/{id}',[MenuController::class,'edit_menu'])->middleware('admin');
Route::post('admin/menu/update',[MenuController::class,'update_menu'])->middleware('admin');
Route::get('admin/menu/delete/{id}',[MenuController::class,'delete_menu'])->middleware('admin');


Route::get('admin/banners',[HomeController::class,'list_banners']);
Route::post('admin/store_homepagebanners',[HomeController::class,'store_homepagebanner']);
Route::get('admin/edit_homepagebanner/{id}',[HomeController::class,'edit_banner']);
Route::get('admin/homebanner/add',[HomeController::class,'create_banners']);

Route::post('admin/update_homepagebanners',[HomeController::class,'update_homepagebanners']);

Route::get('admin/delete_homepagebanner/{id}',[HomeController::class,'delete_banner']);


/*Admin Testimonials*/

Route::get('admin/testimonials/',[HomeController::class,'show_testimonials'])->middleware('admin');

Route::get('admin/testimonials/add',[HomeController::class,'create_testimonials'])->middleware('admin');
Route::get('admin/edit_testimonials/{id}/',[HomeController::class,'edit_testimonials'])->middleware('admin');
Route::post('admin/store_testimonials',[HomeController::class,'store_testimonials'])->middleware('admin');
Route::post('admin/update_testimonials',[HomeController::class,'update_testimonials'])->middleware('admin');
Route::get('admin/delete_testimonials/{id}',[HomeController::class,'delete_testimonials'])->middleware('admin');

/* Admin Home Page banners URL */


Route::get('/locations', [LocationsController::class,'frontend_view'])->name('froentend.stores');

Route::get('/{slug}', [PageController::class,'frontend']);

/*Admin Locations*/
Route::resource('admin/locations', LocationsController::class)->middleware('admin');
Route::get('admin/location/create',[LocationsController::class,'create_location'])->middleware('admin')->middleware('admin');
Route::post('admin/location/store',[LocationsController::class,'store_location'])->middleware('admin');
Route::get('admin/location/edit/{id}',[LocationsController::class,'edit_location'])->middleware('admin');
Route::post('admin/location/update',[LocationsController::class,'update_location'])->middleware('admin');
Route::get('admin/location/delete/{id}',[LocationsController::class,'delete_location'])->middleware('admin');
/*Admin Fashion journals*/
Route::resource('admin/fashionjournals', FashionjournalsController::class)->middleware('admin');
Route::get('admin/fashionjournals/create',[FashionjournalsController::class,'create_fashionjournals'])->middleware('admin')->middleware('admin');
Route::post('admin/fashionjournals/store',[FashionjournalsController::class,'store_fashionjournals'])->middleware('admin');
Route::get('admin/fashionjournals/edit/{id}',[FashionjournalsController::class,'edit_fashionjournals'])->middleware('admin');
Route::post('admin/fashionjournals/update',[FashionjournalsController::class,'update_fashionjournals'])->middleware('admin');
Route::get('admin/fashionjournals/delete/{id}',[FashionjournalsController::class,'delete_fashionjournals'])->middleware('admin');

/*Admin Collections*/
Route::resource('admin/collections', CollectionsController::class)->middleware('admin');
Route::get('admin/collections/create',[CollectionsController::class,'create_collections'])->middleware('admin')->middleware('admin');
Route::post('admin/collections/store',[CollectionsController::class,'store_collections'])->middleware('admin');
Route::get('admin/collections/edit/{id}',[CollectionsController::class,'edit_collections'])->middleware('admin');
Route::post('admin/collections/update',[CollectionsController::class,'update_collections'])->middleware('admin');
Route::get('admin/collections/delete/{id}',[CollectionsController::class,'delete_collections'])->middleware('admin');

/*Admin Coupons*/
Route::resource('admin/coupons', CouponsController::class)->middleware('admin');
Route::get('admin/coupons/create',[CouponsController::class,'create_coupons'])->middleware('admin');
Route::post('admin/coupons/store',[CouponsController::class,'store_coupons'])->middleware('admin');
Route::get('admin/coupons/edit/{id}',[CouponsController::class,'edit_coupons'])->middleware('admin');
Route::post('admin/coupons/update',[CouponsController::class,'update_coupons'])->middleware('admin');
Route::get('admin/coupons/delete/{id}',[CouponsController::class,'delete_coupons'])->middleware('admin');



/*Frontend FAQs*/

Route::get('help/{slug}',[FAQsController::class,'frontend_faq']);
Route::post('help/form/store',[FAQsController::class,'store_form']);


/*Admin Attributes*/
Route::resource('admin/attributes', AttributesController::class)->middleware('admin');
Route::get('admin/attributes/create',[AttributesController::class,'create_attributes'])->middleware('admin');
Route::post('admin/attributes/store',[AttributesController::class,'store_attributes'])->middleware('admin');
Route::get('admin/attributes/edit/{id}',[AttributesController::class,'edit_attributes'])->middleware('admin');
Route::post('admin/attributes/update',[AttributesController::class,'update_attributes'])->middleware('admin');
Route::get('admin/attributes/delete/{id}',[AttributesController::class,'delete_attributes'])->middleware('admin');
/*Admin attributes_masters*/
Route::any('admin/attributes_masters', [AttributesMasterController::class,'listing'])->middleware('admin');
Route::get('admin/attributes_masters/create',[AttributesMasterController::class,'create_attributes_masters'])->middleware('admin');
Route::post('admin/attributes_masters/store',[AttributesMasterController::class,'store_attributes_masters'])->middleware('admin');
Route::get('admin/attributes_masters/edit/{id}',[AttributesMasterController::class,'edit_attributes_masters'])->middleware('admin');
Route::post('admin/attributes_masters/update',[AttributesMasterController::class,'update_attributes_masters'])->middleware('admin');
Route::post('admin/attributes_masters/delete',[AttributesMasterController::class,'delete_attributes_masters'])->middleware('admin');

/*Admin Parent Attributes*/
Route::resource('admin/parent_attributes', ParentAttributesController::class)->middleware('admin');
Route::get('admin/parent_attributes/create',[ParentAttributesController::class,'create_parent_attributes'])->middleware('admin');
Route::post('admin/parent_attributes/store',[ParentAttributesController::class,'store_parent_attributes'])->middleware('admin');
Route::get('admin/parent_attributes/edit/{id}',[ParentAttributesController::class,'edit_parent_attributes'])->middleware('admin');
Route::post('admin/parent_attributes/update',[ParentAttributesController::class,'update_parent_attributes'])->middleware('admin');
Route::get('admin/parent_attributes/delete/{id}',[ParentAttributesController::class,'delete_parent_attributes'])->middleware('admin');

/*Admin Bulk images Upload*/
//Route::get('admin/bulk_images_upload', [BulkImagesUploadController::class, 'dropzone']);
Route::post('dropzone/store', [BulkImagesUploadController::class, 'dropzoneStore'])->name('admin.dropzone.store');
Route::post('admin/bulk_images_upload/delete', [BulkImagesUploadController::class, 'destroy'])->middleware('admin');

Route::post('admin/bulk_images_upload', [BulkImagesUploadController::class, 'dropzone'])->middleware('admin');
/*Admin Contacts*/


Route::resource('admin/contacts', ContactsController::class)->middleware('admin');

Route::get('admin/customers',[CustomerController::class,'customers_view'])->middleware('admin');
Route::post('admin/changeStatus', [CustomerController::class,'changeStatus']);
Route::get('admin/products',[ProductsController::class,'get_products'])->middleware('admin');
Route::get('admin/products/create',[ProductsController::class,'create_products'])->middleware('admin')->middleware('admin');
Route::post('admin/products/store',[ProductsController::class,'store_products'])->middleware('admin');
Route::get('admin/products/edit/{id}',[ProductsController::class,'edit_products'])->middleware('admin')->middleware('admin')->middleware('admin');
Route::post('admin/products/update',[ProductsController::class,'update_products'])->middleware('admin')->middleware('admin');
Route::get('admin/product/delete_product/{id}',[ProductsController::class,'delete_product'])->middleware('admin')->middleware('admin');
Route::post('admin/products_seo/update',[ProductsController::class,'update_products_seo'])->middleware('admin');
Route::post('admin/products_images/update',[ProductsController::class,'store_images'])->middleware('admin');
Route::post('admin/products/skus/store',[ProductsController::class,'store_skus'])->middleware('admin');
Route::get('admin/products/{id}',[ProductsController::class,'single_product'])->middleware('admin');
Route::post('admin/products/skus_stock/update',[ProductsController::class,'update_skus_stock'])->middleware('admin');

Route::get('admin/products/skus/edit/{id}',[ProductsController::class,'edit_skus'])->middleware('admin')->middleware('admin');
Route::post('admin/products/skus/update',[ProductsController::class,'update_skus'])->middleware('admin');
Route::get('admin/products/skus/delete/{id}',[ProductsController::class,'delete_skus'])->middleware('admin');

Route::post('admin/products/attribute_values/store',[ProductsController::class,'store_attr_values'])->middleware('admin');


/*admin- Users */

Route::get('admin/users', [UsermanagementController::class,'index'])->middleware('admin');
Route::get('admin/user/create', [UsermanagementController::class,'create_user'])->middleware('admin');
Route::post('admin/user/store', [UsermanagementController::class, 'store_user'])->middleware('admin');
Route::get('admin/user/edit/{id}',[UsermanagementController::class,'edit_user'])->middleware('admin')->middleware('admin');
Route::post('admin/user/update',[UsermanagementController::class,'update_user'])->middleware('admin');
Route::get('admin/user/delete/{id}',[UsermanagementController::class,'delete_user'])->middleware('admin')->middleware('admin');
Route::get('admin/profile/',[UsermanagementController::class,'profile'])->middleware('admin');
Route::post('admin/profile/update',[UsermanagementController::class,'update_profile'])->middleware('admin');

/*Admin Locations*/
Route::resource('admin/shipping_rates', ShippingRatesController::class)->middleware('admin');
Route::get('admin/shipping_rates/create',[ShippingRatesController::class,'create_shipping_rates'])->middleware('admin')->middleware('admin');
Route::post('admin/shipping_rates/store',[ShippingRatesController::class,'store_shipping_rates'])->middleware('admin');
Route::get('admin/shipping_rates/edit/{id}',[ShippingRatesController::class,'edit_shipping_rates'])->middleware('admin')->middleware('admin');
Route::post('admin/shipping_rates/update',[ShippingRatesController::class,'update_shipping_rates'])->middleware('admin');
Route::get('admin/shipping_rates/delete/{id}',[ShippingRatesController::class,'delete_shipping_rates'])->middleware('admin');


Route::any('admin/abandoned_carts', [OrdersController::class,'abandoned_list']);

Route::post('admin/update_order_id', [OrdersController::class,'update_order_id']);

/* Don't add ROute after this line, Just add before of this */
Route::get('admin/underconstruction/',[CouponsController::class,'underconstruction'])->middleware('admin');



/* GTM tracking options*/
Route::resource('admin/gtm_tracking', GTMTrackingController::class)->middleware('admin');
Route::get('admin/gtm_tracking/create',[GTMTrackingController::class,'create_tracking_options'])->middleware('admin');
Route::post('admin/gtm_tracking/store',[GTMTrackingController::class,'store_tracking_options'])->middleware('admin');
Route::get('admin/gtm_tracking/edit/{id}',[GTMTrackingController::class,'edit_tracking_options'])->middleware('admin');
Route::post('admin/gtm_tracking/update',[GTMTrackingController::class,'update_tracking_options'])->middleware('admin');
Route::get('admin/gtm_tracking/delete/{id}',[GTMTrackingController::class,'delete_tracking_options'])->middleware('admin');


Route::get('admin/check_stock_morethanexist', [ImportExportController::class, 'is_stock_morethan_existstock'])->name('check.stock.morethanexist');


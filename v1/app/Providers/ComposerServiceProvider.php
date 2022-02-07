<?php

namespace App\Providers;
use App\Models\Cart;
use App\Models\Cart_details;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Wishlist;
use AppWishlist;
use Auth;


class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //		
			View::composer('frontend.common_pages.nav', function ($view) {
				
				
				
		$user = \Auth::user();	
		if (Auth::check()) {		
		$basicCart_details=Cart_details::select('cart_items.alter_sleeves as alter_sleeves','cart_items.alter_dress as alter_dress','products.slug as slug','cart_items.unit_price as unit_price','cart_items.price as itemprice','cart_items.id as itemid','cart_items.qty as itemqty','skus.id as skuid','products.id as pid','products.code as pcode','products.name as pname','skus.price_inr as pprice')
		->leftjoin('skus','skus.id','=','cart_items.sku_id')
		->leftjoin('products','skus.product_id','=','products.id')
		->leftjoin('carts','carts.id','=','cart_items.cart_id')
		->where("carts.user_id",$user->id)
		->where("carts.order_status",'!=','placed')
		->get();		
		}
		else{
		$basicCart_details=Cart_details::select('cart_items.alter_sleeves as alter_sleeves','cart_items.alter_dress as alter_dress','products.slug as slug','cart_items.unit_price as unit_price','cart_items.price as itemprice','cart_items.id as itemid','cart_items.qty as itemqty','skus.id as skuid','products.id as pid','products.code as pcode','products.name as pname','skus.price_inr as pprice')
		->leftjoin('skus','skus.id','=','cart_items.sku_id')
		->leftjoin('products','skus.product_id','=','products.id')
		->leftjoin('carts','carts.id','=','cart_items.cart_id')
		->where("cart_id",session()->get('cart'))
		->where("carts.order_status",'!=','placed')
		->get();
		}
				
			$cart_items_count=$basicCart_details->count();
				
			$view->with('cartCount', $cart_items_count);
			});
			
			View::composer('frontend.common_pages.nav', function ($view) {
				
			if (Auth::check()) {
			$user = Auth::user();
			$wishlists = Wishlist::where("user_id", "=", $user->id)->count();
			}
			else{
			$wishlists=0;
			}
				
			$view->with('wishlistsCount', $wishlists);
			});
    
	
    }
}

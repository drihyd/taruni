<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LinkedSocialAccount;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Cart_details;
use App\Models\Used_coupons;
use DB;
use Carbon;
class SocialAccountController extends Controller
{
   /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return \Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information
     *
     * @return Response
     */
    public function handleProviderCallback(\App\Providers\SocialAccountService $accountService, $provider)
    {

        try {
            $user = \Socialite::with($provider)->user();
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'something went wrong. please try again.');
        }

        $authUser = $accountService->findOrCreate(
            $user,
            $provider
        );

        auth()->login($authUser, true);
		
		
		if (Auth::check()) {				
			if(session()->get('cart')){
				Cart::updateOrCreate(
				['id' =>session()->get('cart')],			
				[
				'user_id' => Auth::user()->id,
				'session_id' => Auth::user()->id,
				]
				);	
				
			/* Update userid into used coupons table */

				$Used_coupon = Used_coupons::select('cart_id')->where('cart_id',session()->get('cart'))->get();
				
				if($Used_coupon->count()>0) {
				Used_coupons::updateOrCreate(
					['cart_id' =>session()->get('cart')],			
					[
					 'user_id' => Auth::user()->id,					
					]
				);
				
				}
					
					
				if(Auth::user()) {
					User::updateOrCreate(
					['is_email_verified' =>1],			
					[
					'id' => Auth::user()->id,					
					]
					);
				}
				
			}
			
			\App::call('App\Http\Controllers\CartController@merge_cart_items');
		}

       return redirect()->to('/cart')->with('message', "Successfully logged in.");
    }
}

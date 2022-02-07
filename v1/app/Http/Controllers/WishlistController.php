<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use AppWishlist;
use Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\Products;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{	
	
	public function __construct() {

    }
	
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
		public function index()
		{
			
			
				
			
			$pageTitle="Wishlist";
			if (Auth::check()) {
			// The user is logged in...
				$user = Auth::user();
				//$wishlists = Wishlist::where("user_id", "=", $user->id)->orderby('id', 'desc');

				$wishlists=Wishlist::select('wishlists.id as wid','skus.id as skuid','products.id as pid','products.code as pcode','products.name as pname','skus.price_'.session()->get('appcurrency').' as pprice','products.slug as pslug')
				->leftjoin('products','products.id','=','wishlists.product_id')
				->leftjoin('skus','skus.product_id','=','products.id')				
				->where('skus.sku_code','LIKE',"%-1")
				->where("wishlists.user_id",$user->id)
				->get();


				foreach ($wishlists as $key => $value) {
				$wishlists[$key]->images = DB::table('skus')->select('skus.price_'.session()->get('appcurrency').' as pprice')
				->where('skus.product_id', $value->pid)
				->where('skus.price_'.session()->get('appcurrency'), '>',0)
				->limit(1)
				->get();
				}	
				
			
				
				
				return view('frontend.wishlist', compact('user', 'wishlists','pageTitle'));
			}
			else{
			 return redirect()->back()->with('error', 'Please login before adding a wishlist.');
			}

		}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  public function store($keyid=false)
    {
		
		

		
	if (Auth::check()) {
	$product_id=Crypt::decryptString($keyid);
	// The user is logged in...
	$user = Auth::user();
	$wishlists = Wishlist::where("user_id", "=", $user->id)->orderby('id', 'desc');
	//Validating title and body field
	/* $this->validate($request, array(
	'user_id'=>'required',
	'product_id' =>'required',
	)); */

$status=Wishlist::where('user_id',Auth::user()->id)
->where('product_id',$product_id)
->first();
if(isset($status->user_id) and isset($product_id))
   {
       return redirect()->back()->with('error', 'This item is already in your wishlist!');
   }
   else
   {
       $wishlist = new Wishlist;
       $wishlist->user_id = $user->id;
       $wishlist->product_id = $product_id;
       $wishlist->save();

       //return redirect()->back()->with('message','Item, '. $wishlist->product->title.' Added to your wishlist.');
	     return redirect('/mywishlist')->with('success', 'Added to your wishlist.');
   }
   
   
   
 
   
   
   	
			}
			else{
			 return redirect()->back()->with('error', 'Please login before adding a wishlist.');
			}
			
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
		$id=Crypt::decryptString($id);
		if($wishlist = Wishlist::findOrFail($id)){
			
		$wishlist->delete();
/* 
		return redirect()->route('wishlist.index')
		->with('message',
		'Item successfully deleted'); */
		return redirect('/mywishlist')->with('error', 'Success! Details are deleted successfully');
		
		}
		  
		else{
			
		return redirect('/mywishlist')->with('error', 'Something went wrong.');
		/* return redirect()->route('wishlist.index')
		->with('error',
		'Something went wrong.'); */
		}
			  
		  
    }
}

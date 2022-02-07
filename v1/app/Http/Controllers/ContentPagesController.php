<?php

namespace App\Http\Controllers;

use App\Models\Content_pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContentPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
	
	 
	
	public function show_help_page()
    {
        //		
		return view('frontend.help');
    }  	
	public function show_registration_page()
    {
        //	
		if(Auth::check()) {		
		  return redirect('/');
		}
		else{
		return view('frontend.registration');
		}
    }  	
	
	public function show_terms_conditions_page()
    {
        //		
		return view('frontend.terms_conditions');
    } 	
	public function show_faqs_page()
    {
        //		
		return view('frontend.faqs');
    }  
	public function show_how_it_works()
    {
        //
		return view('frontend.how_it_works');
    }  		
	
	public function show_canc_refund_page()
    {
        //
		return view('frontend.canc_refund');
    } 	
	public function show_shipping_delivery_page()
    {
        //
		return view('frontend.shipping_delivery');
    }  
	
		public function show_disclaimer_page()
    {
        //
		return view('frontend.disclaimer');
    }  
	
		public function show_privany_policy_page()
    {
        //
		return view('frontend.privany_policy');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Content_pages  $content_pages
     * @return \Illuminate\Http\Response
     */
    public function show(Content_pages $content_pages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Content_pages  $content_pages
     * @return \Illuminate\Http\Response
     */
    public function edit(Content_pages $content_pages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Content_pages  $content_pages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Content_pages $content_pages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Content_pages  $content_pages
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content_pages $content_pages)
    {
        //
    }
}

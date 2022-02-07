<?php

namespace App\Http\Controllers;

use App\Models\DataStatistics;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DataStatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		
		 $elastic_statics=\App::call('App\Http\Controllers\DataStatisticsController@ElasticAccountInfo');
	
    } 

	public function ElasticAccountInfo(Request $request)
    {		
	
		$APIURL="https://api.elasticemail.com/v2/account/load?apikey=".env('ELASTIC_APIKEY');
		$country="macedonia";
		$type="confirmed";		
        $today = Carbon::now()->toDateString();
        $httpClient = new \GuzzleHttp\Client();
        $request =
            $httpClient
                ->get($APIURL);
        $response = json_decode($request->getBody()->getContents());
		return  $response;
       //$response[count($response) - 1];
	
        //
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
     * @param  \App\Models\DataStatistics  $dataStatistics
     * @return \Illuminate\Http\Response
     */
    public function show(DataStatistics $dataStatistics)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataStatistics  $dataStatistics
     * @return \Illuminate\Http\Response
     */
    public function edit(DataStatistics $dataStatistics)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataStatistics  $dataStatistics
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataStatistics $dataStatistics)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataStatistics  $dataStatistics
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataStatistics $dataStatistics)
    {
        //
    }
}

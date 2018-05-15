<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use Illuminate\Support\Facades\DB;

class TurnOverController extends Controller
{
    /**
     * Redirect to view for choosing dates.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('turnoverChoose');
    }

    /**
     * Prepare data from selected period.
     * Redirect to view with total purchase turnover for countries.
     *
     * @return \Illuminate\Http\Response
     */
    public function turnover(Request $request)
    {
        //taking choosen dates
        $from = $request->get('from');
        $to = $request->get('to');

        $countries = DB::select('SELECT country_id, sum(amount) as sum FROM bills where DATE(created_at) <= "'.$to.'" and DATE(created_at) >= "'.$from.'" GROUP by country_id');
        $allCountries = array();        
        foreach ($countries as $country)
        {
            $thatCountry = Country::findOrFail($country->country_id);
            $allCountries[$thatCountry->name] = array($thatCountry->pdv, $country->sum);
        }
        
        return view('turnover', ['countries' => $allCountries]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Shetabit\Visitor\Models\Visit;
use Stevebauman\Location\Facades\Location;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($lang)
    {
        $visitors = DB::table('shetabit_visits as v1')
            ->join(DB::raw('(SELECT ip, url, MAX(created_at) as max_created_at
                    FROM shetabit_visits 
                    GROUP BY ip, url) as v2'), function($join) {
                $join->on('v1.ip', '=', 'v2.ip')
                     ->on('v1.url', '=', 'v2.url')
                     ->on('v1.created_at', '=', 'v2.max_created_at');
            })
            ->select('v1.ip', 'v1.url', 'v1.method', 'v1.platform', 'v1.browser', 'v1.created_at')
            ->orderBy('v1.created_at', 'desc')
            ->paginate(10);

        foreach($visitors as $visitor) {
            if($locationData = Location::get($visitor->ip)) {
                $visitor->location = [
                    'country' => $locationData->countryName,
                    'city' => $locationData->cityName,
                    'region' => $locationData->regionName,
                    'latitude' => $locationData->latitude,
                    'longitude' => $locationData->longitude
                ];
            }
        }

        return view('visitors.index', compact('visitors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

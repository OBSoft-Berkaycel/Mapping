<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\GoogleApi;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view('locations.index', compact('locations'));
    }

    public function create()
    {
        return view('locations.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|string",
            "longitude" => "required|decimal:3,4",
            "latitude" => "required|decimal:3,4",
            "color" => [
                'required',
                'regex:/^#([a-f0-9]{6}|[a-f0-9]{3})$/i',
                'unique:locations',
            ],
        ]);
    
        if ($validator->fails()) {
            flash()->addError(implode(" </br> ",$validator->errors()->all()));
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $location = new Location();
        $location->name = $request->name;
        $location->longitude = $request->longitude;
        $location->latitude = $request->latitude;
        $location->color = $request->color;
        $location->save();
        flash()->addSuccess('Location infos were saved successfully!');
        return redirect()->route('locations.index');
    }

    public function show(Location $location)
    {
        $google_api = GoogleApi::first();
        $api_key = null;
        if($google_api)
        {
            $api_key = $google_api->api_key;
        }
        return view('locations.show', compact('location','api_key'));
    }

    public function update(Request $request, Location $location)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|string",
            "longitude" => "required|decimal:3,4",
            "latitude" => "required|decimal:3,4",
            "color" => [
                'required',
                'regex:/^#([a-f0-9]{6}|[a-f0-9]{3})$/i',
                'unique:locations,color,' . $location->id . ',id',
            ],
        ]);
    
        if ($validator->fails()) {
            flash()->addError(implode(" </br> ",$validator->errors()->all()));
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $location->name = $request->name;
        $location->longitude = $request->longitude;
        $location->latitude = $request->latitude;
        $location->color = $request->color;
        $location->save();
        flash()->addSuccess('Location informations were updated successfully!');
        return redirect()->route('locations.index');
    }

    public function destroy(Location $location)
    {
        $location->delete();
        flash()->addSuccess('Location informations were deleted successfully!');
        return redirect()->route('locations.index');
    }
}


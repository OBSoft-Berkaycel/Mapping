<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

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
        $request->validate([
            "name" => "required|string",
            "longitude" => "required|decimal:3,4",
            "latitude" => "required|decimal:3,4",
            "color" => [
                'required',
                'regex:/^#([a-f0-9]{6}|[a-f0-9]{3})$/i',
                'unique:locations',
            ],
        ]);
        $location = new Location();
        $location->name = $request->name;
        $location->longitude = $request->longitude;
        $location->latitude = $request->latitude;
        $location->color = $request->color;
        $location->save();
        return redirect()->route('locations.index');
    }

    public function show(Location $location)
    {
        return view('locations.show', compact('location'));
    }

    public function update(Request $request, Location $location)
    {
        $request->validate([
            "name" => "required|string",
            "longitude" => "required|decimal:3,4",
            "latitude" => "required|decimal:3,4",
            "color" => [
                'required',
                'regex:/^#([a-f0-9]{6}|[a-f0-9]{3})$/i',
                'unique:locations,color,' . $location->id . ',id',
            ],
        ]);
        $location->name = $request->name;
        $location->longitude = $request->longitude;
        $location->latitude = $request->latitude;
        $location->color = $request->color;
        $location->save();
        return redirect()->route('locations.index');
    }

    public function destroy(Location $location)
    {
        $location->delete();
        return redirect()->route('locations.index');
    }
}


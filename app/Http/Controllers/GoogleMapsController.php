<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GoogleApi;
use Illuminate\Support\Facades\Validator;

class GoogleMapsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apis = GoogleApi::all();
        return view('google.index',compact('apis'));
    }

    /**
     * Create a resource
     */
    public function create()
    {
        return view('google.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|string",
            "api_key" => "required|string",
        ]);
    
        if ($validator->fails()) {
            flash()->addError(implode(" </br> ",$validator->errors()->all()));
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $api = new GoogleApi();
        $api->name = $request->name;
        $api->api_key = $request->api_key;
        $api->save();
        flash()->addSuccess('New Api Key saved successfully!');
        return redirect()->route('google.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(GoogleApi $api)
    {
        return view('google.show',compact('api'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GoogleApi $api)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|string",
            "api_key" => [
                'required',
                'unique:google_apis,api_key,' . $api->id . ',id',
            ],
        ]);
    
        if ($validator->fails()) {
            flash()->addError(implode(" </br> ",$validator->errors()->all()));
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $api->name = $request->name;
        $api->api_key = $request->api_key;
        $api->save();
        flash()->addSuccess('Api informations were updated successfully!');
        return redirect()->route('google.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GoogleApi $api)
    {
        $api->delete();
        flash()->addSuccess('Api informations were deleted successfully!');
        return redirect()->route('google.index');
    }
}

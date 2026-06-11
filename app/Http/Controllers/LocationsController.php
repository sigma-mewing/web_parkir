<?php

namespace App\Http\Controllers;

use App\Models\locations;
use Illuminate\Http\Request;

class LocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = locations::all();
        return view(
            'location.index',
            compact('locations'),
            ['title' => "locations"]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('location.create', [
            'title' => "locations",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validasi Data
        $request->validate([
            'location_name' => 'required|max:150',
            'max_motorcyle' => 'required',
            'max_car' => 'required',
            'max_other' => 'required',
          

        ]);


        // 2. Simpan ke Database
        locations::create([
            'location_name' => $request->location_name,
            'max_motorcyle' => $request->max_motorcyle,
            'max_car' => $request->max_car,
            'max_other' => $request->max_other,

        ]);

        // 3. Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('location.index')->with('success', 'data created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(locations $locations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(locations $locations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, locations $locations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(locations $locations)
    {
        //
    }
}

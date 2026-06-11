<?php

namespace App\Http\Controllers;

use App\Models\vehicle_types;
use Illuminate\Http\Request;

class VehicleTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicle_types = vehicle_types::all();
        return view(
            'vehicle.index',
            compact('vehicle_types'),
            ['title' => "vehicle"]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vehicle.create', [
            'title' => "vehicle"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required|in:motorcycle,car,other',
            'perjam_pertama' => 'required|integer|min:0',
            'perjam_berikutnya' => 'required|integer|min:0',
            'max_perhari' => 'required|integer|min:0',
        ]);

        $existingType = vehicle_types::where('jenis', $request->jenis)->first();

        if ($existingType) {
            return redirect()->route('vehicle.create')
                ->with('duplikat', 'Vehicle type for "' . ucfirst($request->jenis) . '" already exists. Please update the existing data instead.')
                ->withInput();
        }

        vehicle_types::create($request->all());

        return redirect()->route('vehicle.index')
            ->with('simpan', 'New Vehicle Type has been successfully saved.');
    }

    /**
     * Display the specified resource.
     */
    public function show(vehicle_types $vehicle_types)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(vehicle_types $vehicle_types)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, vehicle_types $vehicle_types)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(vehicle_types $vehicle_types)
    {
        //
    }
}

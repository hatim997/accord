<?php

namespace App\Http\Controllers;

use App\Models\DriverDetail;
use Illuminate\Http\Request;
use App\Models\Notice;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drivers = DriverDetail::get();
        return view('drivers.index', compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('drivers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required'
        ]);

        $driver = new DriverDetail();
        $driver->address = $request->address;
        $driver->contact_info = $request->contact_info;
        $driver->email = $request->email;
        $driver->license_number = $request->license_number;
        $driver->license_expiry_date = $request->license_expiry_date;
        $driver->license_type = $request->license_type;
        $driver->years_of_experience = $request->years_of_experience;
        $driver->vehicle_registration_number = $request->vehicle_registration_number;
        $driver->vehicle_make = $request->vehicle_make;
        $driver->vehicle_model = $request->vehicle_model;
        $driver->vehicle_year = $request->vehicle_year;
        $driver->vehicle_capacity = $request->vehicle_capacity;
        $driver->vehicle_status = $request->vehicle_status;
        $driver->mc_number = $request->mc_number;
        $driver->save();

        return redirect()->route('drivers');
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

<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Driver;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Booking::with('user', 'driver', 'vehicle')->get();

        return view('dashboard.bookings.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vehicle = Vehicle::where('status', '0')->get();

        $driver = Driver::where('status', '0')->get();
        $manager = User::where('roles', 'manager')->get();
        $staff = User::where('roles', 'staff')->get();

        // dd($staff);
        return view('dashboard.bookings.create', [
            'vehicle' => $vehicle,
            'driver' => $driver,
            'manager' => $manager,
            'staff' => $staff,
        ]);
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

<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Driver;
use App\Models\User;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $booking = Booking::with(['driver', 'vehicle'])->get();

        // dd($booking);

        return view('dashboard.bookings.index', ['booking' => $booking]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vehicle = Vehicle::where('status', '1')->get();

        $driver = Driver::where('status', '1')->get();
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
        try {
            $data = $request->all();

            $driver = Driver::find($data['driver_id']);
            $vehicle = Vehicle::find($data['vehicle_id']);

            if (!$driver) {
                throw new \Exception("Driver not found");
            }

            if (!$vehicle) {
                throw new \Exception("Vehicle not found");
            }


            $driver->status = '0';
            $driver->save();

            $vehicle->status = '0';
            $vehicle->save();

            Booking::create($data);

            return redirect()->route('bookings.index')->with('success', 'Booking created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
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
    public function edit(Booking $booking)
    {
        // Retrieve selected driver and vehicle
        $selectedDriver = $booking->driver;
        $selectedVehicle = $booking->vehicle;

        // dd($selectedDriver, $selectedVehicle);

        $vehicle = Vehicle::where('status', '1')->get();
        $driver = Driver::where('status', '1')->get();
        $manager = User::where('roles', 'manager')->get();
        $staff = User::where('roles', 'staff')->get();


        return view('dashboard.bookings.edit', [
            'data' => $booking,
            'vehicle' => $vehicle,
            'driver' => $driver,
            'manager' => $manager,
            'staff' => $staff,
            'selectedDriver' => $selectedDriver,
            'selectedVehicle' => $selectedVehicle,
        ]);
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        try {
            $data = $request->all();

            $driver = Driver::find($data['driver_id']);
            $vehicle = Vehicle::find($data['vehicle_id']);

            if (!$driver) {
                throw new \Exception("Driver not found");
            }

            if (!$vehicle) {
                throw new \Exception("Vehicle not found");
            }

            $driver->status = '0';
            $driver->save();

            $vehicle->status = '0';
            $vehicle->save();

            $booking->update($data);

            return redirect()->route('bookings.index')->with('success', 'Booking updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }




    /**
     * Remove the specified resource from storage.
     */


    public function destroy(string $id)
    {
        // Find the booking
        $booking = Booking::find($id);

        if (!$booking) {
            return redirect()->route('bookings.index')->with('error', 'Booking not found');
        }

        // Get the driver and vehicle associated with the booking
        $driver = $booking->driver;
        $vehicle = $booking->vehicle;

        if ($driver && $vehicle) {
            // Update the status of the driver and vehicle to 1 (available)
            $driver->update(['status' => 1]);
            $vehicle->update(['status' => 1]);
        }

        // Delete the booking
        $booking->delete();

        return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully');
    }
}

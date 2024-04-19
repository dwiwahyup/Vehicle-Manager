<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Driver;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $countDriver = Driver::count();
        $countAvailableDrivers = Driver::where('status', 1)->count();
        $countBookedDrivers = Driver::where('status', 0)->count();
        $countInactiveDrivers = Driver::where('status', 2)->count();

        $countVehicle = Vehicle::count();
        $countAvialableVehicles = Vehicle::where('status', 1)->count();
        $countBookedVehicles = Vehicle::where('status', 0)->count();
        $countFreightVehicles = Vehicle::where('type', 'Freight Vehicles')->count();
        $countPeopleTransportVehicles = Vehicle::where('type', 'People Transport Vehicles')->count();

        $bookingCount = Booking::count();
        $bookingApprove = Booking::where('approval_status_manager', 1)
            ->where('approval_status_staff', 1)
            ->count();
        $bookingPending = Booking::where('approval_status_manager', 0)
            ->orWhere('approval_status_staff', 0)
            ->count();
        $bookingRejected = Booking::where('approval_status_manager', 2)
            ->orWhere('approval_status_staff', 2)
            ->count();

        $countPeopleTransportVehicles = Vehicle::where('type', 'People Transport Vehicles')->count();
        $countFreightVehicles = Vehicle::where('type', 'Freight Vehicles')->count();


        return view('dashboard.dashboard', [
            'countPeopleTransportVehicles' => $countPeopleTransportVehicles,
            'countFreightVehicles' => $countFreightVehicles,

            'countDriver' => $countDriver,
            'countAvailableDrivers' => $countAvailableDrivers,
            'countBookedDrivers' => $countBookedDrivers,
            'countInactiveDrivers' => $countInactiveDrivers,


            'countVehicle' => $countVehicle,
            'countAvialableVehicles' => $countAvialableVehicles,
            'countBookedVehicles' => $countBookedVehicles,
            'countFreightVehicles' => $countFreightVehicles,
            'countPeopleTransportVehicles' => $countPeopleTransportVehicles,


            'bookingCount' => $bookingCount,
            'bookingApprove' => $bookingApprove,
            'bookingPending' => $bookingPending,
            'bookingRejected' => $bookingRejected,


        ]);
    }
}

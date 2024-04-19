<?php

namespace App\Http\Controllers;

use App\Exports\AllExport;
use App\Models\Booking;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $booking = Booking::where('approval_status_manager', '0')
            ->orWhere('approval_status_staff', '0')
            ->get();

        // dd($booking);

        return view('dashboard.approval.index', ['booking' => $booking]);
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
        //edit
        $booking = Booking::find($id);

        // dd($booking);
        return view('dashboard.approval.edit', ['booking' => $booking]);
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

    // Update Manager
    public function updateManager(Request $request, string $id)
    {
        $booking = Booking::find($id);
        $booking->approval_status_manager = $request->approval_status_manager;
        $booking->save();

        return redirect()->route('approval.index')->with('success', 'Booking has been updated');
    }

    // Update Staff
    public function updateStaff(Request $request, string $id)
    {
        $booking = Booking::find($id);
        $booking->approval_status_staff = $request->approval_status_staff;
        $booking->save();

        return redirect()->route('approval.index')->with('success', 'Booking has been updated');
    }


    //approved
    public function approved()
    {

        $year = Booking::selectRaw('YEAR(pickup_date) as year')
            ->where('approval_status_manager', '1')
            ->Where('approval_status_staff', '1')
            ->distinct()
            ->get();



        $booking = Booking::with('vehicle', 'driver')
            ->where('approval_status_manager', '1')
            ->Where('approval_status_staff', '1')
            ->get();

        return view('dashboard.approval.approved', ['booking' => $booking, 'year' => $year]);
    }

    //export all to excel
    public function allExport()
    {
        return Excel::download(new AllExport, 'all_data.xlsx');
    }


    //export by year
    public function exportByYear(Request $request)
    {
        // dd($request);
        $year = $request->year;

        $booking = Booking::with('vehicle', 'driver')
            ->where('approval_status_manager', '1')
            ->orWhere('approval_status_staff', '1')
            ->whereYear('pickup_date', $year)
            ->get();

        return Excel::download(new AllExport($booking), 'reportbyYear.xlsx');
    }
}

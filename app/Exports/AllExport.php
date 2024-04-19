<?php

namespace App\Exports;

use App\Models\Booking;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AllExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $booking = Booking::with('vehicle', 'driver')
            ->where('approval_status_manager', '1')
            ->orWhere('approval_status_staff', '1')
            ->get();

        // dd($booking);

        return view('dashboard.approval.partials.report', ['booking' => $booking]);
    }
}

<?php

namespace App\Exports;

use App\Models\Booking;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class ExportByYear implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */

    protected $year;
    public function __construct($year)
    {
        $this->year = $year;
    }


    public function view(): View
    {
        $booking = Booking::with('vehicle', 'driver')
            ->where('approval_status_manager', '1')
            ->orWhere('approval_status_staff', '1')
            ->whereYear('pickup_date', $this->year)
            ->get();

        dd($booking);
        return view('dashboard.approval.partials.report', ['booking' => $booking]);
    }
}

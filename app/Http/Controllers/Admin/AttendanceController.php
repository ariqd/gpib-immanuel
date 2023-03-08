<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        return view('admin.attendance.index');
    }

    public function validateQRCode(Request $request)
    {
        $qr_code = explode('-', $request->qr_code);
        $ticket = $qr_code[0];
        $seat = $qr_code[1];

        $bookingExists = Booking::with('worship')->where([
            ['booking_id', '=', $ticket],
            ['booking_seat', '=', $seat],
        ])->first();

        if ($bookingExists) {
            $date = Carbon::parse($bookingExists->worship->worship_date);
            if ($date->isPast()) {
                return response()->json([
                    'status_past' => "Scan gagal"
                ]);
            }

            $attendance = Attendance::firstOrCreate([
                'booking_id' => $ticket,
                'attendance_seat' => $seat,
            ]);

            if ($attendance->wasRecentlyCreated) {
                return response()->json([
                    'status_success' => "Scan berhasil",
                    'name' => $bookingExists->booking_name
                ]);
            } else {
                return response()->json([
                    'status_already_exists' => "Ticket sudah di-scan"
                ]);
            }
        }

        return response()->json([
            'status_error' => "Scan gagal"
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Booking;
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

        $bookingExists = Booking::where([
            ['booking_id', '=', $ticket],
            ['booking_seat', '=', $seat],
        ])->count();

        if ($bookingExists) {
            $attendance = Attendance::firstOrCreate([
                'booking_id' => $ticket,
                'attendance_seat' => $seat,
            ]);

            if ($attendance->wasRecentlyCreated) {
                return response()->json([
                    'status_success' => "Scan berhasil"
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

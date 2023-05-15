<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Worship;
use Illuminate\Support\Facades\Auth;
use Str;
use Illuminate\Support\Carbon;

class WorshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('worship.index', [
            'worships' => Worship::latest()->paginate(6)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $booking_id = Str::random(10);
        $errors = [];
        $worship_id = $input['worship_id'];

        foreach ($input['input'] as $seat) {
            $booking_exists = Booking::where([
                ['worship_id', '=', $worship_id],
                ['booking_seat', '=', $seat],
                ['fixed', '=', true]
            ])->get();

            if (!$booking_exists->isEmpty()) {
                $errors[$seat] = 'Kursi ' . $seat . ' telah dibooking oleh jemaat lain. Silahkan pilih kursi kembali';
            }
        }

        if (!empty($errors)) {
            return redirect()
                ->back()
                ->withErrors($errors)
                ->withInput();
        }

        foreach ($input['input'] as $seat) {
            Booking::create([
                'booking_id' => $booking_id,
                'worship_id' => $input['worship_id'],
                'booking_seat' => $seat,
                'user_id' => Auth::id(),
            ]);
        }

        return redirect()
            ->route('profile.bookings.create', ['booking_id' => $booking_id, 'worship_id' => $worship_id])
            ->with('success', 'Silahkan isi nama pemilik kursi untuk menyelesaikan pemesanan.');
    }

    public function show(Request $request, $id)
    {
        if ($request->s > 5 || $request->s < 1) {
            return redirect()
                ->route('worships.seat-count', ['id' => $id])
                ->with('success', 'Silahkan pilih kembali Jumlah Kursi yang dipesan.');
        }

        $booked_seats = Booking::where([
            ['worship_id', '=', $id],
            ['fixed', '=', TRUE],
        ])->pluck('booking_seat')->toArray();

        $worship = Worship::find($id);
        $datetime = $worship->worship_date . ' ' . $worship->worship_time;
        $worship_date = Carbon::parse($datetime);

        return view('worship.show', [
            'worship' => $worship,
            'booked_seats' => $booked_seats,
            'worship_date' => $worship_date,
            'seat_count' => $request->s
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

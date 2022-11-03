<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Worship;
use Illuminate\Support\Facades\Auth;
use Str;

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
            'worships' => Worship::orderBy('id', 'DESC')->get()
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
        // dd($request->all());

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

        // return redirect()->route('worships.show', $input['worship_id'])->with('success', 'Kursi berhasil dibooking.');;
        return redirect()->route('profile.bookings.create', ['booking_id' => $booking_id, 'worship_id' => $worship_id])->with('success', 'Silahkan isi nama pemilik kursi untuk menyelesaikan pemesanan.');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booked_seats = Booking::where([
            ['worship_id', '=', $id],
            ['fixed', '=', TRUE],
        ])->pluck('booking_seat')->toArray();
        // dd($booked_seats);
        return view('worship.show', [
            'worship_id' => $id,
            'booked_seats' => $booked_seats
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

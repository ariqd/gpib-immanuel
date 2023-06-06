<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Worship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\<Response></Response>
     */
    public function index()
    {
        $condition = function ($query) {
            return $query->where([
                ['user_id', '=', auth()->id()],
                ['fixed', '=', true],
            ]);
        };

        $worships = Worship::whereHas('bookings', $condition)
            ->with('bookings', $condition)
            ->latest()
            ->get();

        return view('booking.index', [
            'worships' => $worships
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($worship_id, $booking_id)
    {
        $bookings = Booking::where([
            ['booking_id', '=', $booking_id],
            ['fixed', '=', 0],
        ])->get();

        $worship = Worship::find($worship_id);
        $datetime = $worship->worship_date . ' ' . $worship->worship_time;
        $worship_date = Carbon::parse($datetime);

        if (!$bookings->isEmpty()) {
            return view('booking.form', [
                'bookings' => $bookings,
                'booking_id' => $booking_id,
                'worship_id' => $worship_id,
                'worship' => $worship,
                'worship_date' => $worship_date
            ]);
        }

        return redirect('/');
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
        $worship_id = $input['worship_id'];
        $errors = [];
        $names = [];
        $booked_names = [];
        $seat_count = count($input['input']);

        $validator = Validator::make($input, [
            'input.*.name' => ['required', 'regex:/^[a-zA-Z\s]*$/', 'max:100'],
            'input.*.gender' => 'required',
            'input.*.church' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('worships.show', ['worship' => $worship_id, 's' => $seat_count])
                ->withErrors($validator)
                ->withInput();
        }

        foreach ($input['input'] as $seat => $value) {
            $booking_exists_by_seat = Booking::where([
                ['worship_id', '=', $worship_id],
                ['booking_seat', '=', $seat],
                ['fixed', '=', true]
            ])->get();

            if (!$booking_exists_by_seat->isEmpty()) {
                $errors[$seat] = 'Kursi ' . $seat . ' telah dibooking oleh jemaat lain. Silahkan pilih kursi lain yang tersedia.';
            }

            $names[] = strtolower($value['name']);
        }

        $booking_exists_by_user = Booking::where([
            ['worship_id', '=', $worship_id],
            ['user_id', '=', auth()->id()],
            ['fixed', '=', true]
        ])->get();

        if (!$booking_exists_by_user->isEmpty()) {
            foreach ($booking_exists_by_user as $existing_booking) {
                $booked_names[] = strtolower($existing_booking->booking_name);
            }
        }

        if ((count($names) !== count(array_flip($names))) || !empty(array_intersect($names, $booked_names))) {
            $errors[] = 'Terdapat nama yang sama dalam Pendaftaran saat ini atau Pendaftaran sebelumnya.';
        }

        if (!empty($errors)) {
            return redirect()->route('profile.bookings.create', ['booking_id' => $input['booking_id'], 'worship_id' => $worship_id])->withErrors($errors)->withInput();
        }

        foreach ($input['input'] as $key => $value) {
            $booking = Booking::where([
                ['booking_id', '=', $input['booking_id']],
                ['booking_seat', '=', $key],
                ['fixed', '=', false],
            ])->first();

            $booking->booking_name = $value['name'];
            $booking->booking_gender = $value['gender'];
            $booking->booking_church = $value['church'];

            $booking->save();
        }

        return redirect()->route('profile.bookings.show', ['booking_id' => $input['booking_id'], 'worship_id' => $worship_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($worship_id, $booking_id)
    {
        $bookings = Booking::where('booking_id', $booking_id)->get();
        $worship = Worship::find($worship_id);
        $datetime = $worship->worship_date . ' ' . $worship->worship_time;
        $worship_date = Carbon::parse($datetime);

        return view('booking.confirm', [
            'bookings' => $bookings,
            'booking_id' => $booking_id,
            'worship_id' => $worship_id,
            'worship' => $worship,
            'worship_date' => $worship_date
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
        // dd($request->all());

        $input = $request->all();

        foreach ($input['input'] as $key => $value) {
            $booking = Booking::where([
                ['booking_id', '=', $input['booking_id']],
                ['booking_seat', '=', $key],
                ['fixed', '=', false],
            ])->first();

            $booking->booking_name = $value['name'];
            $booking->booking_gender = $value['gender'];
            $booking->booking_church = $value['church'];
            $booking->fixed = TRUE;

            $booking->save();
        }

        return redirect()->route('worships.index')->with('success', 'Kursi berhasil dibooking. Silahkan cek tiket anda di halaman Profil');
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

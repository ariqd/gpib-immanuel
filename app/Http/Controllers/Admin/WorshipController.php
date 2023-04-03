<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Booking;
use App\Models\Worship;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WorshipController extends Controller
{
    public function index()
    {
        $worship = Worship::with('bookings.attendance')->latest()->get();
        return view('admin.worship.index', [
            'worships' => $worship
        ]);
    }

    public function create()
    {
        return view('admin.worship.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'worship_name' => ['required', 'string', 'max:255'],
            'worship_date' => ['required', 'date'],
            'worship_time' => ['required'],
            'worship_image' => ['required', 'mimes:jpeg,jpg,png'],
        ]);

        $input = $request->all();

        if (@$request->worship_image) {
            $imageName = time() . '_' . strtoupper(str_replace(' ', '_', pathinfo($request->worship_image->getClientOriginalName(), PATHINFO_FILENAME))) . '.' . $request->worship_image->getClientOriginalExtension();
            $request->worship_image->storeAs('worship/image', $imageName, 'public_uploads');
            $input['worship_image'] = $imageName;
        }

        Worship::create([
            'worship_name' => $input['worship_name'],
            'worship_date' => $input['worship_date'],
            'worship_time' => $input['worship_time'],
            'worship_image' => $input['worship_image'],
        ]);

        return redirect()->route('admin.worships.index')->with('success', 'Ibadah berhasil ditambah.');;
    }

    public function show($id)
    {
        $worship = Worship::find($id);
        $bookings = Booking::with('user')->where('worship_id', $id)->get();
        $man = $woman = [];

        foreach ($bookings as $booking) {
            $booking_id = $booking->booking_id;
            $seat = $booking->booking_seat;

            $doesAttend = Attendance::where([
                ['booking_id', '=', $booking_id],
                ['attendance_seat', '=', $seat],
            ])->count();

            if ($doesAttend) {
                if ($booking->booking_gender == 'Pria') {
                    $man[] = $booking;
                } else {
                    $woman[] = $booking;
                }
            }
        }

        return view('admin.worship.show', [
            'worship' => $worship,
            'worship_date' => Carbon::parse($worship->worship_date),
            'man' => $man,
            'woman' => $woman,
        ]);
    }

    public function edit($id)
    {
        return view('admin.worship.form', [
            'worship' => Worship::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'worship_name' => ['string', 'max:255'],
            'worship_date' => ['date'],
            'worship_image' => ['mimes:jpeg,jpg,png'],
        ]);

        $input = $request->all();
        $worship = Worship::find($id);

        if (@$request->worship_image) {
            Storage::disk('public_uploads')->delete('worship/image/' . $worship->worship_image);

            $imageName = time() . '_' . strtoupper(str_replace(' ', '_', pathinfo($request->worship_image->getClientOriginalName(), PATHINFO_FILENAME))) . '.' . $request->worship_image->getClientOriginalExtension();
            $request->worship_image->storeAs('worship/image', $imageName, 'public_uploads');
            $input['worship_image'] = $imageName;
            $worship->worship_image = $input['worship_image'];
        }

        $worship->worship_name = $input['worship_name'];
        $worship->worship_date = $input['worship_date'];
        $worship->worship_time = $input['worship_time'];

        $worship->save();

        return redirect()->route('admin.worships.index')->with('success', 'Ibadah berhasil diubah.');
    }
}

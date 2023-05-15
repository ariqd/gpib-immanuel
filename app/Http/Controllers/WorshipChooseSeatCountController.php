<?php

namespace App\Http\Controllers;

use App\Models\Worship;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WorshipChooseSeatCountController extends Controller
{
    public function index($id)
    {
        $worship = Worship::find($id);
        $datetime = $worship->worship_date . ' ' . $worship->worship_time;
        $worship_date = Carbon::parse($datetime);

        return view('worship.form', [
            'worship' => $worship,
            'worship_date' => $worship_date
        ]);
    }

    public function store(Request $request, $worship_id)
    {
        return redirect()
            ->route('worships.show', ['worship' => $worship_id, 's' => $request->seat_count]);
    }
}

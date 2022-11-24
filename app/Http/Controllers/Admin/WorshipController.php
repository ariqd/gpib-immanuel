<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Worship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WorshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.worship.index', [
            'worships' => Worship::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.worship.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.worship.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.worship.form', [
            'worship' => Worship::find($id)
        ]);
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
        }

        $worship->worship_name = $input['worship_name'];
        $worship->worship_date = $input['worship_date'];
        $worship->worship_time = $input['worship_time'];
        $worship->worship_image = $input['worship_image'];

        $worship->save();

        return redirect()->route('admin.worships.index')->with('success', 'Ibadah berhasil diubah.');
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

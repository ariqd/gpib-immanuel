<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Worship;
use Illuminate\Http\Request;

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
        ]);

        Worship::create([
            'worship_name' => $request->worship_name,
            'worship_date' => $request->worship_date,
            'worship_time' => $request->worship_time,
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
        $worship = Worship::find($id);

        $worship->worship_name = $request->worship_name;
        $worship->worship_date = $request->worship_date;
        $worship->worship_time = $request->worship_time;

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

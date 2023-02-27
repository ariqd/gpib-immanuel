<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.carousel.index', [
            'carousel' => Carousel::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.carousel.form');
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

        $validator = Validator::make($input, [
            'carousel_image' => 'required|mimes:jpeg,jpg,png',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        if (@$request->carousel_image) {
            $imageName = time() . '_' . strtoupper(str_replace(' ', '_', pathinfo($request->carousel_image->getClientOriginalName(), PATHINFO_FILENAME))) . '.' . $request->carousel_image->getClientOriginalExtension();
            $request->carousel_image->storeAs('carousel/image', $imageName, 'public_uploads');
            $input['carousel_image'] = $imageName;
        }

        Carousel::create([
            'carousel_image' => $input['carousel_image'],
        ]);

        return redirect()->route('admin.carousel.index')->with('success', 'Berhasil menambah gambar baru.');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function show(Carousel $carousel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function edit(Carousel $carousel)
    {
        return view('admin.carousel.form', [
            'image' => $carousel
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carousel $carousel)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'carousel_image' => 'mimes:jpeg,jpg,png',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        if (@$request->carousel_image) {
            Storage::disk('public_uploads')->delete('carousel/image/' . $carousel->carousel_image);

            $imageName = time() . '_' . strtoupper(str_replace(' ', '_', pathinfo($request->carousel_image->getClientOriginalName(), PATHINFO_FILENAME))) . '.' . $request->carousel_image->getClientOriginalExtension();
            $request->carousel_image->storeAs('carousel/image', $imageName, 'public_uploads');
            $input['carousel_image'] = $imageName;
        }

        $carousel->carousel_image = $input['carousel_image'];
        $carousel->save();

        return redirect()->route('admin.carousel.index')->with('success', 'Berhasil memperbarui Gambar.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carousel $carousel)
    {
        if (Storage::disk('public_uploads')->exists('carousel/image/' . $carousel->carousel_image)) {
            Storage::disk('public_uploads')->delete('carousel/image/' . $carousel->carousel_image);
            $carousel->delete();
            return redirect()->route('admin.carousel.index')->with('success', 'Berhasil menghapus Gambar.');
        } else {
            return redirect()->route('admin.carousel.index')->with('warning', 'Gagal menghapus Gambar.');
        }
    }
}

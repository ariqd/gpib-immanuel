<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\News;
use App\Models\Worship;
use Carbon\Carbon;
// use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // dd(Carousel::all());
        return view('index', [
            'warta' => News::where('news_type', 'Warta')->latest()->first(),
            'tata' => News::where('news_type', 'Tata Ibadah')->latest()->first(),
            'worship' => Worship::whereDate('worship_date', '>', Carbon::now())->first(),
            'carousel_images' => Carousel::all(),
        ]);
    }
}

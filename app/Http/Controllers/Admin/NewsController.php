<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        return view('admin.news.index', [
            'all_news' => News::latest()->get()
        ]);
    }

    public function create()
    {
        return view('admin.news.form');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'news_title' => 'required|string|max:255',
            'news_content' => 'required|string',
            'news_image' => 'required|mimes:jpeg,jpg,png',
            'news_file' => 'required|mimes:pdf',
            'news_type' => 'required',
        ]);

        // dd($request->all());
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        if (@$request->news_image) {
            $imageName = time() . '_' . strtoupper(str_replace(' ', '_', pathinfo($request->news_image->getClientOriginalName(), PATHINFO_FILENAME))) . '.' . $request->news_image->getClientOriginalExtension();
            $request->news_image->storeAs('news/image', $imageName, 'public_uploads');
            $input['news_image'] = $imageName;
        }

        if (@$request->news_file) {
            $pdfName = time() . '_' . strtoupper(str_replace(' ', '_', pathinfo($request->news_file->getClientOriginalName(), PATHINFO_FILENAME))) . '.' . $request->news_file->getClientOriginalExtension();
            $request->news_file->storeAs('news/pdf', $pdfName, 'public_uploads');
            $input['news_file'] = $pdfName;
        }

        News::create([
            'news_title' => $input['news_title'],
            'news_content' => $input['news_content'],
            'news_type' => $input['news_type'],
            'news_image' => $input['news_image'],
            'news_file' => $input['news_file'],
        ]);

        return redirect()->route('admin.news.index')->with('success', 'Berhasil menambah Berita baru.');;
    }

    public function edit($id)
    {
        return view('admin.news.form', [
            'news' => News::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $news = News::find($id);

        $validator = Validator::make($input, [
            'news_title' => 'required|string|max:255',
            'news_content' => 'required|string',
            'news_image' => 'mimes:jpeg,jpg,png',
            'news_file' => 'mimes:pdf',
            'news_type' => 'required',
        ]);

        // dd($request->all());
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        if (@$request->news_image) {
            Storage::disk('public_uploads')->delete('news/image/' . $news->news_image);

            $imageName = time() . '_' . strtoupper(str_replace(' ', '_', pathinfo($request->news_image->getClientOriginalName(), PATHINFO_FILENAME))) . '.' . $request->news_image->getClientOriginalExtension();
            $request->news_image->storeAs('news/image', $imageName, 'public_uploads');
            $input['news_image'] = $imageName;
            $news->news_image = $input['news_image'];
        }

        if (@$request->news_file) {
            Storage::disk('public_uploads')->delete('news/pdf/' . $news->news_file);

            $pdfName = time() . '_' . strtoupper(str_replace(' ', '_', pathinfo($request->news_file->getClientOriginalName(), PATHINFO_FILENAME))) . '.' . $request->news_file->getClientOriginalExtension();
            $request->news_file->storeAs('news/pdf', $pdfName, 'public_uploads');
            $input['news_file'] = $pdfName;
            $news->news_file = $input['news_file'];
        }

        $news->news_title = $input['news_title'];
        $news->news_content = $input['news_content'];
        $news->news_type = $input['news_type'];

        $news->save();

        return redirect()->route('admin.news.index')->with('success', 'Berhasil memperbarui Berita.');;
    }
}

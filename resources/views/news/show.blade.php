@extends('layouts.main')

@section('content')
    <div class="container py-3">
        <div class="row">
            <div class="col-12">
                <h3 class="mb-1">{{ $news->news_title }}</h3>
                <hr>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-6">
                {{-- <div
                    style="
            width: 100%;
            height: 400px;
            background: url('{{ asset('uploads/news/image/' . $news->news_image) }}')
            no-repeat center; background-size: cover;">
                </div> --}}
                <img src="{{ asset('uploads/news/image/' . $news->news_image) }}" alt="" style="max-width: 100%" class="mb-5">
                <br>
                <p><i>{{ $news->news_type }} - {{ $news->created_at->isoFormat('dddd, D MMMM Y') }}</i></p>
                <p>{!! $news->news_content !!}</p>
                <br>
                <a href="{!! route('news.download', $news->news_file) !!}" class="btn btn-primary">Download PDF</a>
            </div>
        </div>
    </div>
@endsection

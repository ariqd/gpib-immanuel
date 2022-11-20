@extends('layouts.main')

@section('content')
    <div class="container py-3">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <h3>Tata Ibadah & Warta</h3>
                    <div>
                        <form class="row">
                            <div class="col-auto">
                                <label for="date" class="mt-2">Cari berita di tanggal</label>
                            </div>
                            <div class="col-auto">
                                <label for="date" class="visually-hidden">Tanggal</label>
                                <input type="date" class="form-control" id="date" max="<?= date('Y-m-d') ?>"
                                    name="date" value="{{ @$date }}" />
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">Cari</button>
                            </div>
                        </form>
                    </div>
                </div>
                <hr>
            </div>
        </div>

        <div class="row">
            @foreach ($news as $news)
                <div class="col-6 mb-3">
                    <div class="card">
                        <div class="row">
                            <div class="col-3">
                                <div
                                    style="
                                width: 100%;
                                height: 250px;
                                background: url('{{ asset('uploads/news/image/' . $news->news_image) }}')
                                no-repeat center; background-size: cover;">
                                </div>
                            </div>
                            <div class="col-9 ">
                                <div class="border-bottom d-flex justify-content-between">
                                    <p class="m-0 p-2">{{ $news->news_type }}</p>
                                    <p class="m-0 p-2"> {{ $news->created_at->isoFormat('D MMMM Y') }}</p>
                                </div>
                                <p class="mt-2"><b>{{ $news->news_title }}</b></p>
                                <p>{!! mb_strimwidth($news->news_content, 0, 250, '...') !!}</p>
                                <a href="{{ route('news.show', $news) }}">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

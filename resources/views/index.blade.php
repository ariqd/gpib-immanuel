@extends('layouts.main')

@section('content')
    <div class="container py-3">
        <div class="row">
            <div class="col-12">
                <h3 class="text-center">Kegiatan Kami</h3>
            </div>
        </div>
        <div class="row mt-3">
            @foreach ($news as $news)
                <div class="col-4">
                    <div class="card">
                        <div class="card-img-top"
                            style="
                    width: 100%;
                    height: 200px;
                    background: url('{{ asset('uploads/news/image/' . $news->news_image) }}')
                    no-repeat center; background-size: cover;">
                        </div>
                        {{-- <img src="https://via.placeholder.com/300x150" class="card-img-top" alt="..."> --}}
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('news.show', $news) }}" class="stretched-link text-dark text-decoration-none">
                                    {{ $news->news_type }} {{ $news->created_at->isoFormat('dddd, D MMMM Y') }}
                                </a>
                            </h5>
                            <p class="card-text">
                                {!! mb_strimwidth($news->news_content, 0, 100, '...') !!}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

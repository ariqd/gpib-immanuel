@extends('layouts.main')

@section('content')
    @if (!empty($carousel_images))
        <div class="container py-3">
            <div class="row">
                <div class="col-12">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner" role="listbox" style="max-width:100%; max-height:500px !important;">
                            @foreach ($carousel_images as $image)
                                <div class="carousel-item @if ($loop->first) active @endif">
                                    <img src="{{ asset('uploads/carousel/image/' . @$image->carousel_image) }}"
                                        class="d-block w-100">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="container py-3">
        <div class="row">
            <div class="col-12">
                <h3 class="text-center">Kegiatan Kami</h3>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Warta Jemaat</h5>
                        <div class="card-img-top"
                            style="
                    width: 100%;
                    height: 200px;
                    background: url('{{ asset('uploads/news/image/' . $warta->news_image) }}')
                    no-repeat center; background-size: cover;">
                        </div>
                        {{-- <img src="https://via.placeholder.com/300x150" class="card-img-top" alt="..."> --}}
                        <h5 class="card-title mt-3">
                            <a href="{{ route('news.show', $warta) }}"
                                class="stretched-link text-dark text-decoration-none">
                                {{ $warta->news_type }} {{ $warta->created_at->isoFormat('dddd, D MMMM Y') }}
                            </a>
                        </h5>
                        {{-- <p class="card-text">
                            {{ $warta->news_title }}
                        </p> --}}
                        <p class="card-text">
                            {!! mb_strimwidth($warta->news_content, 0, 100, '...') !!}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Tata Ibadah</h5>
                        <div class="card-img-top"
                            style="
                    width: 100%;
                    height: 200px;
                    background: url('{{ asset('uploads/news/image/' . $tata->news_image) }}')
                    no-repeat center; background-size: cover;">
                        </div>
                        {{-- <img src="https://via.placeholder.com/300x150" class="card-img-top" alt="..."> --}}
                        <h5 class="card-title mt-3">
                            <a href="{{ route('news.show', $tata) }}" class="stretched-link text-dark text-decoration-none">
                                {{ $tata->news_type }} {{ $tata->created_at->isoFormat('dddd, D MMMM Y') }}
                            </a>
                        </h5>
                        {{-- <p class="card-text">
                            {{ $tata->news_title }}
                        </p> --}}
                        <p class="card-text">
                            {!! mb_strimwidth($tata->news_content, 0, 100, '...') !!}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Event</h5>
                        @if (@$worship)
                            <div class="card-img-top"
                                style="
                    width: 100%;
                    height: 200px;
                    background: url('{{ @$worship->worship_image ? asset('uploads/worship/image/' . @$worship->worship_image) : 'https://via.placeholder.com/300x150' }}')
                    no-repeat center; background-size: cover;">
                            </div>
                            <h5 class="card-title mt-3">
                                <a href="{{ route('worships.show', $worship->id) }}"
                                    class="stretched-link text-dark text-decoration-none">
                                    {{ $worship->worship_name }}
                                </a>
                            </h5>
                            <p class="card-text">
                                @php($worship_date = \Carbon\Carbon::parse($worship->worship_date))
                                {{ $worship_date->isoFormat('dddd, D MMMM Y') }} <br>
                                {{ date('G:i', strtotime($worship->worship_time)) }} WIB
                            </p>
                        @else
                            <p class="card-text text-center">
                                Belum ada Event baru
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

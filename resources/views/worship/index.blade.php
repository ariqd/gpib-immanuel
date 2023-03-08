@extends('layouts.main')

@section('content')
    <div class="container py-3">
        <div class="row">
            <div class="col-12">
                <h3>Pendaftaran Ibadah</h3>
                <hr>
            </div>
        </div>
        <div class="row">
            @foreach ($worships as $worship)
                @php
                    $datetime = $worship->worship_date . ' ' . $worship->worship_time;
                    $worship_date = \Carbon\Carbon::parse($datetime);
                @endphp
                <div class="col-6 mt-3">
                    <div class="card">
                        <div style="
                        width: 100%;
                        height: 300px;
                        background: url('{{ @$worship->worship_image ? asset('uploads/worship/image/' . @$worship->worship_image) : 'https://via.placeholder.com/300x150' }}')
                        no-repeat center; background-size: cover;"
                            class="card-img-top" alt="{{ $worship->worship_name }}"></div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $worship->worship_name }}</h5>
                            <p class="card-text">Tanggal: {{ $worship_date->isoFormat('dddd, D MMMM Y') }} <br> Waktu:
                                {{ date('G:i', strtotime($worship->worship_time)) }}
                            </p>
                            <div class="d-grid">
                                @if ($worship_date->isPast())
                                    <button type="button" disabled
                                        class="btn btn-success btn-block stretched-link btn-disabled">Daftar</button>
                                @else
                                    <a href="{{ route('worships.show', $worship->id) }}"
                                        class="btn btn-success btn-block stretched-link">Daftar</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

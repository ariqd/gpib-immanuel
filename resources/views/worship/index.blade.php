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
                @php($worship_date = \Carbon\Carbon::parse($worship->worship_date))
                <div class="col-6 mt-3">
                    <div class="card">
                        <img src="https://via.placeholder.com/300x150" class="card-img-top" alt="...">
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

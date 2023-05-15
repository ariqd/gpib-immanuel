@extends('layouts.main')

{{-- Form pilih jumlah kursi --}}

@section('content')
    <div class="container py-3">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <h3>Pendaftaran Ibadah | {{ $worship->worship_name }}</h3>
                </div>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-8">
                <form action="{{ route('worships.seat-count.store', $worship->id) }}" method="POST">
                    @csrf
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4>Jumlah Kursi</h4>
                            <p>Pilih jumlah peserta / jemaat yang akan didaftarkan</p>
                        </div>
                        <div class="col-4">
                            <select class="form-select" aria-label="Pilih Jumlah Kursi" name="seat_count">
                                <option value="1" selected>1 peserta</option>
                                <option value="2">2 peserta</option>
                                <option value="3">3 peserta</option>
                                <option value="4">4 peserta</option>
                                <option value="5">5 peserta</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex mt-3">
                        <button type="submit" class="btn btn-success">Lanjutkan <i class="bi bi-arrow-right"></i></button>
                    </div>
                </form>
            </div>
            <div class="col-4">
                <div class="card">
                    <img src="{{ @$worship->worship_image ? asset('uploads/worship/image/' . @$worship->worship_image) : 'https://via.placeholder.com/300x150' }}"
                        class="card-img-top" alt="{{ $worship->worship_name }}" />
                    <div class="card-body">
                        <h5 class="card-title">{{ $worship->worship_name }}</h5>
                        <p class="card-text">Tanggal: {{ $worship_date->isoFormat('dddd, D MMMM Y') }} <br> Waktu:
                            {{ date('G:i', strtotime($worship->worship_time)) }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

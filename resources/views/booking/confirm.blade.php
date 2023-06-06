@extends('layouts.main')

@section('content')
    <div class="container py-3">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <h3>Konfirmasi Pendaftar Ibadah | {{ $worship->worship_name }}</h3>
                </div>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-8">
                <form action="{{ route('profile.bookings.update', $booking_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="booking_id" value="{{ $booking_id }}">
                    <div class="row">
                        @foreach ($bookings as $booking)
                            <div class="col-12">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h4 class="mb-3">Kursi {{ $booking->booking_seat }}</h4>
                                        <div class="form-group row">
                                            <label for="input[{{ $booking->booking_seat }}][name]"
                                                class="col-sm-2 col-form-label fw-bold">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="input[{{ $booking->booking_seat }}][name]"
                                                    readonly class="form-control-plaintext" class="form-control"
                                                    placeholder="Nama pemegang kursi {{ $booking->booking_seat }}"
                                                    id="input[{{ $booking->booking_seat }}][name]" required
                                                    value="{{ $booking->booking_name }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label fw-bold">Jenis Kelamin</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="input[{{ $booking->booking_seat }}][gender]"
                                                    readonly class="form-control-plaintext" class="form-control"
                                                    placeholder="Nama pemegang kursi {{ $booking->booking_seat }}"
                                                    id="input[{{ $booking->booking_seat }}][gender]" required
                                                    value="{{ $booking->booking_gender }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label fw-bold">{{ auth()->user()->role->role_name === 'Jemaat' ? 'Sektor' : 'Asal Gereja' }}</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="input[{{ $booking->booking_seat }}][church]"
                                                    readonly class="form-control-plaintext" class="form-control"
                                                    placeholder="Nama pemegang kursi {{ $booking->booking_seat }}"
                                                    id="input[{{ $booking->booking_seat }}][church]" required
                                                    value="{{ $booking->booking_church }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <p class="text-muted">
                        Dengan menekan tombol Konfirmasi, anda menyetujui bahwa data yang dimasukkan telah sesuai.
                    </p>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success"><i class="bi bi-check"></i> Konfirmasi</button>
                        <a href="{{ route('profile.bookings.create', ['booking_id' => $booking_id, 'worship_id' => $worship_id]) }}" type="button" class="btn btn-link">Kembali ke Input Data Pendaftar</a>
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

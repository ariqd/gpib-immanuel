@extends('layouts.main')

@section('content')
    <div class="container py-3">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <h3>Detail Pendaftar Ibadah | {{ $worship->worship_name }}</h3>
                </div>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-8">
                <form action="{{ route('profile.bookings.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="booking_id" value="{{ $booking_id }}">
                    <input type="hidden" name="worship_id" value="{{ $worship_id }}">
                    <div class="row">
                        @foreach ($bookings as $booking)
                            <div class="col-12">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h4 class="mb-3">Kursi {{ $booking->booking_seat }}</h4>
                                        <div class="form-group">
                                            <label for="input[{{ $booking->booking_seat }}][name]" class="form-label">
                                                Nama
                                            </label>
                                            <div class="mb-4">
                                                <input type="text" name="input[{{ $booking->booking_seat }}][name]"
                                                    class="form-control"
                                                    placeholder="Nama pemegang kursi {{ $booking->booking_seat }}"
                                                    id="input[{{ $booking->booking_seat }}][name]" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-{{ $booking->booking_seat }}-male" class="form-label">
                                                Jenis Kelamin
                                            </label>
                                            <div class="mb-4">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="input[{{ $booking->booking_seat }}][gender]"
                                                        id="input-{{ $booking->booking_seat }}-male" value="Pria">
                                                    <label class="form-check-label"
                                                        for="input-{{ $booking->booking_seat }}-male">
                                                        Pria
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="input[{{ $booking->booking_seat }}][gender]"
                                                        id="input-{{ $booking->booking_seat }}-female" value="Wanita">
                                                    <label class="form-check-label"
                                                        for="input-{{ $booking->booking_seat }}-female">
                                                        Wanita
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-{{ $booking->booking_seat }}-church" class="form-label">
                                                {{ auth()->user()->role->role_name === 'Jemaat' ? 'Sektor' : 'Asal Gereja' }}
                                            </label>
                                            <div class="mb-4">
                                                @if (auth()->user()->role->role_name === 'Jemaat')
                                                    <select class="form-select"
                                                        name="input[{{ $booking->booking_seat }}][church]" required>
                                                        <option value="" selected disabled>Pilih Sektor</option>
                                                        @for ($i = 1; $i <= 10; $i++)
                                                            <option value="Sektor {{ $i }}">Sektor
                                                                {{ $i }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                @else
                                                    <input type="text"
                                                        name="input[{{ $booking->booking_seat }}][church]"
                                                        class="form-control" placeholder="Asal Gereja"
                                                        id="input-{{ $booking->booking_seat }}-church" required>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-success"><i class="bi bi-check"></i> Simpan</button>
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

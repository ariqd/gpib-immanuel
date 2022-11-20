@extends('layouts.main')

@section('content')
    <div class="container py-3">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <h3>Pendaftaran Ibadah</h3>
                </div>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-9">
                <form action="{{ route('profile.bookings.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="booking_id" value="{{ $booking_id }}">
                    <input type="hidden" name="worship_id" value="{{ $worship_id }}">
                    @foreach ($bookings as $booking)
                        <div class="card mb-3">
                            <div class="card-body">
                                <h4 class="mb-3">Kursi {{ $booking->booking_seat }}</h4>
                                <div class="forn-group">
                                    <label for="input-{{ $booking->booking_seat }}" class="form-label">
                                        Nama
                                    </label>
                                    <div class="mb-4">
                                        <input type="text" name="input[{{ $booking->booking_seat }}][name]"
                                            class="form-control"
                                            placeholder="Nama pemegang kursi {{ $booking->booking_seat }}"
                                            id="input-{{ $booking->booking_seat }}-name" required>
                                    </div>
                                </div>
                                <div class="forn-group">
                                    <label for="input-{{ $booking->booking_seat }}-male" class="form-label">
                                        Jenis Kelamin
                                    </label>
                                    <div class="mb-4">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                name="input[{{ $booking->booking_seat }}][gender]"
                                                id="input-{{ $booking->booking_seat }}-male" value="Pria">
                                            <label class="form-check-label" for="input-{{ $booking->booking_seat }}-male">
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
                                <div class="forn-group">
                                    <label for="input-{{ $booking->booking_seat }}-church" class="form-label">
                                        {{ auth()->user()->role->role_name === 'Jemaat' ? 'Sektor' : 'Asal Gereja' }}
                                    </label>
                                    <div class="mb-4">
                                        @if (auth()->user()->role->role_name === 'Jemaat')
                                            <select class="form-select" name="input[{{ $booking->booking_seat }}][church]" required>
                                                <option value="" selected disabled>Pilih Sektor</option>
                                                @for ($i = 1; $i <= 10; $i++)
                                                    <option value="Sektor {{ $i }}">Sektor {{ $i }}
                                                    </option>
                                                @endfor
                                            </select>
                                        @else
                                            <input type="text" name="input[{{ $booking->booking_seat }}][church]"
                                                class="form-control" placeholder="Asal Gereja"
                                                id="input-{{ $booking->booking_seat }}-church" required>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <button type="submit" class="btn btn-success"><i class="bi bi-check"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection

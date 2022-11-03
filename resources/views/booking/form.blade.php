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
                        <label for="input-{{ $booking->booking_seat }}">
                            <h4>Kursi {{ $booking->booking_seat }}</h4>
                        </label>
                        <div class="mb-4">
                            <input type="text" name="input[{{ $booking->booking_seat }}]" class="form-control" placeholder="Nama pemegang kursi {{ $booking->booking_seat }}"
                                id="input-{{ $booking->booking_seat }}" required>
                        </div>
                    @endforeach
                    <button type="submit" class="btn btn-success"><i class="bi bi-check"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection

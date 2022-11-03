@extends('layouts.profile')

@section('profile_page')
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between">
                <h3>Tiket Saya</h3>
            </div>
            <hr>
        </div>
    </div>

    <div class="row">
        @foreach ($worships as $worship)
            @php($worship_date = \Carbon\Carbon::parse($worship->worship_date))
            @php($seats = $worship->bookings->pluck('booking_seat'))
            <div class="col-6 mt-3">
                <div class="card">
                    <img src="https://via.placeholder.com/300x150" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $worship->worship_name }}</h5>
                        <p class="card-text">Tanggal: {{ $worship_date->isoFormat('dddd, D MMMM Y') }} <br> Waktu:
                            {{ date('G:i', strtotime($worship->worship_time)) }}
                        </p>
                        <div class="d-grid">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modal-{{ $worship->id }}">
                                Lihat Pemegang Tiket
                            </button>
                            <div class="modal fade" id="modal-{{ $worship->id }}" tabindex="-1"
                                aria-labelledby="modalLabel-{{ $worship->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="modalLabel-{{ $worship->id }}">Pemegang Tiket
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Kursi</th>
                                                        <th>Nama</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($worship->bookings as $booking)
                                                        <tr>
                                                            <td>{{ $booking->booking_seat }}</td>
                                                            <td>{{ $booking->booking_name }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        {{-- <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <h5 class="card-title">Kursi</h5>
                        <h5>{{ $seats->join(',') }}</h5> --}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

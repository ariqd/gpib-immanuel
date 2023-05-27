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
                    <div class="card-img-top"
                    style="
            width: 100%;
            height: 200px;
            background: url('{{ asset('uploads/worship/image/' . $worship->worship_image) }}')
            no-repeat center; background-size: cover;">
                </div>
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
                            <div class="modal modal-lg fade" id="modal-{{ $worship->id }}" tabindex="-1"
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
                                            @foreach ($worship->bookings->groupBy('booking_id') as $booking_id => $bookings)
                                                {{-- <div class="d-flex justify-content-between align-items-baseline">
                                                    <h5>Booking ID: {{ $booking_id }}</h5> --}}

                                                {{-- <button type="button" class="btn btn-primary btn-sm"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapse-{{ $booking_id }}" aria-expanded="false"
                                                        aria-controls="collapse-{{ $booking_id }}">
                                                        Lihat Barcode
                                                    </button> --}}
                                                {{-- </div> --}}

                                                {{-- <div class="collapse mt-2" id="collapse-{{ $booking_id }}">
                                                    <div class="card card-body">
                                                        <div class="d-flex justify-content-center">
                                                            {!! DNS2D::getBarcodeHTML($booking_id, 'QRCODE') !!}
                                                        </div>
                                                    </div>
                                                </div> --}}

                                                <table class="table align-middle">
                                                    <thead>
                                                        <tr>
                                                            <th>Kursi</th>
                                                            <th>Nama</th>
                                                            <th>Jenis Kelamin</th>
                                                            <th>
                                                                {{ auth()->user()->role->role_name === 'Jemaat' ? 'Sektor' : 'Asal Gereja' }}
                                                            </th>
                                                            {{-- <th>QR Code</th> --}}
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($bookings as $booking)
                                                            <tr>
                                                                <td>{{ $booking->booking_seat }}</td>
                                                                <td>{{ $booking->booking_name }}</td>
                                                                <td>{{ $booking->booking_gender }}</td>
                                                                <td>{{ $booking->booking_church }}</td>
                                                                {{-- <td>
                                                                    <button type="button" class="btn btn-primary btn-sm"
                                                                        data-bs-toggle="collapse"
                                                                        data-bs-target="#collapse-{{ $booking_id . '-' . $booking->booking_seat }}"
                                                                        aria-expanded="false"
                                                                        aria-controls="collapse-{{ $booking_id . '-' . $booking->booking_seat }}">
                                                                        Lihat Barcode
                                                                    </button>
                                                                </td> --}}
                                                            </tr>
                                                            <tr>
                                                                <td colspan="5">
                                                                    <div class="mt-2 pb-5">
                                                                        <div class="d-flex justify-content-center">
                                                                            {!! DNS2D::getBarcodeHTML($booking_id . '-' . $booking->booking_seat, 'QRCODE') !!}
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            @endforeach
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

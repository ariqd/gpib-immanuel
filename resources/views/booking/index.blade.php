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
                        @if ($worship_date->isPast())
                            <span class="mb-2 badge text-bg-warning">Sudah Lewat</span>
                        @else
                            <span class="mb-2 badge text-bg-primary">Akan Datang</span>
                        @endif
                        <h5 class="card-title">{{ $worship->worship_name }}</h5>
                        <p class="card-text">Tanggal: {{ $worship_date->isoFormat('dddd, D MMMM Y') }} <br> Waktu:
                            {{ date('G:i', strtotime($worship->worship_time)) }}
                        </p>
                        <div class="d-grid">
                            {{-- @if ($worship_date->isPast())
                                <button type="button" disabled class="btn btn-primary btn-disabled">
                                    Lihat Pemegang Tiket
                                </button>
                            @else
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modal-{{ $worship->id }}">
                                    Lihat Pemegang Tiket
                                </button>
                            @endif --}}
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
                                                <table class="table align-middle">
                                                    <thead>
                                                        <tr>
                                                            <th>Kursi</th>
                                                            <th>Nama</th>
                                                            <th>Jenis Kelamin</th>
                                                            <th>
                                                                {{ auth()->user()->role->role_name === 'Jemaat' ? 'Sektor' : 'Asal Gereja' }}
                                                            </th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($bookings as $booking)
                                                            <tr>
                                                                <td>{{ $booking->booking_seat }}</td>
                                                                <td>{{ $booking->booking_name }}</td>
                                                                <td>{{ $booking->booking_gender }}</td>
                                                                <td>{{ $booking->booking_church }}</td>
                                                                <td>
                                                                    @if ($booking->attendance()->exists())
                                                                        <span class="badge text-bg-success">
                                                                            Sudah Diikuti
                                                                        </span>
                                                                    @else
                                                                        <span class="badge text-bg-danger">
                                                                            Belum Diikuti
                                                                        </span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            @if (!$booking->attendance()->exists() && !$worship_date->isPast())
                                                                <tr>
                                                                    <td colspan="5">
                                                                        <div class="mt-2 pb-5">
                                                                            <div class="d-flex justify-content-center">
                                                                                {!! DNS2D::getBarcodeHTML($booking_id . '-' . $booking->booking_seat, 'QRCODE') !!}
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

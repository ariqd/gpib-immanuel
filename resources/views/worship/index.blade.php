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
                                    @auth
                                        <button type="button" data-bs-toggle="modal"
                                            class="btn btn-success btn-block stretched-link"
                                            data-bs-target="#modal{{ $worship->id }}">
                                            Daftar
                                        </button>
                                    @else
                                        <a href="{{ route('worships.seat-count', $worship->id) }}"
                                            class="btn btn-success btn-block stretched-link">Daftar
                                        </a>
                                    @endauth
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="modal{{ $worship->id }}" tabindex="-1" data-bs-backdrop="static"
                    aria-labelledby="modal{{ $worship->id }}Label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="modal{{ $worship->id }}Label">
                                    Jumlah Pendaftar | {{ $worship->worship_name }}
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <form action="{{ route('worships.seat-count.store', $worship->id) }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="seat_count" class="form-label">Pilih jumlah peserta / jemaat yang akan didaftarkan</label>
                                        <select class="form-select" aria-label="Pilih Jumlah Kursi" name="seat_count"
                                            id="seat_count">
                                            <option value="1" selected>1 peserta</option>
                                            <option value="2">2 peserta</option>
                                            <option value="3">3 peserta</option>
                                            <option value="4">4 peserta</option>
                                            <option value="5">5 peserta</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-success">Lanjutkan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row mt-3">
            <div class="col-12">
                {!! $worships->links() !!}
            </div>
        </div>
    </div>
@endsection

@extends('layouts.main')

@section('content')
    <div class="container py-3">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h3>Pendaftaran Ibadah | {{ $worship->worship_name }}</h3>
                </div>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-8">
                <h4>Pilih Kursi</h4>
                <p>Klik no. kursi yang tersedia. Pilih sesuai jumlah yang ditentukan sebelumnya</p>
                <form action="{{ route('worships.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="worship_id" value="{{ $worship->id }}">
                    <div class="table-responsive">
                        <h5>Lantai 1</h5>
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                </tr>
                                <tr>
                                    <th colspan="10">
                                        <div
                                            style="text-align: center; width: 100%; padding: 25px; border: 1px solid black">
                                            Mimbar
                                        </div>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" colspan="2" class="text-center">A</th>
                                    <th scope="col" colspan="2" class="text-center">B</th>
                                    <th scope="col" colspan="2" class="text-center">C</th>
                                    <th scope="col" colspan="2" class="text-center">D</th>
                                    <th scope="col" colspan="2" class="text-center">E</th>
                                </tr>
                            </thead>
                            <tbody>
                                @include('worship.seats.row_1')
                                @include('worship.seats.row_2')
                                @include('worship.seats.row_3')
                                @include('worship.seats.row_4')
                                @include('worship.seats.row_5')
                                @include('worship.seats.row_6')
                                @include('worship.seats.row_7')
                                @include('worship.seats.row_8')
                                @include('worship.seats.row_9')
                                @include('worship.seats.row_10')
                                @include('worship.seats.row_11')
                                @include('worship.seats.row_12')
                                @include('worship.seats.row_13')
                            </tbody>
                        </table>
                        <h5 class="mt-3">Lantai 2</h5>
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                </tr>
                                <tr>
                                    <th colspan="14">
                                        <div
                                            style="text-align: center; width: 100%; padding: 25px; border: 1px solid black">
                                            Batas Balkon
                                        </div>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" colspan="4" class="text-center">F</th>
                                    <th scope="col" colspan="4" class="text-center">G</th>
                                    <th scope="col" colspan="2" class="text-center">H</th>
                                    <th scope="col" colspan="4" class="text-center">I</th>
                                </tr>
                            </thead>
                            <tbody>
                                @include('worship.seats.floor_2_row_1')
                                @include('worship.seats.floor_2_row_2')
                                @include('worship.seats.floor_2_row_3')
                                @include('worship.seats.floor_2_row_4')
                                @include('worship.seats.floor_2_row_5')
                                @include('worship.seats.floor_2_row_6')
                                @include('worship.seats.floor_2_row_7')
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex flex-row-reverse">
                        <button type="submit" class="btn btn-success">Booking Sekarang <i
                                class="bi bi-arrow-right"></i></button>
                    </div>
                </form>
            </div>
            <div class="col-12 col-lg-4">
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
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <p class="card-text">Jumlah Kursi Dipilih:</p>
                            </div>
                            <div class="col-12 col-md-6">
                                <p class="card-text text-end"><span id="selected_seat_count">0</span> / {{ $seat_count }}
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-3">
                            <div class="col-12 col-md-6">
                                <p class="card-text">Jumlah Kursi Terisi:</p>
                            </div>
                            <div class="col-12 col-md-6">
                                <p class="card-text text-end">{{ count($booked_seats) }} / 50</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        var checks = document.querySelectorAll(".check");
        var max = {{ $seat_count }};
        for (var i = 0; i < checks.length; i++) {
            checks[i].onclick = selectiveCheck;
        }
        checkedBoxes = 0;

        function selectiveCheck(event) {
            var checkedChecks = document.querySelectorAll(".check:checked");

            if (checkedBoxes >= max) {
                alert('Jumlah kursi dipilih telah mencapai batas');
                return false;
            } else {
                checkedBoxes++;
                document.getElementById("selected_seat_count").textContent = checkedBoxes;
            }
        }
    </script>
@endsection

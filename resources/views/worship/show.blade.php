@extends('layouts.main')

@section('content')
    <div class="container-fluid py-3">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h3>Pendaftaran Ibadah</h3>
                    <div>
                        <span>Jumlah Pendaftar: {{ count($booked_seats) }}/50</span>
                    </div>
                </div>
                <hr>
            </div>
        </div>
        <div class="row">
            <form action="{{ route('worships.store') }}" method="POST">
                @csrf
                <input type="hidden" name="worship_id" value="{{ $worship_id }}">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th colspan="10">
                                    Lantai 1
                                </th>
                                <th colspan="14">
                                    Lantai 2
                                </th>
                            </tr>
                            <tr>
                                <th colspan="10">
                                    <div style="text-align: center; width: 100%; padding: 25px; border: 1px solid black">
                                        Mimbar
                                    </div>
                                </th>
                                <th colspan="14">
                                    <div style="text-align: center; width: 100%; padding: 25px; border: 1px solid black">
                                        Batas Balkon
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th scope="col" colspan="2" class="text-center">A</th>
                                <th scope="col" colspan="2" class="text-center">B</th>
                                <th scope="col" colspan="2" class="text-center">C</th>
                                <th scope="col" colspan="2" class="text-center">D</th>
                                <th scope="col" colspan="2" class="text-center">E</th>
                                <th scope="col" colspan="4" class="text-center">F</th>
                                <th scope="col" colspan="4" class="text-center">G</th>
                                <th scope="col" colspan="2" class="text-center">H</th>
                                <th scope="col" colspan="4" class="text-center">I</th>
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
                </div>
                <div class="d-flex flex-row-reverse">
                    <button type="submit" class="btn btn-success">Booking Sekarang <i
                            class="bi bi-arrow-right"></i></button>
                </div>
            </form>
        </div>
    </div>
@endsection

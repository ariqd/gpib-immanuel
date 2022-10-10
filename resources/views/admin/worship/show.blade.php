@extends('layouts.main')

@section('content')
    <div class="container-fluid py-3">
        <div class="row">
            <div class="col-12">
                <h3>Pendaftaran Ibadah</h3>
                <hr>
            </div>
        </div>
        <div class="row">
            <form action="{{ route('worships.store') }}" method="POST">
                @csrf
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
                            @php
                                function generateSeat($row_number)
                                {
                                    if ($row_number == 1) {
                                        return 'A';
                                    } elseif ($row_number == 2) {
                                        return 'B';
                                    } elseif ($row_number == 3) {
                                        return 'C';
                                    } elseif ($row_number == 4) {
                                        return 'D';
                                    } elseif ($row_number == 5) {
                                        return 'E';
                                    } elseif ($row_number == 6) {
                                        return 'F';
                                    } elseif ($row_number == 7) {
                                        return 'G';
                                    } elseif ($row_number == 8) {
                                        return 'H';
                                    } elseif ($row_number == 9) {
                                        return 'I';
                                    }
                                }
                            @endphp
                            <tr>
                                {{-- Baris 1 --}}
                                @for ($x = 1; $x <= 9; $x++)
                                    @if ($x == 4 || $x == 5 || $x == 8)
                                        <td colspan="2"></td>
                                    @elseif ($x == 7)
                                        <td colspan="4"></td>
                                    @elseif ($x == 6)
                                        <td>
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off" name="input[]"
                                                    value="seat{{ generateSeat($x) }}1" id="seat{{ generateSeat($x) }}1">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}1">
                                                    1
                                                </label>
                                            </div>
                                        </td>
                                        <td colspan="2">
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off" name="input[]"
                                                    value="seat{{ generateSeat($x) }}2" id="seat{{ generateSeat($x) }}2">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}2">
                                                    2
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off" name="input[]"
                                                    value="seat{{ generateSeat($x) }}3" id="seat{{ generateSeat($x) }}3">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}3">
                                                    3
                                                </label>
                                            </div>
                                        </td>
                                    @elseif ($x == 9)
                                        <td colspan="2">
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off" name="input[]"
                                                    value="seat{{ generateSeat($x) }}1" id="seat{{ generateSeat($x) }}1">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}1">
                                                    1
                                                </label>
                                            </div>
                                        </td>
                                        <td colspan="2">
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off" name="input[]"
                                                    value="seat{{ generateSeat($x) }}2" id="seat{{ generateSeat($x) }}2">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}2">
                                                    2
                                                </label>
                                            </div>
                                        </td>
                                    @else
                                        <td>
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off" name="input[]"
                                                    value="seat{{ generateSeat($x) }}1"
                                                    id="seat{{ generateSeat($x) }}1">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}1">
                                                    1
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}2"
                                                    id="seat{{ generateSeat($x) }}2">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}2">
                                                    2
                                                </label>
                                            </div>
                                        </td>
                                    @endif
                                @endfor
                            </tr>
                            <tr>
                                {{-- Baris 2 --}}
                                @for ($x = 1; $x <= 9; $x++)
                                    @if ($x == 2)
                                        <td colspan="2" class="align-middle text-center text-danger">
                                            Camera 2
                                        </td>
                                    @elseif ($x == 6)
                                        {{-- F --}}
                                        <td colspan="2">
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}4"
                                                    id="seat{{ generateSeat($x) }}4">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}4">
                                                    4
                                                </label>
                                            </div>
                                        </td>
                                        <td colspan="2">
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}5"
                                                    id="seat{{ generateSeat($x) }}5">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}5">
                                                    5
                                                </label>
                                            </div>
                                        </td>
                                    @elseif ($x == 7)
                                        {{-- G --}}
                                        <td>
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}3"
                                                    id="seat{{ generateSeat($x) }}3">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}3">
                                                    3
                                                </label>
                                            </div>
                                        </td>
                                        <td colspan="2">
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}4"
                                                    id="seat{{ generateSeat($x) }}4">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}4">
                                                    4
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}5"
                                                    id="seat{{ generateSeat($x) }}5">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}5">
                                                    5
                                                </label>
                                            </div>
                                        </td>
                                    @elseif ($x == 9)
                                        <td>
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}3"
                                                    id="seat{{ generateSeat($x) }}3">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}3">
                                                    3
                                                </label>
                                            </div>
                                        </td>
                                        <td colspan="2">
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}4"
                                                    id="seat{{ generateSeat($x) }}4">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}4">
                                                    4
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}5"
                                                    id="seat{{ generateSeat($x) }}5">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}5">
                                                    5
                                                </label>
                                            </div>
                                        </td>
                                    @else
                                        <td>
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}3"
                                                    id="seat{{ generateSeat($x) }}3">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}3">
                                                    3
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}4"
                                                    id="seat{{ generateSeat($x) }}4">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}4">
                                                    4
                                                </label>
                                            </div>
                                        </td>
                                    @endif
                                @endfor
                            </tr>
                            <tr>
                                {{-- Baris 3 --}}
                                @for ($x = 1; $x <= 9; $x++)
                                    @if ($x == 6)
                                        {{-- F --}}
                                        <td>
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}6"
                                                    id="seat{{ generateSeat($x) }}6">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}6">
                                                    6
                                                </label>
                                            </div>
                                        </td>
                                        <td colspan="2">
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}7"
                                                    id="seat{{ generateSeat($x) }}7">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}7">
                                                    7
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}8"
                                                    id="seat{{ generateSeat($x) }}8">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}8">
                                                    8
                                                </label>
                                            </div>
                                        </td>
                                    @elseif ($x == 7)
                                        {{-- G --}}
                                        <td colspan="2">
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}6"
                                                    id="seat{{ generateSeat($x) }}6">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}6">
                                                    6
                                                </label>
                                            </div>
                                        </td>
                                        <td colspan="2">
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}7"
                                                    id="seat{{ generateSeat($x) }}7">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}7">
                                                    7
                                                </label>
                                            </div>
                                        </td>
                                    @elseif ($x == 9)
                                        <td colspan="2">
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}6"
                                                    id="seat{{ generateSeat($x) }}6">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}6">
                                                    6
                                                </label>
                                            </div>
                                        </td>
                                        <td colspan="2">
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}7"
                                                    id="seat{{ generateSeat($x) }}7">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}7">
                                                    7
                                                </label>
                                            </div>
                                        </td>
                                    @else
                                        <td>
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}5"
                                                    id="seat{{ generateSeat($x) }}5">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}5">
                                                    5
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}6"
                                                    id="seat{{ generateSeat($x) }}6">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}6">
                                                    6
                                                </label>
                                            </div>
                                        </td>
                                    @endif
                                @endfor
                            </tr>
                            <tr>
                                {{-- Baris 4 --}}
                                @for ($x = 1; $x <= 9; $x++)
                                    @if ($x == 6)
                                        {{-- F --}}
                                        <td colspan="2">
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}9"
                                                    id="seat{{ generateSeat($x) }}9">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}9">
                                                    9
                                                </label>
                                            </div>
                                        </td>
                                        <td colspan="2">
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}10"
                                                    id="seat{{ generateSeat($x) }}10">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}10">
                                                    10
                                                </label>
                                            </div>
                                        </td>
                                    @elseif ($x == 7)
                                        {{-- G --}}
                                        <td>
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}8"
                                                    id="seat{{ generateSeat($x) }}8">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}8">
                                                    8
                                                </label>
                                            </div>
                                        </td>
                                        <td colspan="2">
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}9"
                                                    id="seat{{ generateSeat($x) }}9">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}9">
                                                    9
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}10"
                                                    id="seat{{ generateSeat($x) }}10">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}10">
                                                    10
                                                </label>
                                            </div>
                                        </td>
                                    @elseif ($x == 9)
                                        <td>
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}8"
                                                    id="seat{{ generateSeat($x) }}8">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}8">
                                                    8
                                                </label>
                                            </div>
                                        </td>
                                        <td colspan="2">
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}9"
                                                    id="seat{{ generateSeat($x) }}9">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}9">
                                                    9
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}10"
                                                    id="seat{{ generateSeat($x) }}10">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}10">
                                                    10
                                                </label>
                                            </div>
                                        </td>
                                    @else
                                        <td>
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}7"
                                                    id="seat{{ generateSeat($x) }}7">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}7">
                                                    7
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}8"
                                                    id="seat{{ generateSeat($x) }}8">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}8">
                                                    8
                                                </label>
                                            </div>
                                        </td>
                                    @endif
                                @endfor
                            </tr>
                            <tr>
                                {{-- Baris 5 --}}
                                @for ($x = 1; $x <= 9; $x++)
                                    @if ($x == 6)
                                        {{-- F --}}
                                        <td colspan="2">
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}11"
                                                    id="seat{{ generateSeat($x) }}11">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}11">
                                                    11
                                                </label>
                                            </div>
                                        </td>
                                        <td colspan="2">
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}12"
                                                    id="seat{{ generateSeat($x) }}12">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}12">
                                                    12
                                                </label>
                                            </div>
                                        </td>
                                    @elseif ($x == 7)
                                        {{-- G --}}
                                        <td colspan="2">
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}11"
                                                    id="seat{{ generateSeat($x) }}11">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}11">
                                                    11
                                                </label>
                                            </div>
                                        </td>
                                        <td colspan="2">
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}12"
                                                    id="seat{{ generateSeat($x) }}12">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}12">
                                                    12
                                                </label>
                                            </div>
                                        </td>
                                    @elseif ($x == 9)
                                        <td colspan="2">
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}11"
                                                    id="seat{{ generateSeat($x) }}11">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}11">
                                                    11
                                                </label>
                                            </div>
                                        </td>
                                        <td colspan="2">
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}12"
                                                    id="seat{{ generateSeat($x) }}12">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}12">
                                                    12
                                                </label>
                                            </div>
                                        </td>
                                    @else
                                        <td>
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}9"
                                                    id="seat{{ generateSeat($x) }}9">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}9">
                                                    9
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}10"
                                                    id="seat{{ generateSeat($x) }}10">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}10">
                                                    10
                                                </label>
                                            </div>
                                        </td>
                                    @endif
                                @endfor
                            </tr>
                            <tr>
                                {{-- Baris 6 --}}
                                @for ($x = 1; $x <= 9; $x++)
                                    @if ($x == 6 || $x == 9)
                                        {{-- F & I --}}
                                        <td colspan="4"></td>
                                    @elseif ($x == 7)
                                        {{-- G --}}
                                        <td colspan="2">
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}13"
                                                    id="seat{{ generateSeat($x) }}13">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}13">
                                                    13
                                                </label>
                                            </div>
                                        </td>
                                        <td colspan="2">
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}14"
                                                    id="seat{{ generateSeat($x) }}14">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}14">
                                                    14
                                                </label>
                                            </div>
                                        </td>
                                    @else
                                        <td>
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}11"
                                                    id="seat{{ generateSeat($x) }}11">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}11">
                                                    11
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}12"
                                                    id="seat{{ generateSeat($x) }}12">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}12">
                                                    12
                                                </label>
                                            </div>
                                        </td>
                                    @endif
                                @endfor
                            </tr>
                            <tr>
                                {{-- Baris 7 --}}
                                @for ($x = 1; $x <= 9; $x++)
                                    @if ($x == 6 || $x == 8 || $x == 9)
                                        {{-- F, H, I --}}
                                        <td colspan="{{ $x == 6 || $x == 9 ? 4 : 2 }}"></td>
                                    @elseif ($x == 7)
                                        {{-- G --}}
                                        <td>
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}15"
                                                    id="seat{{ generateSeat($x) }}15">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}15">
                                                    15
                                                </label>
                                            </div>
                                        </td>
                                        <td colspan="2">
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}16"
                                                    id="seat{{ generateSeat($x) }}16">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}16">
                                                    16
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}17"
                                                    id="seat{{ generateSeat($x) }}17">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}17">
                                                    17
                                                </label>
                                            </div>
                                        </td>
                                    @else
                                        <td>
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}13"
                                                    id="seat{{ generateSeat($x) }}13">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}13">
                                                    13
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}14"
                                                    id="seat{{ generateSeat($x) }}14">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}14">
                                                    14
                                                </label>
                                            </div>
                                        </td>
                                    @endif
                                @endfor
                            </tr>
                            <tr>
                                {{-- Baris 8 --}}
                                @for ($x = 1; $x <= 9; $x++)
                                    @if ($x == 6 || $x == 8 || $x == 9)
                                        {{-- F, H, I --}}
                                        <td colspan="{{ $x == 6 || $x == 9 ? 4 : 2 }}"></td>
                                    @elseif ($x == 7)
                                        {{-- G --}}
                                        <td>
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}18"
                                                    id="seat{{ generateSeat($x) }}18">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}18">
                                                    18
                                                </label>
                                            </div>
                                        </td>
                                        <td colspan="2">
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}19"
                                                    id="seat{{ generateSeat($x) }}19">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}19">
                                                    19
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}20"
                                                    id="seat{{ generateSeat($x) }}20">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}20">
                                                    20
                                                </label>
                                            </div>
                                        </td>
                                    @else
                                        <td>
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}15"
                                                    id="seat{{ generateSeat($x) }}15">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}15">
                                                    15
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}16"
                                                    id="seat{{ generateSeat($x) }}16">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}16">
                                                    16
                                                </label>
                                            </div>
                                        </td>
                                    @endif
                                @endfor
                            </tr>
                            <tr>
                                {{-- Baris 9 --}}
                                @for ($x = 1; $x <= 9; $x++)
                                    @if ($x == 3)
                                        <td colspan="2" class="align-middle text-center text-danger">
                                            Camera 1
                                        </td>
                                    @elseif ($x == 6 || $x == 7 || $x == 8 || $x == 9)
                                        {{-- F, G, H, I --}}
                                        <td colspan="{{ $x == 6 || $x == 7 || $x == 9 ? 4 : 2 }}"></td>
                                    @else
                                        <td>
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}17"
                                                    id="seat{{ generateSeat($x) }}17">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}17">
                                                    17
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}18"
                                                    id="seat{{ generateSeat($x) }}18">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}18">
                                                    18
                                                </label>
                                            </div>
                                        </td>
                                    @endif
                                @endfor
                            </tr>
                            <tr>
                                @for ($x = 1; $x <= 9; $x++)
                                    @if ($x == 6 || $x == 7 || $x == 8 || $x == 9)
                                        {{-- F, G, H, I --}}
                                        <td colspan="{{ $x == 6 || $x == 7 || $x == 9 ? 4 : 2 }}"></td>
                                    @else
                                        <td>
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}19"
                                                    id="seat{{ generateSeat($x) }}19">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}19">
                                                    19
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}20"
                                                    id="seat{{ generateSeat($x) }}20">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}20">
                                                    20
                                                </label>
                                            </div>
                                        </td>
                                    @endif
                                @endfor
                            </tr>
                            <tr>
                                @for ($x = 1; $x <= 9; $x++)
                                    @if ($x == 6 || $x == 7 || $x == 8 || $x == 9)
                                        {{-- F, G, H, I --}}
                                        <td colspan="{{ $x == 6 || $x == 7 || $x == 9 ? 4 : 2 }}"></td>
                                    @else
                                        <td>
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}21"
                                                    id="seat{{ generateSeat($x) }}21">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}21">
                                                    21
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}22"
                                                    id="seat{{ generateSeat($x) }}22">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}22">
                                                    22
                                                </label>
                                            </div>
                                        </td>
                                    @endif
                                @endfor
                            </tr>
                            <tr>
                                @for ($x = 1; $x <= 9; $x++)
                                    @if ($x == 6 || $x == 7 || $x == 8 || $x == 9)
                                        {{-- F, G, H, I --}}
                                        <td colspan="{{ $x == 6 || $x == 7 || $x == 9 ? 4 : 2 }}"></td>
                                    @else
                                        <td>
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}23"
                                                    id="seat{{ generateSeat($x) }}23">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}23">
                                                    23
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}24"
                                                    id="seat{{ generateSeat($x) }}24">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}24">
                                                    24
                                                </label>
                                            </div>
                                        </td>
                                    @endif
                                @endfor
                            </tr>
                            <tr>
                                @for ($x = 1; $x <= 9; $x++)
                                    @if ($x == 6 || $x == 7 || $x == 8 || $x == 9)
                                        {{-- F, G, H, I --}}
                                        <td colspan="{{ $x == 6 || $x == 7 || $x == 9 ? 4 : 2 }}"></td>
                                    @else
                                        <td>
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}25"
                                                    id="seat{{ generateSeat($x) }}25">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}25">
                                                    25
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
                                                <input type="checkbox" class="btn-check" autocomplete="off"
                                                    name="input[]" value="seat{{ generateSeat($x) }}26"
                                                    id="seat{{ generateSeat($x) }}26">
                                                <label class="btn btn-sm btn-outline-success"
                                                    for="seat{{ generateSeat($x) }}26">
                                                    26
                                                </label>
                                            </div>
                                        </td>
                                    @endif
                                @endfor
                            </tr>
                        </tbody>
                    </table>
                </div>
                <button type="submit" class="btn btn-primary">Book Now</button>
            </form>
        </div>
    </div>
@endsection

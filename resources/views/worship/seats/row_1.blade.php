<tr>
    {{-- A --}}
    @include('worship.seats.seat.component', ['seatLetter' => 'A', 'seatNumber' => '1'])
    @include('worship.seats.seat.component', ['seatLetter' => 'A', 'seatNumber' => '2'])

    {{-- B --}}
    @include('worship.seats.seat.component', ['seatLetter' => 'B', 'seatNumber' => '1'])
    @include('worship.seats.seat.component', ['seatLetter' => 'B', 'seatNumber' => '2'])

    {{-- C --}}
    @include('worship.seats.seat.component', ['seatLetter' => 'C', 'seatNumber' => '1'])
    @include('worship.seats.seat.component', ['seatLetter' => 'C', 'seatNumber' => '2'])

    {{-- D --}}
    <td colspan="2"></td>

    {{-- E --}}
    <td colspan="2"></td>

    {{-- F --}}
    @include('worship.seats.seat.component', ['seatLetter' => 'F', 'seatNumber' => '1'])
    @include('worship.seats.seat.component', ['seatLetter' => 'F', 'seatNumber' => '2', 'colspan' => '2'])
    @include('worship.seats.seat.component', ['seatLetter' => 'F', 'seatNumber' => '3'])

    {{-- G --}}
    <td colspan="4"></td>

    {{-- H --}}
    <td colspan="2"></td>

    {{-- I --}}
    @include('worship.seats.seat.component', ['seatLetter' => 'I', 'seatNumber' => '1', 'colspan' => '2'])
    @include('worship.seats.seat.component', ['seatLetter' => 'I', 'seatNumber' => '2', 'colspan' => '2'])
</tr>

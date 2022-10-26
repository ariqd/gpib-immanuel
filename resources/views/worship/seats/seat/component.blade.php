@php
    $seat = $seatLetter . $seatNumber;
@endphp

<td colspan="{{ @$colspan }}">
    <div class="d-grid gap-2 col-6 mx-auto" style="width: 50px">
        <input type="checkbox" class="btn-check" autocomplete="off" name="input[]"
            {{ in_array($seat, $booked_seats) ? 'checked disabled' : '' }} value="{{ $seat }}" id="{{ $seat }}">
        <label class="btn btn-sm btn-outline-success" for="{{ $seat }}">
            {{ $seatNumber }}
        </label>
    </div>
</td>

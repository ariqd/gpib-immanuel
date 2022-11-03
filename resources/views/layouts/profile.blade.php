@extends('layouts.main')

@section('content')
    <div class="container py-3">
        <div class="row">
            <div class="col-3">
                <div class="list-group">
                    <a href="{{ route('profile.bookings.index') }}"
                        class="list-group-item list-group-item-action {{ request()->is('profile/bookings*') ? 'active' : '' }}"
                        aria-current="true">
                        Tiket Saya
                    </a>
                    <a href="#"
                        class="list-group-item list-group-item-action {{ request()->is('profile/bio*') ? 'active' : '' }}">Biodata</a>
                </div>
            </div>
            <div class="col-9">
                @yield('profile_page')
            </div>
        </div>
    </div>
@endsection

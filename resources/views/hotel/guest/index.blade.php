@extends('hotel.main')

@section('content')
    {{--  nav-bar  --}}
    @include('hotel.guest.gu_navbar')

    @yield('gu_content')
@endsection
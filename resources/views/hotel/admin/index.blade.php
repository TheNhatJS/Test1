@extends('hotel.main')

@section('content')
    {{--  nav-bar  --}}
    @include('hotel.admin.ad_navbar')

    @yield('ad_content')
@endsection
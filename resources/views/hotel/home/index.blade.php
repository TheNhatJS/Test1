@include('hotel.elements.header')

@extends('hotel.main')

@section('content')
    @include('hotel.elements.slider')
    <div id="content">
        @include('hotel.elements.about_us')

        @include('hotel.elements.list_room')

        @include('hotel.elements.tien_ich')

        @include('hotel.elements.contact')
    </div>
    @include('hotel.elements.footer')
@endsection

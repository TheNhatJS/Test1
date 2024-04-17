<!DOCTYPE html>
<html lang="en">

@include('hotel.elements.head')

<body>
    <div id="main">
        {{--  Header  --}}
        @include('hotel.elements.header')
        
        @yield('content')    
        
        {{--  Footer  --}}
        
    </div>
    
    {{--  JS  --}}
    @include('hotel.elements.script')
</body>

</html>
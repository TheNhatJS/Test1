<div id="header">
    <div class="logo">
        <a href="{{ route('home') }}" class="logo-hotel">
            <img src="{{ asset('hotel/assets/img/Logo/jshotel.png') }}" alt="" class="hotel-img">
        </a>
    </div>

    <ul id="nav">
        <li><a href="{{ route('home') }}">Trang chủ</a></li>
        <li><a href="{{ route('home') }}#aboutUs">Về chúng tôi</a></li>

        <li>
            <a href="#">Phòng
                <i class="nav-arrow-down ti-angle-down"></i>
            </a>

            <ul class="sub-nav">
                <li><a href="{{ route('home') }}#Standard">Standard</a></li>

                <li><a href="{{ route('home') }}#Superior">Superior</a></li>

                <li><a href="{{ route('home') }}#Deluxe">Deluxe</a></li>

                <li><a href="{{ route('home') }}#Suite">Suite</a></li>
            </ul>
        </li>

        <li><a href="{{ route('home') }}#tienIch">Tiện ích khách sạn</a></li>

        <li><a href="{{ route('home') }}#contact">Contact</a></li>
    </ul>

    {{--  <div class="customer">
        <div class="user">
            <a href="{{ route('home/loginn') }}">Đăng nhập</a> | <a href="{{ route('home/register') }}">Đăng ký</a>
        </div>
    </div>  --}}

    <div class="customer">
        <div class="user">
            @if(Session::has('userr'))
                @php $user = Session::get('userr'); @endphp
                @if($user->role == 'ADMIN')
                    <ul id="nav-user">
                        <li>
                            <a href="#">{{ $user->name }}</a>
                            <ul class="sub-nav-user">
                                <li><a href="{{ route('admin') }}">Admin</a></li>
                                <li><a href="{{ route('home/get-logout') }}">Đăng xuất</a></li>
                            </ul>
                        </li>
                    </ul>

                    {{--  <a href="{{ route('admin') }}" class="admin-hover">Admin</a> |   --}}

                
                @else
                    <ul id="nav-user">
                        <li>
                            <a href="#">{{ $user->name }}</a>
                            <ul class="sub-nav-user">
                                <li><a href="{{ route('guest') }}">Tài khoản</a></li>
                                <li><a href="{{ route('home/get-logout') }}">Đăng xuất</a></li>
                            </ul>
                        </li>
                    </ul>
                @endif

            @else
                <a href="{{ route('home/loginn') }}">Đăng nhập</a> | 
                <a href="{{ route('home/register') }}">Đăng ký</a>
            @endif
        </div>
    </div>
    
    
</div>
@extends('hotel.main')

@section('content')
    <div class="container-login-register">
        <div class="login-register">
            <h1>Đăng ký</h1>
            <div id="error-message" class="text-alert" style="color: red; font-weight: 700">
                @php
                    $message = Session::get('error');
                    if($message) {
                        echo $message;
                        Session::put('error', null);
                    }
                @endphp
            </div>
            <form action="{{ route('home/post-register') }}" method="POST">
                {{ csrf_field() }}
    
                <div>
                    <label for="name">Họ và tên</label><br>
                    <input type="text" id="name" name="name" placeholder="Nhập họ và tên" required><br>
                </div>

                <div>
                    <label for="phone">Số điện thoại</label><br>
                    <input type="text" id="phone" name="phone" placeholder="Nhập số điện thoại" maxlength="10" required><br>
                </div>

                <div>
                    <label for="email">Email</label><br>
                    <input type="email" id="email" name="email" placeholder="Nhập email" required><br>
                </div>
    
                <div>
                    <label for="password">Mật khẩu</label><br>
                    <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required><br>
                </div>

                <div>
                    <label for="RE-password">Nhập lại mật khẩu</label><br>
                    <input type="password" id="RE-password" name="REpassword" placeholder="Nhập lại mật khẩu" required><br>
                </div>
    
                <button type="submit" name="registerSubmit">Đăng ký</button>
            </form>
        </div>
    </div>
    @include('hotel.elements.footer')
@endsection
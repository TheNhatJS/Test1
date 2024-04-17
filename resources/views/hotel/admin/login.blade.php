@extends('hotel.main')

@section('content')
    <div class="container-login-register">
        <div class="login-register">
            <h1>Đăng nhập</h1>
            <div id="error-message" class="text-alert" style="color: red; font-weight: 700">
                @php
                    $message = Session::get('error');
                    if($message) {
                        echo $message;
                        Session::put('error', null);
                    }
                @endphp
            </div>
            <form action="{{ route('home/post-login') }}" method="POST">
                {{ csrf_field() }}
    
                <div>
                    <label for="email">Email:</label><br>
                    <input type="email" id="email" name="email" placeholder="Nhập email" required><br>
                </div>
    
                <div>
                    <label for="password">Mật khẩu:</label><br>
                    <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required><br>
                </div>
    
                <button type="submit" name="loginSubmit">Đăng nhập</button>
            </form>
        </div>
    </div>
    @include('hotel.elements.footer')
@endsection
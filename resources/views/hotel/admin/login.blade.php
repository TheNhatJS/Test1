@extends('hotel.main')

@section('content')
    <div class="container-login-register">
        <div class="login-register">
            <div style="width: 50px; height: 50px; margin: 0 auto;">
                <img src="{{ asset('hotel/assets/img/logo/logoDAU.jpg') }}" alt="" style="width: 100%">
            </div>

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
                    <div style="display: flex">
                        <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
                        <button type="button" onclick="show(this)" style="width: 37px; height: 37px; display: flex; justify-content: center; align-items: center; margin-bottom: 0; margin-left: 4px; border-radius: 5px">
                            <i id="eye-icon" class="ti-eye"></i>
                        </button>
                    </div>
                </div>
    
                <button type="submit" name="loginSubmit">Đăng nhập</button>
                <a href="{{ route('home/register') }}" style="margin: 4px auto 0; font-size: 14px;">Đăng ký</a></button>
                
            </form>
        </div>
    </div>

    <script>
        function show(check) {
            const mkInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');

            if (mkInput.type === 'password') {
                mkInput.type = 'text';
                eyeIcon.classList.add('ti-lock');
                eyeIcon.classList.remove('ti-eye');
            } else {
                mkInput.type = 'password';
                eyeIcon.classList.add('ti-eye');
                eyeIcon.classList.remove('ti-lock');
            }
        }
    </script>
    {{--  @include('hotel.elements.footer')  --}}
@endsection
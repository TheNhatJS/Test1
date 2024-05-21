@extends('hotel.main')

@section('content')
    <div class="container-login-register">
        <div class="login-register">
            <div style="width: 50px; height: 50px; margin: 0 auto;">
                <img src="{{ asset('hotel/assets/img/logo/logoDAU.jpg') }}" alt="" style="width: 100%">
            </div>

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
                    {{--  <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required><br>  --}}
                    <div style="display: flex">
                        <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
                        <button type="button" onclick="show(this)" style="width: 37px; height: 37px; display: flex; justify-content: center; align-items: center; margin-bottom: 0; margin-left: 4px; border-radius: 5px">
                            <i id="eye-icon" class="ti-eye"></i>
                        </button>
                    </div>
                </div>

                <div>
                    <label for="RE-password">Nhập lại mật khẩu</label><br>
                    {{--  <input type="password" id="RE-password" name="REpassword" placeholder="Nhập lại mật khẩu" required><br>  --}}
                    <div style="display: flex">
                        <input type="password" id="RE-password" name="REpassword" placeholder="Nhập lại mật khẩu" required><br>
                        <button type="button" onclick="show2(this)" style="width: 37px; height: 37px; display: flex; justify-content: center; align-items: center; margin-bottom: 0; margin-left: 4px; border-radius: 5px">
                            <i id="eye-icon2" class="ti-eye"></i>
                        </button>
                    </div>
                </div>
    
                <button type="submit" name="registerSubmit">Đăng ký</button>
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

        function show2(check) {
            const mkInput = document.getElementById('RE-password');
            const eyeIcon = document.getElementById('eye-icon2');

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
    {{--  @include
    {{--  @include('hotel.elements.footer')  --}}
@endsection
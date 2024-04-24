@extends('hotel.guest.index')

@section('gu_content')
    <div id="inf-user">
        <div id="error-message" class="text-alert" style="color: red; font-weight: 700">
            @php
                $message = Session::get('error');
                if($message) {
                    echo $message;
                    Session::put('error', null);
                }
            @endphp
        </div>

        <table class="tb-info-user" border="1px">
            <form action="{{ route('home/guest/postUpdateUser', ['userID' => Session::get('userr')->userID]) }}" method="POST" class="form-user">
                @csrf
                <tr class="tr-info-user">
                    <th>
                        <label for="name">Họ và tên</label>
                    </th>

                    <td><input type="text" value="{{ Session::get('userr')->name }}" name="name"></td>
                </tr>

                <tr class="tr-info-user">
                    <th>
                        <label for="email">Email</label>
                    </th>

                    <td><input type="email" value="{{ Session::get('userr')->email }}" name="email"></td>
                </tr>

                <tr class="tr-info-user">
                    <th>
                        <label for="phone">Phone</label>
                    </th>

                    <td><input type="text" value="{{ Session::get('userr')->phone }}" name="phone"></td>
                </tr>

                <tr class="tr-info-user">
                    <th>
                        <label for="oldPassword">Nhập mật khẩu cũ</label>
                    </th>

                    <td><input type="password" placeholder="Nhập mật khẩu cũ" name="oldPassword" required></td>
                </tr>

                <tr class="tr-info-user">
                    <th>
                        <label for="newPassword">Nhập mật khẩu mới</label>
                    </th>

                    <td><input type="password" placeholder="Nhập mật khẩu mới" name="newPassword"></td>
                </tr>

                <tr class="tr-info-user">
                    <th>
                        <label for="reNewPassword">Nhập lại mật khẩu mới</label>
                    </th>

                    <td><input type="password" placeholder="Nhập lại mật khẩu mới" name="reNewPassword"></td>
                </tr>

                <button type="submit" name="btn-update">Cập nhật</button>

            </form>
        </table>
    </div>
@endsection

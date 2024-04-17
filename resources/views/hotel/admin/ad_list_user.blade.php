@extends('hotel.admin.index')

@section('ad_content')
    <div id="ad-room-list">
        <div style="width: 90%; background-color: #b5e1f4; padding: 5px; margin: 20px auto 10px auto; text-align: center; border-radius: 5px">
            <h1 class="ad-list-title">Danh sách người dùng</h1>
        </div>
        <div id="error-message" class="text-alert" style="color: red; font-weight: 700">
            @php
                $message = Session::get('error');
                if($message) {
                    echo $message;
                    Session::put('error', null);
                }
            @endphp
        </div>
        <div style="padding: 20px; background-color: #fcfcfc; box-shadow: 0 0 10px rgba(56, 56, 56, 0.6); border-radius: 5px; width: 90%; margin: auto">

            <table border="1px">
                <thead style="background-color: #b5e1f4;">
                    <th>STT</th>
                    <th>Họ và tên</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </thead>

                <tbody>
                    @foreach($allUser as $key => $cateUser)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $cateUser->name }}</td>
                        <td>{{ $cateUser->email }}</td>
                        <td>{{ $cateUser->phone }}</td>
                        <td>
                            <a href="{{ route('home/admin/deleteUser', ['userID' => $cateUser->userID]) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"><i class="ti-trash">
                                
                            </i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@extends('hotel.admin.index')

@section('ad_content')
    <div id="add-room">
        <h1 class="add-room-title">Thêm phòng</h1>
        {{--  @php
                $message = Session::get('error');
                if($message) {
                    echo '<span class="text-alert" style="color: red; font-weight: 700">'. $message .'</span>';
                    Session::put('error', null);
                }
        @endphp  --}}
        <div id="error-message" class="text-alert" style="color: red; font-weight: 700">
            @php
                $message = Session::get('error');
                if($message) {
                    echo $message;
                    Session::put('error', null);
                }
            @endphp
        </div>
        <table border="1px">
            <form action="{{ route('home/admin/postAddRoom') }}" method="post">
                {{ csrf_field() }}
                <tr>
                    <th>
                        <label for="roomName">Tên phòng</label>
                    </th>

                    <td><input type="text" id="roomName" name="roomName"></td>
                </tr>

                <tr>
                    <th>
                        <label for="countPeo">Số người tối đa</label>
                    </th>

                    <td><input type="number" id="countPeo" name="countPeo"></td>
                </tr>

                <tr>
                    <th>
                        <label for="roomPrice">Giá</label>
                    </th>

                    <td><input type="text" id="roomPrice" name="roomPrice"></td>
                </tr>

                <tr>
                    <th>
                        <label for="roomStatus">Trạng thái</label>
                    </th>

                    <td>
                        <select id="roomStatus" name="roomStatus">
                            <option value="1" selected>Còn trống</option>
                            <option value="0">Hết phòng</option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <th>
                        <label for="roomType">Loại phòng</label>
                    </th>
                
                    <td>
                        <select id="roomType" name="roomType">
                            <option value="Standard" selected>Standard</option>
                            <option value="Superior">Superior</option>
                            <option value="Deluxe">Deluxe</option>
                            <option value="Suite">Suite</option>
                
                        </select>
                    </td>
                </tr>

                <tr>
                    <th>
                        <label for="roomInfo">Thông tin giới thiệu</label>
                    </th>

                    <td>
                        <textarea id="roomInfo" name="roomInfo" cols="30" rows="10" style="width: 100%;"></textarea>
                    </td>
                </tr>
                
                <tr>
                    <th>
                        <label for="roomImage">Ảnh phòng</label>
                    </th>
                
                    <td>
                        <input id="roomImage" name="roomImage" type="file">
                    </td>
                </tr>

                <div class="btn">
                    <button type="submit" name="btnThem">Thêm</button>
                    <button type="reset">Reset</button>
                </div>
            </form>
        </table>
    </div>
@endsection

@extends('hotel.admin.index')

@section('ad_content')
    <div id="add-room">
        <h1 class="add-room-title">Sửa phòng</h1>

        <div id="error-message" class="text-alert" style="color: red; font-weight: 700">
            @php
                $message = Session::get('error');
                if ($message) {
                    echo $message;
                    Session::put('error', null);
                }
            @endphp
        </div>

        <table border="1px">
            @foreach ($allInfoRoom as $key => $cateInfoR)
                <form action="{{ route('home/admin/postUpdateRoom', ['roomID' => $cateInfoR->roomID]) }}" method="post">
                    {{ csrf_field() }}

                    <tr>
                        <th>
                            <label for="roomName">Tên phòng</label>
                        </th>
                        <td><input type="text" id="roomName" name="roomName" value="{{ $cateInfoR->name }}"></td>
                    </tr>

                    <tr>
                        <th>
                            <label for="countPeo">Số người tối đa</label>
                        </th>
                        <td><input type="number" id="countPeo" name="countPeo" value="{{ $cateInfoR->countPeople }}"></td>
                    </tr>

                    <tr>
                        <th>
                            <label for="roomPrice">Giá</label>
                        </th>
                        <td><input type="text" id="roomPrice" name="roomPrice" value="{{ $cateInfoR->price }}"></td>
                    </tr>

                    <tr>
                        <th>
                            <label for="roomStatus">Trạng thái</label>
                        </th>
                        <td>
                            <select id="roomStatus" name="roomStatus">
                                <option value="1" {{ $cateInfoR->status == 1 ? 'selected' : '' }}>Còn trống</option>
                                <option value="0" {{ $cateInfoR->status == 0 ? 'selected' : '' }}>Hết phòng</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <th>
                            <label for="roomType">Loại phòng</label>
                        </th>
                        <td>
                            <select id="roomType" name="roomType">
                                <option value="Standard" {{ $cateInfoR->type == 'Standard' ? 'selected' : '' }}>Standard</option>
                                <option value="Superior" {{ $cateInfoR->type == 'Superior' ? 'selected' : '' }}>Superior</option>
                                <option value="Deluxe" {{ $cateInfoR->type == 'Deluxe' ? 'selected' : '' }}>Deluxe</option>
                                <option value="Suite" {{ $cateInfoR->type == 'Suite' ? 'selected' : '' }}>Suite</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <th>
                            <label for="roomInfo">Thông tin giới thiệu</label>
                        </th>
                        <td>
                            <textarea id="roomInfo" name="roomInfo" cols="30" rows="10" style="width: 100%;">{{ $cateInfoR->info }}</textarea>
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
                        <button type="submit" name="btnThem">Cập nhật</button>
                        <button type="reset">Reset</button>
                    </div>
                </form>
            @endforeach

        </table>
    </div>
@endsection

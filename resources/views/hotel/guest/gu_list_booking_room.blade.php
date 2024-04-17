@extends('hotel.guest.index')

@section('gu_content')
<div id="ad-room-list">
    <div style="width: 90%; background-color: #b5e1f4; padding: 5px; margin: 20px auto 10px auto; text-align: center; border-radius: 5px">
        <h1 class="ad-list-title">Danh sách đặt phòng</h1>
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
                    <th>Ảnh</th>
                    <th>Tên phòng</th>
                    <th>Thông tin đặt phòng</th>
                    <th>Thông tin khách hàng</th>
    
                    <th colspan="2">Action</th>
                </thead>
    
                <tbody>
                    @foreach ($allBooking as $key => $cateBooking)
    
                        <?php 
                            $user = DB::table('tbl_user')->where('userID', $cateBooking->userID)->first();
    
                            $room = DB::table('tbl_room')->where('roomID', $cateBooking->roomID)->first();
                        ?>
    
    
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td><img src="{{ asset('hotel/assets/img/Room/' . $room->image) }}" alt=""></td>
                            <td>{{ $room->name }}</td>
                            <td>
                                Số người: {{ $cateBooking->odCountPeople }} <br>
                                Ngày nhận phòng: {{ $cateBooking->checkInDate }} <br>
                                Ngày trả phòng: {{ $cateBooking->checkOutDate }} <br>
                                Ghi chú: {{ $cateBooking->note }} <br>
                            </td>
                            <td>
                                Name: {{ $user->name }} <br>
                                Phone: {{ $user->phone }} <br>
                                Email: {{ $user->email }} <br>
                                
                            </td>
    
                            <td>
                                <a href="{{ route('home/guest/updateBookingRom', ['bookingID' => $cateBooking->bookingID]) }}"><i class="ti-pencil">
                                    
                                </i></a>
                            </td>
    
                            <td>
                                <a href="{{ route('home/guest/deleteBookingRoom', ['bookingID' => $cateBooking->bookingID]) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"><i class="ti-trash"></i></a>
    
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>
@endsection

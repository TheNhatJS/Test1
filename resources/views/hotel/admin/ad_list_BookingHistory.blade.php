@extends('hotel.admin.index')

@section('ad_content')
    <div id="ad-room-list">
        <div style="width: 90%; background-color: #b5e1f4; padding: 5px; margin: 20px auto 10px auto; text-align: center; border-radius: 5px">
            <h1 class="ad-list-title">Lịch sử đặt phòng</h1>
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
                    <th>Tên phòng</th>
                    <th>Tên người thuê</th>
                    <th>Ngày nhận phòng</th>
                    <th>Ngày trả phòng</th>
                    <th>Tổng tiền</th>
                    <th>Ngày tạo lịch sử</th>

                    <th>Action</th>
                </thead>

                <tbody>
                    @foreach($allBookingHistory as $key => $cateBookingHistory)

                    {{--  <?php
                        $booking = DB::table('tbl_booking')->where('bookingID', $cateBookingHistory->bookingID)->first();
                        $room = DB::table('tbl_room')->where('roomID', $booking->roomID)->first();
                        $user = DB::table('tbl_user')->where('userID', $booking->userID)->first();
                        $bill = DB::table('tbl_bill')->where('billID', $cateBookingHistory->billID)->first();

                    ?>  --}}
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $cateBookingHistory->nameRoom }}</td>
                        <td>{{ $cateBookingHistory->nameUser }}</td>
                        <td>{{ $cateBookingHistory->checkIn }}</td>
                        <td>{{ $cateBookingHistory->checkOut }}</td>
                        <td>{{ number_format($cateBookingHistory->payRoom, 0, ',', '.') }} VNĐ</td>
                        <td>{{ $cateBookingHistory->create }}</td>
                        
                        <td>
                            <a href="{{ route('home/admin/deleteBookingHistory', ['historyID' => $cateBookingHistory->historyID]) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"><i class="ti-trash">
                                
                            </i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@extends('hotel.admin.index')

@section('ad_content')
    <div id="ad-room-list">
        <div style="width: 90%; background-color: #b5e1f4; padding: 5px; margin: 20px auto 10px auto; text-align: center; border-radius: 5px">
            <h1 class="ad-list-title">Danh sách hóa đơn</h1>
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
                    <th>Thanh toán</th>

                    <th>Action</th>
                </thead>

                <tbody>
                    @foreach($allBill as $key => $cateBill)

                    <?php
                        $booking = DB::table('tbl_booking')->where('bookingID', $cateBill->bookingID)->first();
                        $room = DB::table('tbl_room')->where('roomID', $booking->roomID)->first();
                        $user = DB::table('tbl_user')->where('userID', $cateBill->userID)->first();

                        // Chuyển đổi ngày check-in và check-out sang đối tượng DateTime
                        $checkInDate = new DateTime($booking->checkInDate);
                        $checkOutDate = new DateTime($booking->checkOutDate);

                        // Tính số ngày giữa ngày check-in và check-out
                        $interval = $checkInDate->diff($checkOutDate);
                        $stay = $interval->days + 1; // Thêm 1 để bao gồm cả ngày check-out
                    ?>
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $room->name }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $booking->checkInDate }}</td>
                        <td>{{ $booking->checkOutDate }}</td>
                        <td>{{ number_format($stay * $cateBill->pay, 0, ',', '.') }} VNĐ</td>
                        <td>{{ number_format(($stay * $cateBill->pay) - ($stay * ($cateBill->pay*0.2)), 0, ',', '.') }} VNĐ</td>
                        
                        <td>
                            <a href="{{ route('home/admin/deleteBill', ['bookingID' => $cateBill->bookingID]) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"><i class="ti-trash">
                                
                            </i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
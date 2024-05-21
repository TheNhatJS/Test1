@include('hotel.elements.header')

@extends('hotel.main')

@section('content')

    <?php 
        $roomID = request()->input('roomID');

        $room = DB::table('tbl_room')->where('roomID', $roomID)->first();
    ?>

    <div class="container-booking">
        <div class="item-img-booking">
            <img src="{{ asset('hotel/assets/img/Room/' . $room->image) }}" alt="" class="image-booking" style="object-fit: cover; border-radius: 15px">
        </div>
    
        <div class="content-booking">
            <div class="inf-room">
                <table class="tb-inf-room">
                    <tr>
                        <th>Phòng:</th>
                        <td>{{ $room->name }}</td>
                    </tr>
    
                    <tr>
                        <th>Trạng thái:</th>
                        <td>{{ $room->status == 1 ? 'Đang trống' : 'Đã thuê' }}</td>
                    </tr>
    
                    <tr>
                        <th>Loại phòng:</th>
                        <td>{{ $room->type }}</td>
                    </tr>
    
                    <tr>
                        <th>Số người tối đa:</th>
                        <td>{{ $room->countPeople }}</td>
                    </tr>
    
                    <tr>
                        <th>Giá phòng:</th>
                        <td>{{number_format($room->price, 0, ',', '.') }} VNĐ/Ngày</td>
                    </tr>
                    
                    <tr>
                        <th>Tiền đặt cọc(10%):</th>
                        <td>
                            <?php
                                $datCoc = $room->price*0.1;
                                echo number_format($datCoc, 0, ',', '.') . " VNĐ";
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" style="font-size: 14px; font-weight: 100; line-height: 1.4; text-align: justify">
                            {!! nl2br(e($room->info)) !!}

                        </td>
                    </tr>

                </table>
            </div>
    
            <div class="inf-booking"> 
                <div id="error-message" class="text-alert" style="color: red; font-weight: 700">
                    @php
                        $message = Session::get('error');
                        if($message) {
                            echo $message;
                            Session::put('error', null);
                        }
                    @endphp
                </div>
                    <form action="{{ route('home/admin/postBookingRoom') }}" method="POST">

                        {{ csrf_field() }}

                        <input type="hidden" name="roomID" value="{{ $room->roomID }}">

                        <div>
                            <label for="name">Họ và tên</label><br>
                            <input type="text" id="name" name="name" required value="{{ Session::get('userr')->name }}" readonly required><br>
                        </div>
        
                        <div>
                            <label for="phone">Số điện thoại</label><br>
                            <input type="text" id="phone" name="phone" value="{{ Session::get('userr')->phone }}" maxlength="10" readonly required><br>
                        </div>
        
                        <div>
                            <label for="email">Email</label><br>
                            <input type="email" id="email" name="email" value="{{ Session::get('userr')->email }}" readonly required><br>
                        </div>
    
                        <div>
                            <label for="checkIn">Ngày nhận phòng</label><br>
                            <input type="date" id="checkIn" name="checkIn" placeholder="dd/mm/yy" required><br>
                        </div>
                        
                        <div>
                            <label for="checkOut">Ngày trả phòng</label><br>
                            <input type="date" id="checkOut" name="checkOut" placeholder="dd/mm/yy" required><br>
                        </div>
    
                        <div>
                            <label for="countPeople">Số lượng người</label><br>
                            <input type="number" id="countPeople" name="countPeople" max="{{ $room->countPeople }}" min="1" required><br>
                        </div>
    
                        <div>
                            <label for="note">Ghi chú</label><br>
                            <textarea name="note" id="note" cols="30" rows="10" placeholder="Ghi chú cho khách sạn"></textarea><br>
                        </div>
                        @if ($room->status == 1)
                            <button type="submit" name="btn-booking">Đặt phòng</button>                            
                        @else
                            <button type="submit" name="btn-booking" disabled >Đặt phòng</button>
                        @endif

                    </form>
            </div>
        </div>
    </div>
    @include('hotel.elements.footer')
@endsection
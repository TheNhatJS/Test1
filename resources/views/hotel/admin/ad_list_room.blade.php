@extends('hotel.admin.index')

@section('ad_content')
    <div id="ad-room-list">
        <div style="width: 90%; background-color: #b5e1f4; padding: 5px; margin: 20px auto 10px auto; text-align: center; border-radius: 5px">
            <h1 class="ad-list-title">Danh sách phòng</h1>
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
                        <th>Thông tin</th>
                        <th>Trạng thái</th>
                        <th>Loại</th>
                        <th>Giá</th>
                        <th>Số người tối đa</th>

                        <th colspan="2">Action</th>
                    </thead>

                    <tbody>
                        @foreach ($allRoom as $key =>$cateRoom)
                        <tr>
                            <td style="width: 50px">{{ ++$key }}</td>
                            <td style="width: 200px"><img src="{{ asset('hotel/assets/img/Room/'. $cateRoom->image) }}" alt="" style="width: 100%; object-fit: cover"></td>
                            <td>{{ $cateRoom->name }}</td>
                            <td>
                                {!! nl2br(e($cateRoom->info)) !!}

                            </td>
                            <td>
                                <?php 
                                    if($cateRoom->status == 0){
                                        echo "Đã thuê";
                                    }
                                    else {
                                        echo "Đang trống";
                                    }
                                ?>
                            </td>

                            <td>{{ $cateRoom->type }}</td>

                            <td>{{ $cateRoom->price }}</td>

                            <td>{{ $cateRoom->countPeople }}</td>


                            <td>
                                <a href="{{ route('home/admin/updateRoom', ['roomID' => $cateRoom->roomID]) }}"><i class="ti-pencil">
                                    
                                </i></a>
                            <td>
                                <a href="{{ route('home/admin/deleteRoom', ['roomID' => $cateRoom->roomID]) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"><i class="ti-trash">
                                    
                                </i></a>
                            </td>
                        </tr>
                    </tbody>

                            
                    
                @endforeach
            </table>

        </div>
    </div>
@endsection
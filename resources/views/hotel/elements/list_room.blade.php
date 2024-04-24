<div class="bg-room">

    <div class="room-list content-section">
        <h2>Danh sách các phòng</h2>
        {{--  =========== Standard ============  --}}
        <h3 class="room-title" id="Standard">Standard</h3>

        <div class="room owl-carousel owl-theme">
            @foreach ($allRoom as $key => $cateRoom)
                @if ($cateRoom->type == 'Standard')
                    <div class="room-items">
                        <div class="room-img">
                            <img src="{{ asset('hotel/assets/img/Room/' . $cateRoom->image) }}" alt=""
                                class="image-room">
                        </div>
                        <div class="room-body mt-5">
                            <p>Phòng: {{ $cateRoom->name }}</p>
                            <p>Giá: {{ number_format($cateRoom->price, 0, ',', '.') }} VNĐ/ngày</p>
                            <p>Trạng thái: {{ $cateRoom->status == 1 ? 'Đang trống' : 'Đã thuê' }}</p>

                            <button class="room-btn"><a href="{{ route('home/booking-room', ['roomID' => $cateRoom->roomID]) }}">Xem thêm</a></button>
                        </div>
                    </div>
                @endif
            @endforeach

            {{--  <div class="room-items">
                <div class="room-img">
                    <img src="{{ asset('hotel/assets/img/AboutUs/About2.jpeg') }}" alt="" class="image-room">
                </div>
                <div class="room-body mt-5">
                    <p>Diện tích: 20m2</p>
                    <p>Số người tối đa: 3</p>
                    <button class="room-btn"><a href="{{ route('home/booking-room') }}">Xem thêm</a></button>
                </div>
            </div>

            --}}
        </div>

        {{--  =========== Superior ============  --}}

        <h3 class="room-title" id="Superior">Superior</h3>

        <div class="room owl-carousel owl-theme">

            @foreach ($allRoom as $key => $cateRoom)
                @if ($cateRoom->type == 'Superior')
                    <div class="room-items">
                        <div class="room-img">
                            <img src="{{ asset('hotel/assets/img/Room/' . $cateRoom->image) }}" alt=""
                                class="image-room">
                        </div>
                        <div class="room-body mt-5">
                            <p>Phòng: {{ $cateRoom->name }}</p>
                            <p>Giá: {{ number_format($cateRoom->price, 0, ',', '.') }} VNĐ/ngày</p>
                            <p>Trạng thái: {{ $cateRoom->status == 1 ? 'Đang trống' : 'Đã thuê' }}</p>

                            <button class="room-btn"><a href="{{ route('home/booking-room', ['roomID' => $cateRoom->roomID]) }}">Xem thêm</a></button>
                        </div>
                    </div>
                @endif
            @endforeach



        </div>

        {{--  =========== Deluxe ============  --}}


        <h3 class="room-title" id="Deluxe">Deluxe</h3>

        <div class="room owl-carousel owl-theme">

            @foreach ($allRoom as $key => $cateRoom)
                @if ($cateRoom->type == 'Deluxe')
                     <div class="room-items">
                        <div class="room-img">
                            <img src="{{ asset('hotel/assets/img/Room/' . $cateRoom->image) }}" alt=""
                                class="image-room">
                        </div>
                        <div class="room-body mt-5">
                            <p>Phòng: {{ $cateRoom->name }}</p>
                            <p>Giá: {{ number_format($cateRoom->price, 0, ',', '.') }} VNĐ/ngày</p>
                            <p>Trạng thái: {{ $cateRoom->status == 1 ? 'Đang trống' : 'Đã thuê' }}</p>

                            <button class="room-btn"><a href="{{ route('home/booking-room', ['roomID' => $cateRoom->roomID]) }}">Xem thêm</a></button>
                        </div>
                    </div>
                @endif
            @endforeach


        </div>

        {{--  =========== Suite ============  --}}


        <h3 class="room-title" id="Suite">Suite</h3>

        <div class="room owl-carousel owl-theme">
            @foreach ($allRoom as $key => $cateRoom)
                @if ($cateRoom->type == 'Suite')
                     <div class="room-items">
                        <div class="room-img">
                            <img src="{{ asset('hotel/assets/img/Room/' . $cateRoom->image) }}" alt=""
                                class="image-room">
                        </div>
                        <div class="room-body mt-5">
                            <p>Phòng: {{ $cateRoom->name }}</p>
                            <p>Giá: {{ number_format($cateRoom->price, 0, ',', '.') }} VNĐ/ngày</p>
                            <p>Trạng thái: {{ $cateRoom->status == 1 ? 'Đang trống' : 'Đã thuê' }}</p>
                            <button class="room-btn"><a href="{{ route('home/booking-room', ['roomID' => $cateRoom->roomID]) }}">Xem thêm</a></button>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>


</div>

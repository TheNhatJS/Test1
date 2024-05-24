@extends('hotel.admin.index')

@section('ad_content')
    <div id="add-room">
        <h1 class="add-room-title">Thêm phòng</h1>
        <div id="error-message" class="text-alert" style="color: red; font-weight: 700">
            @php
                $message = Session::get('error');
                if($message) {
                    echo $message;
                    Session::put('error', null);
                }
            @endphp
        </div>
        <form action="{{ route('home/admin/postAddRoom') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div id="rooms" style="max-width: 800px; padding: 1rem;">
                <!-- Form fields will be added here dynamically -->
            </div>
            <div class="flex-btn">
                <div class="input-group">
                    <label for="roomCount">Số lượng phòng:</label>
                    <input type="number" id="roomCount" name="roomCount" min="1" required>
                    <button type="button" onclick="addRooms()" style="padding: 0.5rem 2rem; border-radius: 1rem; background-color: darkslateblue; color: #fff; width: 150px; position: relative; left: 50%; transform: translateX(-50%);">Tạo phòng</button>
                </div>
                <div>
                    <button type="submit" name="btnThem">Thêm</button>
                    <button type="reset">Reset</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function addRooms() {
            const roomCountInput = document.getElementById('roomCount');
            let roomCount = parseInt(roomCountInput.value);
            if (isNaN(roomCount) || roomCount <= 0) {
                alert("Vui lòng nhập số hợp lệ.");
                return;
            }

            const roomsContainer = document.getElementById('rooms');
            roomsContainer.innerHTML = ''; // Clear existing rooms
            for (let i = 1; i <= roomCount; i++) {
                const roomDiv = document.createElement('div');
                roomDiv.classList.add('room');
                roomDiv.innerHTML = `
                    <h3>Phòng ${i}</h3>
                    <label for="roomName">Tên phòng</label>
                    <input type="text" name="roomName[]" required>

                    <label for="countPeo">Số người tối đa</label>
                    <input type="number" name="countPeo[]" required>

                    <label for="roomPrice">Giá</label>
                    <input type="text" name="roomPrice[]" required>

                    <label for="roomStatus">Trạng thái</label>
                    <select name="roomStatus[]" required>
                        <option value="1" selected>Còn trống</option>
                        <option value="0">Hết phòng</option>
                    </select>

                    <label for="roomType">Loại phòng</label>
                    <select name="roomType[]" required>
                        <option value="Standard" selected>Standard</option>
                        <option value="Superior">Superior</option>
                        <option value="Deluxe">Deluxe</option>
                        <option value="Suite">Suite</option>
                    </select>

                    <label for="roomInfo">Thông tin giới thiệu</label>
                    <textarea name="roomInfo[]" cols="30" rows="10" style="width: 100%; resize: none;" required></textarea>

                    <label for="roomImage">Ảnh phòng</label>
                    <input type="file" name="roomImage[]" required>
                `;
                roomsContainer.appendChild(roomDiv);
            }
        }
    </script>
@endsection

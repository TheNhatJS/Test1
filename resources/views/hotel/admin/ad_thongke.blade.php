@extends('hotel.admin.index')

@section('ad_content')
    <div id="ad-room-list">
        <div style="width: 90%; background-color: #b5e1f4; padding: 5px; margin: 20px auto 10px auto; text-align: center; border-radius: 5px">
            <h1 class="ad-list-title">Thống kê</h1>
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
            {{--  <div>
                Tổng số phòng: 
                @php 
                    echo $countAllRoom;
                @endphp
                <br>
                Số phòng Standard: 
                @php 
                    echo $countStand;
                @endphp
                <br>
                Số phòng Superior: 
                @php 
                    echo $countSuper;
                @endphp
                <br>
                Số phòng Deluxe: 
                @php 
                    echo $countDelux;
                @endphp
                <br>
                Số phòng Suite: 
                @php 
                    echo $countSuite;
                @endphp
                <br>

            </div>  --}}
            <table border="1px">
                    <thead style="background-color: #b5e1f4;">
                        <th>Tổng số phòng</th>
                        <th>Số phòng Standard</th>
                        <th>Số phòng Superior</th>
                        <th>Số phòng Deluxe</th>
                        <th>Số phòng Suite</th>
                    </thead>

                    <tbody>
                        
                        <tr>
                           
                            <td>
                                
                                @php 
                                    echo $countAllRoom;
                                @endphp
                            </td>

                            <td>
                                
                                @php 
                                echo $countStand;
                                @endphp
                            </td>

                            <td>
                                
                                @php 
                                echo $countSuper;
                                @endphp
                            </td>

                            <td>
                                
                                @php 
                                echo $countDelux;
                                @endphp
                            </td>

                            <td>
                                
                                @php 
                                echo $countSuite;
                                @endphp
                            </td>
                            
                        </tr>
                    </tbody>
            </table>

        </div>
    </div>
@endsection
<?php
 
namespace App\Http\Controllers;
 
use App\Models\User;
// use GuzzleHttp\Psr7\Request;

use Illuminate\Http\Request;

use Illuminate\View\View;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    private $pathViewController = 'hotel.admin.';

    public function index() {
        $check = Session::get('userr');
        if(!$check) { 
            return Redirect::to('/home');
        }
        else{
            if($check->role == 'GUEST'){
                return Redirect::to('/home');
            }
        }

        $allRoom = DB::table('tbl_room')->get();
        return view($this->pathViewController . 'ad_list_room', ['allRoom' => $allRoom]);
    }

    public function listBookingRom() {   
        $check = Session::get('userr');
        if(!$check) { 
            return Redirect::to('/home');
        }
        else{
            if($check->role == 'GUEST'){
                return Redirect::to('/home');
            }
        }

        $allBooking = DB::table('tbl_booking')->get();

        return view($this->pathViewController . 'ad_list_booking_room', ['allBooking' => $allBooking]);
    }

    public function listUser() {   
        $check = Session::get('userr');
        if(!$check) { 
            return Redirect::to('/home');
        }
        else{
            if($check->role == 'GUEST'){
                return Redirect::to('/home');
            }
        }

        $allUser = DB::table('tbl_user')->where('role', 'GUEST')->get();

        return view($this->pathViewController . 'ad_list_user', ['allUser' => $allUser]);
    }

    public function listBill() {   
        $check = Session::get('userr');
        if(!$check) { 
            return Redirect::to('/home');
        }
        else{
            if($check->role == 'GUEST'){
                return Redirect::to('/home');
            }
        }

        $allBill = DB::table('tbl_bill')->get();
        return view($this->pathViewController . 'ad_list_bill', ['allBill' => $allBill]);
    }

    public function addRoom() {   
        $check = Session::get('userr');
        if(!$check) { 
            return Redirect::to('/home');
        }
        else{
            if($check->role == 'GUEST'){
                return Redirect::to('/home');
            }
        }

        return view($this->pathViewController . 'ad_add_room');
    }

    public function updateRoom(Request $request) {   
        $check = Session::get('userr');
        if(!$check) { 
            return Redirect::to('/home');
        }
        else{
            if($check->role == 'GUEST'){
                return Redirect::to('/home');
            }
        }

        $roomID = $request->input('roomID');

        $infoRoom = DB::table('tbl_room')->where('roomId', $roomID)->get();

        return view($this->pathViewController . 'ad_update_room', ['allInfoRoom' => $infoRoom]);

        
    }

    //=============== Đăng nhập ===============
    public function login() {
        return view($this->pathViewController . 'login');
    }

    public function postlogin(Request $request) {
        $post_email = $request->email;
        $post_password = md5($request->password);

        $result = DB::table('tbl_user')->where('email', $post_email)->where('password', $post_password)->first();

        if ($result) {
            // Người dùng tồn tại, chuyển hướng đến trang admin

            Session::put('userr', $result);

            return Redirect::to('/home');
        } else {
            // Người dùng không tồn tại, hiển thị thông báo lỗi
            Session::put('error', 'Email hoặc mật khẩu không đúng');
            return redirect()->back();
        }
    }
    //===============Đăng xuất=================
    public function getLogout() {
        Session::put('userr', null);
        return Redirect::to('/home');
    }

    //===============Đăng ký===============
    public function register() {
        return view($this->pathViewController . 'register');
    }


    public function postRegister(Request $request) {
        // Kiểm tra và xác thực dữ liệu đầu vào từ form
        $validatedData = $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string|max:10',
            'email' => 'required|email',
            'password' => 'required|string|min:6',
            'REpassword' => 'required|same:password',
        ], [
            'REpassword.same' => Session::put('error', 'Mật khẩu không khớp!')
        ]);

        $existingUser = DB::table('tbl_user')->where('email', $validatedData['email'])->first();
        if ($existingUser) {
            Session::put('error', 'Email đã tồn tại!');
            return redirect()->to('/home/register');
        }

        // Tạo một mảng chứa dữ liệu để chèn vào cơ sở dữ liệu
        $data = [
            'name' => $validatedData['name'],
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'],
            'password' => md5($validatedData['password']),
        ];

        // Chèn dữ liệu vào cơ sở dữ liệu
        DB::table('tbl_user')->insert($data);

        Session::put('error', 'Đăng ký tài khoản thành công!');
        return redirect()->to('/home/login');
    }

    //=============== DELETE USER ===============
    public function deleteUser(Request $request){
        $userID = $request->input('userID');

        DB::table('tbl_user')->where('userID', $userID)->delete();

        Session::put('error', 'Xóa tài khoản thành công!');

        return redirect()->back();
    }

    // ============== ADD ROOM ==============
    public function postAddRoom(Request $request) {

        // Kiểm tra xem phòng đã tồn tại hay chưa
        $existingRoom = DB::table('tbl_room')->where('name', $request->roomName)->first();

        // Nếu đã tồn tại phòng có tên giống
        if ($existingRoom) {
            Session::put('error', 'Phòng đã tồn tại');
            return redirect()->back();
        }

        $data = array();
        $data['name'] = $request->roomName;
        $data['type'] = $request->roomType;
        $data['price'] = $request->roomPrice;
        $data['countPeople'] = $request->countPeo;
        $data['status'] = $request->roomStatus;
        $data['info'] = $request->roomInfo;
        $data['image'] = $request->roomImage;

        DB::table('tbl_room')->insert($data);

        Session::put('error', 'Tạo phòng thành công');
            
        return redirect()->back();
    }

    // ============== UPDATE ROOM ==============
    public function postUpdateRoom(Request $request) {
        $roomID = $request->input('roomID');
        $data = array();
        $data['name'] = $request->roomName;
        $data['type'] = $request->roomType;
        $data['price'] = $request->roomPrice;
        $data['countPeople'] = $request->countPeo;
        $data['status'] = $request->roomStatus;
        $data['info'] = $request->roomInfo;
        $data['image'] = $request->roomImage;

        DB::table('tbl_room')->where('roomID', $roomID)->update($data);

        Session::put('error', 'Upadate phòng thành công');
            
        return redirect()->to('home/admin');
    }

    // ============== DELETE ROOM ==============
    public function deleteRoom(Request $request) {
        $roomID = $request->input('roomID');
        

        DB::table('tbl_room')->where('roomID', $roomID)->delete();

        Session::put('error', 'Xóa phòng thành công');
            
        return redirect()->back();
    }

    // ============== AD - Booking ROOM ==============
    public function postBookingRoom(Request $request) {
        
        $data = array();
        $data['userID'] = Session::get('userr')->userID;
        $data['roomID'] = $request->roomID;
        $data['checkInDate'] = $request->checkIn;
        $data['checkOutDate'] = $request->checkOut;
        $data['odCountPeople'] = $request->countPeople;
        $data['note'] = $request->note;

        if($data['checkInDate'] > $data['checkOutDate']) {
            Session::put('error', 'Có lỗi trong ngày đặt!!!');
            
            return redirect()->back();
        }

        DB::table('tbl_booking')->insert($data);
        Session::put('error', 'Đặt phòng thành công!!!');
            
        return redirect()->back();
    }

    // =========== UPDATE ROOM đã thuê ===============


    public function updateStatus0Room(Request $request) {
        $roomID = $request->input('roomID');

        DB::table('tbl_room')->where('roomID', $roomID)->update(['status' => 0]);

        Session::put('error','Xác nhận phòng đã được đặt');
            
        return redirect()->back();
    }


    // =========== CREATE BILL && UPDATE ROOM còn trống ===============
    public function updateStatus1Room(Request $request) {
        $bookingID = $request->input('bookingID');

        $booking = DB::table('tbl_booking')->where("bookingID", $bookingID)->first();

        $room = DB::table('tbl_room')->where('roomID', $booking->roomID)->first();

        $existingBill = DB::table('tbl_bill')->where('bookingID', $booking->bookingID)->first();
        if($existingBill) {
            Session::put('error','Hóa đơn đã tồn tại');

            return redirect()->back();
        }

        $data = array();
        $data['bookingID'] = $bookingID;
        $data['userID'] = $booking->userID;        
        $data['pay'] = $room->price;

        DB::table('tbl_bill')->insert($data);


        DB::table('tbl_room')->where('roomID', $booking->roomID)->update(['status' => 1]);

        // DB::table('tbl_booking')->where('roomID', $roomID)->delete();

        Session::put('error','Đã xuất hóa đơn, xác nhận phòng đã trống');

        return redirect()->back();
    }


    // =========== DELETE BILL ===============

    public function deleteBill(Request $request) {
        $bookingID = $request->input('bookingID');

        DB::table('tbl_bill')->where('bookingID', $bookingID)->delete();
        DB::table('tbl_booking')->where('bookingID', $bookingID)->delete();

        Session::put('error','Xóa hóa đơn thành công');

        return redirect()->back();
    }
}


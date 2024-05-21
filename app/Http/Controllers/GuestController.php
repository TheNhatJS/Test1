<?php
 
namespace App\Http\Controllers;
 
use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\View\View;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Session;



class GuestController extends Controller
{
    private $pathViewController = 'hotel.guest.';

    public function index() {   
        $check = Session::get('userr');
        if(!$check) { 
            return Redirect::to('/home');
        }
        
        return view($this->pathViewController . 'gu_info');
    }

    public function listBookingRom() {       
        $check = Session::get('userr');
        if(!$check) { 
            return Redirect::to('/home');
        }

        $allBooking = DB::table('tbl_booking')->where('userID', $check->userID)->get();
        return view($this->pathViewController . 'gu_list_booking_room', ['allBooking' => $allBooking]);
    }

    public function updateBookingRom(Request $request) {       
        $check = Session::get('userr');
        if(!$check) { 
            return Redirect::to('/home');
        }

        $bookingID = $request->input('bookingID');

        $allBooking =  DB::table('tbl_booking')->where('bookingID', $bookingID)->get();

        return view($this->pathViewController . 'gu_update_booking', ['allBooking' => $allBooking]);
    }

    public function postUpdateBooking(Request $request) {
        
        $bookingID = $request->input('bookingID');
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

        DB::table('tbl_booking')->where('bookingID', $bookingID)->update($data);
        Session::put('error', 'Cập nhật thông tin phòng thành công!!!');
            
        return redirect()->to('home/guest/list-booking-room');
    }

    public function postUpdateUser(Request $request) {        
        $userID = $request->input('userID');
        $password = Session::get('userr')->password;
        $oldPassword = md5($request->oldPassword);
        
        // Kiểm tra xem người dùng đã nhập mật khẩu mới hay chưa
        if($request->newPassword != ""){
            $newPassword = md5($request->newPassword);
            $reNewPassword = md5($request->reNewPassword);

            if($newPassword != $reNewPassword){
                Session::put('error', 'Nhập mật khẩu không khớp!');
                return redirect()->back();
            }
        }

        if($request->reNewPassword != ""){
            $newPassword = md5($request->newPassword);
            $reNewPassword = md5($request->reNewPassword);

            if($newPassword != $reNewPassword){
                Session::put('error', 'Nhập mật khẩu không khớp!');
                return redirect()->back();
            }
        }

        if($request->newPassword != "" && $request->reNewPassword != "") {
            $newPassword = md5($request->newPassword);
            $reNewPassword = md5($request->reNewPassword);
            
            // Kiểm tra tính hợp lệ của mật khẩu mới và mật khẩu nhập lại
            if($newPassword != $reNewPassword){
                Session::put('error', 'Nhập mật khẩu không khớp!');
                return redirect()->back();
            }
        } else {
            // Nếu không có mật khẩu mới, sử dụng mật khẩu cũ
            $newPassword = $password;
        }
        // Kiểm tra tính hợp lệ của mật khẩu cũ
        if($oldPassword != $password){
            Session::put('error', 'Nhập mật khẩu cũ không chính xác!');
            return redirect()->back();
        }  
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['password'] = $newPassword;

        $existingUser = DB::table('tbl_user')->where('email', $request->email)->first();
        if ($existingUser) {
            Session::put('error', 'Email đã tồn tại!');
            return redirect()->to('/guest');
        }
    
        DB::table('tbl_user')->where('userID', $userID)->update($data);
    
        Session::put('error', 'Cập nhật thông tin tài khoản thành công!');
    
        return redirect()->back();
    }
    

    public function deleteBookingRom(Request $request) {       
        $check = Session::get('userr');
        if(!$check) { 
            return Redirect::to('/home');
        }

        $bookingID = $request->input('bookingID');

        DB::table('tbl_booking')->where('bookingID', $bookingID)->delete();

        Session::put('error', 'Hủy đặt phòng thành công');

        return redirect()->back();
    }
}
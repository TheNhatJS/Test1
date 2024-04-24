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
        
        if($request->newPassword == "" && $request->reNewPassword == "")
        {
            $userID = $request->input('userID');
            $password = Session::get('userr')->password;
            $oldPassword = md5($request->oldPassword);
            $newPassword = md5($request->oldPassword);
            $reNewPassword = md5($request->oldPassword);

            
        }else{
            $userID = $request->input('userID');
            $password = Session::get('userr')->password;
            $oldPassword = md5($request->oldPassword);
            $newPassword = md5($request->newPassword);
            $reNewPassword = md5($request->reNewPassword);
        }

        if($oldPassword != $password){
            Session::put('error', 'Nhập mật khẩu cũ không chính xác!');

            return redirect()->back();
        }

        elseif($newPassword != $reNewPassword){
            Session::put('error', 'Nhập mật khẩu không chính khớp!');

            return redirect()->back();
        }


        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['password'] = md5($request->newPassword);

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
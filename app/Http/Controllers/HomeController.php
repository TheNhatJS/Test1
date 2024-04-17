<?php
 
namespace App\Http\Controllers;
 
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Session;
 
class HomeController extends Controller
{
    private $pathViewController = 'hotel.home.';

    public function index() {
        $allRoom = DB::table('tbl_room')->get();
        return view($this->pathViewController . 'index', ['allRoom' => $allRoom]);
        // return view($this->pathViewController . 'index');
    }

    public function bookingRoom() {
        $check = Session::get('userr');
        if(!$check) { 
            Session::put('error', 'Vui lòng đăng nhập');
            return Redirect::to(route('home/loginn'));
        }
        
        return view($this->pathViewController . 'booking_room');
    }
}
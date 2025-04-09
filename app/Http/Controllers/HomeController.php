<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Cinema;
use App\Http\Controllers\TicketController;

class HomeController extends Controller
{
    protected $provinces = ["TP.HCM","Hà Nội","Đà Nẵng","Cần Thơ","Đồng Nai","Hải Phòng","Quảng Ninh","Bà Rịa-Vũng Tàu","Bình Định","Bình Dương","Huế", "Cà Mau","Đắk Lắk","Bắc Giang","Yên Bái","Vĩnh Long","Kiên Giang","Hậu Giang","Hà Tĩnh","Phú Yên","Đồng Tháp","Bạc Liêu","Hưng Yên","Khánh Hòa","Hải Phòng","Lạng Sơn","Nghệ An","Phú Thọ","Quảng Ngãi","Sóc Trăng","Sơn La","Tây Ninh","Thái Nguyên","Tiền Giang"];

    public function home_cinemas() {
        $title = 'Rạp chiếu';
        $template = 'homes.home-cinemas';
        return view('layout.parent', ['title' => $title, 'provinces' => $this->provinces, 'template' => $template]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Home';
        $template = 'home';
        $movies = Movie::orderBy('id', 'desc')->get();
        return view('layout.parent', compact('title', 'movies', 'template'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cinema;

class CinemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
    **/
    protected $provinces = ["TP.HCM","Hà Nội","Đà Nẵng","Cần Thơ","Đồng Nai","Hải Phòng","Quảng Ninh","Bà Rịa-Vũng Tàu","Bình Định","Bình Dương","Huế", "Cà Mau","Đắk Lắk","Bắc Giang","Yên Bái","Vĩnh Long","Kiên Giang","Hậu Giang","Hà Tĩnh","Phú Yên","Đồng Tháp","Bạc Liêu","Hưng Yên","Khánh Hòa","Hải Phòng","Lạng Sơn","Nghệ An","Phú Thọ","Quảng Ngãi","Sóc Trăng","Sơn La","Tây Ninh","Thái Nguyên","Tiền Giang"];

    public function index()
    {
        // $cinemas = Cinema::all();
        $template = 'cinemas.index';
        $cinemas = Cinema::orderBy('id', 'desc')->paginate(5);
        $provinces = Cinema::distinct()->pluck('location');
        return view('layout.parent_dashboard', compact('template', 'cinemas', 'provinces'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $template = 'cinemas.add';
        return view('layout.parent_dashboard', ['template' => $template, 'provinces' => $this->provinces]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name' => 'required|max:100',
            'location' => 'required',
            'total_halls' => 'required'
        ]);

        $cinema = Cinema::create($validated);
        return redirect()->route('cinemas.index')->with('success', 'Thêm rạp thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $template = 'cinemas.edit';
        $cinema = Cinema::find($id);
        return view('layout.parent_dashboard', ['template' => $template, 'cinema' => $cinema, 'provinces' => $this->provinces]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validated = $request->validate([
            'name' => 'required|max:100',
            'location' => 'required',
            'total_halls' => 'required'
        ]);

        $cinema = Cinema::find($id);
        $cinema->update($validated);

        return redirect()->route('cinemas.index')->with('success', 'Sửa rạp thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $cinema = Cinema::find($id);
        $cinema->delete();
        return redirect()->route('cinemas.index')->with('success', 'Xóa rạp thành công');
    }
}

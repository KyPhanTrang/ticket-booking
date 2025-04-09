<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Showtime;
use App\Models\Cinema;
use App\Models\Hall;
use App\Models\Movie;

class ShowtimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $template = 'showtimes.index';
        $showtimes = Showtime::orderBy('id', 'desc')->paginate(5);
        return view('layout.parent_dashboard', compact('template', 'showtimes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $template = 'showtimes.add';
        $movies = Movie::all();
        $cinemas = Cinema::all();
        $halls = Hall::where('cinema_id', $cinemas[0]->id)->get();
        return view('layout.parent_dashboard', compact('template', 'movies', 'cinemas', 'halls'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'movie_id' => 'required',
            'hall_id' => 'required',
            'show_time' => 'required',
            'price' => 'required'
        ]);

        $showtime = Showtime::create($validated);
        return redirect()->route('showtimes.index')->with('success', 'Thêm suất chiếu thành công !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $template = 'showtimes.edit';
        $showtime = Showtime::findOrFail($id);
        $cinemas = Cinema::all();
        $halls = Hall::where('cinema_id', $showtime->hall->cinema_id)->get();
        $movies = Movie::all();
        return view('layout.parent_dashboard', compact('template', 'showtime', 'cinemas', 'halls', 'movies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validated = $request->validate([
            'cinema_id' => 'required|exists:cinemas,id',
            'hall_id' => 'required|exists:halls,id',
            'show_time' => 'required|date',
            'price' => 'required|numeric|min:0',
        ]);

        $showtime = Showtime::findOrFail($id);
        $showtime->update($validated);

        return redirect()->route('showtimes.index')->with('success', 'Cập nhật suất chiếu thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $showtime = Showtime::findOrFail($id);
        $showtime->delete();
        return redirect()->route('showtimes.index')->with('success', 'Xóa suất chiếu thành công!');
    }
}

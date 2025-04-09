<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Showtime;
use App\Models\Ticket;
use App\Models\Seat;
use App\Models\Hall;
use App\Models\Cinema;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $template = 'tickets.index';
        $tickets = Ticket::orderBy('id', 'desc')->paginate(5);
        return view('layout.parent_dashboard', compact('template', 'tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($movie_id)
    {
        $template = 'tickets.add';
        $movie = Movie::findOrFail($movie_id); // Lấy thông tin phim
        $showtimes = ShowTime::with('hall.cinema')->where('movie_id', $movie_id)->get(); // Lấy danh sách suất chiếu=   
        return view('layout.parent', compact('template', 'movie', 'showtimes'));
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {
        // dd($request->all()); // In ra tất cả dữ liệu từ form
        $validated = $request->validate([
            'showtime_id' => 'required|exists:showtimes,id',
            'seat_id' => 'required|exists:seats,id',
            'customer_name' => 'required|string',
            'customer_email' => 'required|email',
            'customer_phone' => 'required|string',
            'booking_date' => 'required|date',
        ]);

        $ticket = new Ticket($validated);
        $ticket->status = 'booked';
        $ticket->save();
        return redirect()->route('homes.index')->with('success', 'Bạn đã đặt vé thành công !');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $template = 'tickets.detail';
        $ticket = Ticket::find($id);
        $seat = Seat::find($ticket->seat_id);
        $hall = Hall::find($seat->hall_id);
        $cinema = Cinema::find($hall->cinema_id);
        $movie_id = Showtime::where('id', $ticket->showtime_id)->value('movie_id');
        $movie_title = Movie::where('id', $movie_id)->value('title');
        return view('layout.parent_dashboard', compact('template', 'ticket', 'seat', 'hall', 'cinema', 'movie_title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $template = 'tickets.edit';
        $ticket = Ticket::find($id);
        $seat = Seat::find($ticket->seat_id);
        $seatsInRoom =  Seat::where('hall_id', $seat->hall_id)->get();
        $statuses = ['booked', 'paid', 'cancelled'];
        return view('layout.parent_dashboard', compact('template', 'ticket', 'seatsInRoom', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validated = $request->validate([
            'seat_id' => 'required',
            'customer_name' => 'required|max:50',
            'customer_email' => 'required|max:50',
            'customer_phone' => 'required|max:50',
            'status' => 'required'
        ]);

        $ticket = Ticket::find($id);
        $ticket->update($validated);
        return redirect()->route('tickets.index')->with('success', 'Cập nhật vé thành công !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $ticket = Ticket::find($id);
        $ticket->delete();
        return redirect()->route('tickets.index')->with('success', 'Xóa vé thành công !');
    }
}

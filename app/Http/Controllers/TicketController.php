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
        $request->validate([
            'showtime_id' => 'required|exists:showtimes,id',
            'selected_seats' => 'required|string',
            'customer_name' => 'required|string',
            'customer_email' => 'required|email',
            'customer_phone' => 'required|digits_between:10,11',
            'booking_date' => 'required|date'
        ], [
            'customer_phone.required' => 'Chỉ được nhập số vào trường số điện thoại !',
            'customer_phone.digits_between' => 'Số điện thoại phải có từ 10 đến 11 chữ số!'
        ]);

        $showtime_id = $request->showtime_id;
        $customer_name = $request->customer_name;
        $customer_email = $request->customer_email;
        $customer_phone = $request->customer_phone;
        $booking_date = $request->booking_date;

        $selected_seats = explode(',', $request->selected_seats);

        foreach ($selected_seats as $seatId) {
            Ticket::create([
                'showtime_id' => $showtime_id,
                'seat_id' => $seatId,
                'customer_name' => $customer_name,
                'customer_email' => $customer_email,
                'customer_phone' => $customer_phone,
                'booking_date' => $booking_date
            ]);
        }

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
            'customer_phone' => 'required|numeric|min:10|max:11',
            'status' => 'required'
        ], [
            'customer_phone.required' => 'Chỉ được nhập số vào trường số điện thoại !',
            'customer_phone.numeric' => 'Phải nhập số!',
            'customer_phone.min' => 'Tối thiểu 10 số!',
            'customer_phone.max' => 'Tối đa 11 số!',
            'customer_name.required' => 'Không được để trống tên',
            'customer_name.max' => 'Không được quá 50 ký tự',
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

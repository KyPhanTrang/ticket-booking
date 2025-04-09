<div class="container border border-dark-subtle mt-3 rounded-4 my-5">
    <div class="row my-5">
        <h2 class="text-dark-emphasis text-center">Detail ticket</h2>
    </div>
    <div class="row container">
        <table class="table col-8">
            <thead>
                <tr>
                    <th scope="col">Movie name</th>
                    <th scope="col">Cinema name</th>
                    <th scope="col">Hall name</th>
                    <th scope="col">Seat Number</th>
                    <th scope="col">Customer name</th>
                    <th scope="col">Customer email</th>
                    <th scope="col">Customer phone</th>
                    <th scope="col">Booking date</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $movie_title }}</td>
                    <td>{{ $cinema->name }}</td>
                    <td>{{ $hall->hall_name }}</td>
                    <td>{{ $seat->seat_number }}</td>
                    <td>{{ $ticket->customer_name }}</td>
                    <td>{{ $ticket->customer_email }}</td>
                    <td>{{ $ticket->customer_phone }}</td>
                    <td>{{ $ticket->booking_date }}</td>
                    <td>{{ $ticket->status }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <a class="btn btn-outline-danger my-5" href="{{ route('tickets.index') }}">Quay lại</a>
</div>

<div class="container border border-dark-subtle mt-3 rounded-4">
    <h2 class="text-center text-dark-emphasis h2 my-5">EDIT TICKET</h2>
    @include('dashboard.component.noti-error')
    <form action="{{ route('tickets.update', $ticket) }}" method="POST" class="container">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="seat_number" class="form-label">Seat number</label>
            <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="seat_id">
                @foreach ($seatsInRoom as $seatInRoom)
                    @if ($seatInRoom->id == $ticket->seat_id)
                        <option selected value="{{ $seatInRoom->id }}">{{ $seatInRoom->seat_number }}</option>
                    @else
                        <option value="{{ $seatInRoom->id }}">{{ $seatInRoom->seat_number }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="customer_name" class="form-label">Customer name</label>
            <input type="text" name="customer_name" class="form-control w-50" placeholder="Nhập tên"
                value="{{ $ticket->customer_name }}">
        </div>
        <div class="mb-3">
            <label for="customer_email" class="form-label">Customer email</label>
            <input type="text" name="customer_email" class="form-control w-50" placeholder="Nhập email"
                value="{{ $ticket->customer_email }}">
        </div>
        <div class="mb-3">
            <label for="customer_phone" class="form-label">Customer phone</label>
            <input type="text" name="customer_phone" class="form-control w-50" placeholder="Nhập số điện thoại"
                value="{{ $ticket->customer_phone }}">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="status">
                @foreach ($statuses as $status)
                    @if ($status == $ticket->status)
                        <option selected value="{{ $status }}">{{ $status }}</option>
                    @else
                        <option value="{{ $status }}">{{ $status }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="my-5">
            <button type="submit" class="btn btn-outline-success col-1">Sửa</button>
            <a class="btn btn-outline-danger col-1 mx-2" href="{{ route('tickets.index') }}">Quay lại</a>
        </div>
    </form>
</div>

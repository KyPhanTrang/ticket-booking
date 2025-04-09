<h2>Quản lý Vé</h2>
<p>Đây là trang quản lý vé.</p>
<table class="table table-striped table-borderless my-5">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Customer name</th>
            <th scope="col">Customer email</th>
            <th scope="col">Customer phone</th>
            <th scope="col">Booking date</th>
            <th scope="col">Status</th>
            <th scope="col" colspan="3" class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @php $i = 0 @endphp
        @foreach ($tickets as $ticket)
            @php $i++; @endphp
            <tr>
                <th scope="row">{{ $i }}</th>
                <td>{{ $ticket->customer_name }}</td>
                <td>{{ $ticket->customer_email }}</td>
                <td>{{ $ticket->customer_phone }}</td>
                <td>{{ $ticket->booking_date }}</td>
                <td>{{ $ticket->status }}</td>
                <td>
                    <a href="{{ route('tickets.show', $ticket->id) }}" class="btn btn-outline-primary"><i
                            class="bi bi-eye-fill"></i></a>
                </td>
                <td>
                    <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-outline-secondary"><i
                            class="bi bi-pen-fill"></i></a>
                </td>
                <td>
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                        data-bs-target="#exampleModal{{ $ticket->id }}">
                        <i class="bi bi-trash3"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{ $ticket->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 text-black-50" id="exampleModalLabel">Xóa Phim</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-black-50">
                                    Bạn có chắc chắn muốn xóa phim {{ $ticket->title }} hay không?
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                    </form>
                                    <button type="button" class="btn btn-success"
                                        data-bs-dismiss="modal">Không</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $tickets->onEachSide(1)->links() }}
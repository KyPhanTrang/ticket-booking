<h2>Quản lý Suất chiếu</h2>
<p>Đây là trang quản lý Suất chiếu.</p>
<a href="{{ route('showtimes.create') }}" class="btn btn-outline-dark mb-3">
    <i class="bi bi-plus-circle"></i>
    Add Showtime
</a>
<table class="table table-striped table-borderless">
    <thead>
        <tr>
            <th scope="col">Number</th>
            <th scope="col">Movie name</th>
            <th scope="col">Cinema name</th>
            <th scope="col">Hall name</th>
            <th scope="col">Showtime</th>
            <th scope="col">Price</th>
            <th scope="col" colspan="3" class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @php $i = 0 @endphp
        @foreach ($showtimes as $showtime)
            @php $i++; @endphp
            <tr>
                <th scope="row">{{ $i }}</th>
                <td>{{ $showtime->movie->title }}</td>
                <td>{{ $showtime->hall->cinema->name }}</td>
                <td>{{ $showtime->hall->hall_name }}</td>
                <td>{{ $showtime->show_time }}</td>
                <td>{{ round($showtime->price) }}</td>
                <td>
                    <a href="{{ route('showtimes.edit', $showtime->id) }}" class="btn btn-outline-secondary"><i
                            class="bi bi-pen-fill"></i></a>
                </td>
                <td>
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                        data-bs-target="#exampleModal{{ $showtime->id }}">
                        <i class="bi bi-trash3"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{ $showtime->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 text-black-50" id="exampleModalLabel">Xóa Phim</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-black-50">
                                    Bạn có chắc chắn muốn xóa phim {{ $showtime->title }} hay không?
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('showtimes.destroy', $showtime->id) }}" method="POST">
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
{{ $showtimes->onEachSide(1)->links() }}

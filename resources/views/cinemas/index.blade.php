<h2>Quản lý Rạp chiếu</h2>
<p>Đây là trang quản lý rạp chiếu.</p>
<a href="{{ route('cinemas.create') }}" class="btn btn-outline-dark mb-3"><i class="bi bi-plus-circle"></i> Add Cinema</a>
<table class="table table-striped table-borderless">
    <thead>
        <tr>
            <th scope="col">Number</th>
            <th scope="col">Name</th>
            <th scope="col">Location</th>
            <th scope="col">Total Halls</th>
            <th scope="col" colspan="3" class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @php $i = 0 @endphp
        @foreach ($cinemas as $cinema)
            @php $i++; @endphp
            <tr>
                <th scope="row">{{ $i }}</th>
                <td>{{ $cinema->name }}</td>
                <td>{{ $cinema->location }}</td>
                <td>{{ $cinema->total_halls }}</td>
                <td>
                    <a href="{{ route('cinemas.edit', $cinema->id) }}" class="btn btn-outline-secondary"><i
                            class="bi bi-pen-fill"></i></a>
                </td>
                <td>
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                        data-bs-target="#exampleModal{{ $cinema->id }}">
                        <i class="bi bi-trash3"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{ $cinema->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 text-black-50" id="exampleModalLabel">Xóa Rạp</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-black-50">
                                    Bạn có chắc chắn muốn xóa rạp {{ $cinema->name }} hay không?
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('cinemas.destroy', $cinema->id) }}" method="POST">
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
{{ $cinemas->onEachSide(1)->links() }}
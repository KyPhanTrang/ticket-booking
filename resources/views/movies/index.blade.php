<h2>Quản lý Phim</h2>
<p>Đây là trang quản lý phim.</p>
<a href="{{ route('movies.create') }}" class="btn btn-outline-dark mb-3"><i class="bi bi-plus-circle"></i> Add Movie</a>
<table class="table table-striped table-borderless">
    <thead>
        <tr>
            <th scope="col">Number</th>
            <th scope="col">Name</th>
            <th scope="col">Genre</th>
            <th scope="col" colspan="3" class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @php $i = 0 @endphp
        @foreach ($movies as $movie)
            @php $i++; @endphp
            <tr>
                <th scope="row">{{ $i }}</th>
                <td>{{ $movie->title }}</td>
                <td>{{ $movie->genre }}</td>
                <td>
                    <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-outline-primary"><i
                            class="bi bi-eye-fill"></i></a>
                </td>
                <td>
                    <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-outline-secondary"><i
                            class="bi bi-pen-fill"></i></a>
                </td>
                <td>
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                        data-bs-target="#exampleModal{{ $movie->id }}">
                        <i class="bi bi-trash3"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{ $movie->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 text-black-50" id="exampleModalLabel">Xóa Phim</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-black-50">
                                    Bạn có chắc chắn muốn xóa phim {{ $movie->title }} hay không?
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('movies.destroy', $movie->id) }}" method="POST">
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
{{ $movies->onEachSide(1)->links() }}
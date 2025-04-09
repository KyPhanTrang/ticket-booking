<div class="container border border-dark-subtle mt-3 rounded-4">
    <h2 class="text-center text-dark-emphasis h2 my-5">EDIT SHOWTIME</h2>
    @include('dashboard.component.noti-error')
    <form action="{{ route('showtimes.update', $showtime->id) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- Chọn rạp -->
        <div class="mb-3">
            <label for="movie_id" class="form-label">Chọn phim</label>
            <select class="form-select" id="movie_id" name="movie_id">
                @foreach ($movies as $movie)
                    <option value="{{ $movie->id }}" {{ $movie->id == $showtime->movie_id ? 'selected' : '' }}>
                        {{ $movie->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <!-- Chọn rạp -->
        <div class="mb-3">
            <label for="cinema_id" class="form-label">Rạp chiếu</label>
            <select class="form-select" id="cinema_id" name="cinema_id">
                @foreach ($cinemas as $cinema)
                    <option value="{{ $cinema->id }}"
                        {{ $showtime->hall->cinema_id == $cinema->id ? 'selected' : '' }}>
                        {{ $cinema->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Chọn phòng -->
        <div class="mb-3">
            <label for="hall_id" class="form-label">Phòng chiếu</label>
            <select class="form-select" id="hall_id" name="hall_id">
                @foreach ($halls as $hall)
                    <option value="{{ $hall->id }}" {{ $showtime->hall_id == $hall->id ? 'selected' : '' }}>
                        {{ $hall->hall_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Thời gian chiếu -->
        <div class="mb-3">
            <label for="show_time" class="form-label">Thời gian chiếu</label>
            <input type="datetime-local" class="form-control" id="show_time" name="show_time"
                value="{{ $showtime->show_time }}">
        </div>

        <!-- Giá vé -->
        <div class="mb-3">
            <label for="price" class="form-label">Giá vé</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $showtime->price }}">
        </div>

        <!-- Nút submit -->
        <div class="my-5">
            <button type="submit" class="btn btn-outline-success col-1">Sửa</button>
            <a class="btn btn-outline-danger col-1 mx-2" href="{{ route('showtimes.index') }}">Quay lại</a>
        </div>
    </form>
</div>

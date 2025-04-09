<div class="container border border-dark-subtle mt-3 rounded-4">
    <h2 class="text-center text-dark-emphasis h2 my-5">EDIT MOVIES</h2>
    @include('dashboard.component.noti-error')
    <form action="{{ route('movies.update', $movie) }}" method="POST" class="container">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control w-50" placeholder="Nhập tên phim"
                value="{{ $movie->title }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3" placeholder="Nhập nội dung mô tả ở đây...">{{ old('description', trim($movie->description)) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="duration" class="form-label">Duration</label>
            <input type="number" name="duration" class="form-control w-25" min="1" placeholder="Nhập số phút"
                value="{{ $movie->duration }}">
        </div>
        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="genre">
                @foreach ($genres as $genre)
                    @if ($genre == $movie->genre)
                        <option selected value="{{ $genre }}">{{ $genre }}</option>
                    @else
                        <option value="{{ $genre }}">{{ $genre }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="release_date" class="form-label">Release Date</label>
            <input type="date" name="release_date" class="form-control w-25" value="{{ $movie->release_date }}">
        </div>
        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <input type="number" name="rating" class="form-control w-25" min="0" max="10" step="0.1"
                placeholder="Nhập điểm" value="{{ $movie->rating }}">
        </div>
        <div class="mb-3">
            <label for="post_url" class="form-label">Post Url</label>
            <input type="text" name="post_url" class="form-control w-50" placeholder="Nhập post URL"
                value="{{ $movie->post_url }}">
        </div>
        <div class="my-5">
            <button type="submit" class="btn btn-outline-success col-1">Sửa</button>
            <a class="btn btn-outline-danger col-1 mx-2" href="{{ route('movies.index') }}">Quay lại</a>
        </div>
    </form>
</div>

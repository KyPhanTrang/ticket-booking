<div class="container">
    <div class="row text-center">
        <h2 class="text-dark-emphasis h2">Add Movie</h2>
    </div>
</div>
<div class="container">
    @include('dashboard.component.noti-error')
</div>
<form action="{{ route('movies.store') }}" method="POST" class="container mt-3 border border-dark-subtle rounded-3">
    @csrf
    <div class="mb-3 my-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" class="form-control w-50" placeholder="Nhập tên phim">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control" rows="3" placeholder="Nhập nội dung mô tả ở đây..."></textarea>
    </div>
    <div class="mb-3">
        <label for="duration" class="form-label">Duration</label>
        <input type="number" name="duration" class="form-control w-25" min="1" placeholder="Nhập số phút">
    </div>
    <div class="mb-3">
        <label for="genre" class="form-label">Genre</label>
        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="genre">
            @foreach ($genres as $genre)
                <option value="{{ $genre }}">{{ $genre }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="release_date" class="form-label">Release Date</label>
        <input type="date" name="release_date" class="form-control w-25" value="{{ now()->toDateString() }}">
    </div>
    <div class="mb-3">
        <label for="rating" class="form-label">Rating</label>
        <input type="number" name="rating" class="form-control w-25" min="0" max="10" step="0.1"
            placeholder="Nhập điểm">
    </div>
    <div class="mb-3">
        <label for="post_url" class="form-label">Post Url</label>
        <input type="text" name="post_url" class="form-control w-50" placeholder="Nhập post URL">
    </div>
    <div class="my-5">
        <button type="submit" class="btn btn-outline-success col-1">Thêm</button>
        <a class="btn btn-outline-danger col-1 mx-2" href="{{ route('movies.index') }}">Quay lại</a>
    </div>
</form>

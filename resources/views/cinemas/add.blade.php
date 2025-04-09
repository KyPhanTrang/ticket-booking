<div class="container">
    <div class="row text-center">
        <h2 class="text-dark-emphasis h2">Add Cinema</h2>
    </div>
</div>
<div class="container">
    @include('dashboard.component.noti-error')
</div>
<div class="col">
    <div class="col-md-8 mx-auto">
        <form action="{{ route('cinemas.store') }}" method="POST"
            class="container mt-3 border border-dark-subtle rounded-2">
            @csrf
            <div class="mb-3 my-4">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control w-75" placeholder="Nhập tên rạp phim">
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <select class="form-select w-50" id="floatingSelect" aria-label="Floating label select example"
                    name="location">
                    @foreach ($provinces as $province)
                        <option value="{{ $province }}">{{ $province }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="total_halls" class="form-label">Total Halls</label>
                <input type="number" min="1" max="20" name="total_halls" class="form-control w-25"
                    placeholder="Tổng số phòng" value="1">
            </div>
            <div class="my-5">
                <button type="submit" class="btn btn-outline-success col-2">Thêm</button>
                <a class="btn btn-outline-danger col-2 mx-2" href="{{ route('cinemas.index') }}">Quay lại</a>
            </div>
        </form>
    </div>
</div>

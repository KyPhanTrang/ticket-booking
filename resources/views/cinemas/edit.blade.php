<div class="container border border-dark-subtle mt-3 rounded-4">
    <h2 class="text-center text-dark-emphasis h2 my-5">EDIT HOTEL</h2>
    @include('dashboard.component.noti-error')
    <form action="{{ route('cinemas.update', $cinema) }}" method="POST" class="container">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control w-75" placeholder="Nhập tên rạp"
                value="{{ $cinema->name }}">
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <select class="form-select w-50" id="floatingSelect" aria-label="Floating label select example"
                name="location">
                @foreach ($provinces as $province)
                    @if ($cinema->location == $province)
                        <option value="{{ $cinema->location }}" selected>{{ $province }}</option>
                    @else
                        <option value="{{ $province }}">{{ $province }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="total_halls" class="form-label">Total Halls</label>
            <input type="number" name="total_halls" class="form-control w-25" placeholder="Tổng số phòng"
                value="{{ $cinema->total_halls }}">
        </div>
        <div class="my-5">
            <button type="submit" class="btn btn-outline-success col-1">Sửa</button>
            <a class="btn btn-outline-danger col-1 mx-2" href="{{ route('cinemas.index') }}">Quay lại</a>
        </div>
    </form>
</div>

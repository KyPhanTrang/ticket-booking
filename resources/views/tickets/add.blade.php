<div class="container mt-4 my-5">
    <div class="row my-5">
        <div class="text-start">
            <h2>Chúc bạn đặt vé vui vẻ</h2>
        </div>
    </div>
    <div class="row justify-content-center border border-bottom rounded">
        <div class="col-md-8 text-center mx-auto my-3">
            <h2 class="mb-4">
                {{ $movie->title }}
            </h2>
            <div class="col-md-4 mx-auto">
                <div class="card">
                    <div class="image-container">
                        <img src="{{ $movie->post_url }}" class="card-img-top" alt="{{ $movie->title }}">
                    </div>
                </div>
            </div>
            <div class="col-md-4 my-3 mx-auto">
                <p class="fw-bold">Description</p>
                <p class="fst-italic text-center">
                    {{ $movie->description }}
                </p>
            </div>
            <div class="container mt-4 my-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="showtime-grid my-3">
                            @foreach ($showtimes as $showtime)
                                <div class="border border-gray-200 rounded-5">
                                    <a class="btn btn-light text-muted date p-3 showtime-btn"
                                        data-showtime="{{ $showtime->id }}" data-hall="{{ $showtime->hall->id }}">
                                        <p>Suất chiếu: {{ $showtime->show_time }}</p>
                                        <p>Rạp chiếu:
                                            {{ $showtime->hall->cinema->name . ', ' . $showtime->hall->hall_name }}</p>
                                        <span class="small text-nowrap">Địa chỉ:
                                            {{ $showtime->hall->cinema->location }}</span>
                                        <hr>
                                        <span class="text-bold"><br>Giá vé: {{ round($showtime->price) }}</span>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('homes.index') }}" class="btn btn-primary my-3">Quay lại</a>
        </div>

        <div class="col-md-4 my-3">
            <!-- Bảng chọn ghế (ẩn ban đầu) -->
            <div id="seat-selection" class="mt-4" style="display: none;">
                <h4>Chọn ghế:</h4>
                <div class="seat-container d-flex flex-wrap justify-content-center">
                    <!-- Ghế sẽ được load ở đây -->
                </div>
                <button id="confirm-seats" class="btn btn-success mt-3" disabled>Tiếp tục</button>
            </div>

            <!-- Form đặt vé (ẩn ban đầu) -->
            <div id="booking-form" class="mt-4" style="display: none;">
                <h4>Thông tin khách hàng</h4>
                <form action="{{ route('tickets.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="showtime_id" id="showtime_id">
                    <input type="hidden" name="seat_id" id="seat_id">

                    <div class="form-group">
                        <label for="name">Họ và Tên:</label>
                        <input type="text" name="customer_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="customer_email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại:</label>
                        <input type="text" name="customer_phone" class="form-control" required>
                    </div>
                    <input type="hidden" name="booking_date" value="{{ now()->format('Y-m-d H:i:s') }}">

                    <button type="submit" class="btn btn-primary mt-3">Xác nhận đặt vé</button>
                </form>
            </div>
        </div>
    </div>
</div>

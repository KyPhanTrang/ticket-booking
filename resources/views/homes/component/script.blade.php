<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    let tickets_booked = [];
    $(document).ready(function() {
        $(".showtime-btn").click(function() {
            let showtimeId = $(this).data("showtime");
            let hallId = $(this).data("hall");

            console.log("Chọn suất chiếu ID:", showtimeId);
            $("#showtime_id").val(showtimeId);

            $("#seat-selection").show();
            $("#booking-form").hide();

            $(".seat-container").html('<p>Đang tải ghế...</p>');

            let tickets_booked; // Khai báo biến

            $.ajax({
                url: '/get-tickets/' + showtimeId,
                type: 'GET',
                success: function(data) {
                    tickets_booked = data; // Lưu vé đã đặt

                    // Gọi Ajax 2 sau khi Ajax 1 hoàn tất
                    $.ajax({
                        url: "/get-seats/" + hallId,
                        type: "GET",
                        success: function(data) {
                            let seatHtml = "";
                            data.forEach(seat => {
                                // Kiểm tra xem ghế có trong tickets_booked không
                                const isBooked = tickets_booked.some(
                                    ticket => ticket.seat_id ===
                                    seat.id);
                                if (!isBooked) {
                                    seatHtml +=
                                        `<div class="seat btn btn-outline-primary m-2" data-seat="${seat.id}">${seat.seat_number}</div>`;
                                } else {
                                    seatHtml +=
                                        `<button class="btn btn-dark m-2" data-seat="${seat.id}" disabled>${seat.seat_number}</button>`;
                                }
                            });
                            $(".seat-container").html(seatHtml);
                        },
                        error: function(xhr, status, error) {
                            console.error("Error fetching seats:", error);
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching tickets:", error);
                }
            });
        });

        // Chọn ghế
        $(document).on("click", ".seat", function() {
            $(".seat").removeClass("btn-primary").addClass("btn-outline-primary");
            $(this).removeClass("btn-outline-primary").addClass("btn-primary");

            let seatId = $(this).data("seat");
            console.log("Ghế được chọn:", seatId);
            $("#seat_id").val(seatId);
            $("#confirm-seats").prop("disabled", false);
        });

        // Bấm "Tiếp tục" để mở form
        $("#confirm-seats").click(function() {
            console.log("Bấm Tiếp tục");
            $("#booking-form").show();
            $('html, body').animate({
                scrollTop: $("#booking-form").offset().top
            }, 500);
        });

        $("form").submit(function(event) {
            let showtimeId = $("#showtime_id").val();
            let seatId = $("#seat_id").val();

            console.log("Dữ liệu submit - showtime_id:", showtimeId, ", seat_id:", seatId);

            if (!showtimeId || !seatId) {
                event.preventDefault();
                alert("Vui lòng chọn suất chiếu và ghế trước khi đặt vé!");
            }
        });

        let province_item = document.querySelectorAll('.province_li');
        province_item.forEach(item => {
            item.addEventListener('click', () => {
                let province = this.dataset.province;
            })
        })

    });
    $(document).ready(function() {
        $('.provinces-btn').click(function(e) {
            // e.preventDefault(); // Ngăn chặn hành vi mặc định của thẻ <a>
            let location = $(this).data("location");
            $('#cinema-selection').show();
            $('#cinema-container').html(
                    '<li class="nav-item mx-4 my-1"><p class="nav-link provinces-btn">Đang tải rạp ...</p></li>'
                )
                .show(); // Hiển thị container

            $.ajax({
                url: "/get-cinemas/" + location,
                type: 'GET',
                success: function(data) {
                    let cinemaHTML = '';
                    if (data && Array.isArray(data) && data.length >
                        0) { // Kiểm tra dữ liệu
                        data.forEach(cinema => {
                            cinemaHTML +=
                                `<li class="nav-item mx-4 my-1"><a class="nav-link provinces-btn" href="#">${cinema.name}</a></li>`;
                        });
                    } else {
                        cinemaHTML =
                            '<li class="nav-item mx-4 my-1"><p class="nav-link provinces-btn">Không có rạp nào tại địa điểm này.</p></li>';
                    }
                    $('#cinema-container').html(cinemaHTML);
                },
                error: function(xhr, status, error) {
                    $('#cinema-container').html(
                        '<li class="nav-item mx-4 my-1"><p class="nav-link provinces-btn">Lỗi khi tải rạp: ' +
                        error +
                        '</p></li>');
                }
            });
        });
    });
</script>

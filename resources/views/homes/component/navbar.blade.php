<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/"><i class="bi bi-camera-reels mx-3"></i>Đặt vé<br>xem phim</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#">Phim đang chiếu</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Phim sắp chiếu</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('homes.home_cinemas') }}">Rạp chiếu</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Khuyến mãi</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Vé đã đặt</a></li>
                <li class="nav-item"><a class="nav-link" href=" {{ route('auth.admin') }} ">Đăng nhập</a></li>
            </ul>
        </div>
    </div>
</nav>
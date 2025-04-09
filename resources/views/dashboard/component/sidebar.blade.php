<nav class="col-md-2 sidebar d-flex flex-column">
    <h4>Admin Dashboard</h4>
    <a href="{{ route('dashboard.index') }}">🏠 Trang chủ</a>
    <a href="{{ route('cinemas.index') }}">🎬 Quản lý Rạp</a>
    <a href="{{ route('movies.index') }}">📽️ Quản lý Phim</a>
    <a href="{{ route('showtimes.index') }}">⏳ Quản lý Suất chiếu</a>
    <a href="{{ route('tickets.index') }}">🎟️ Quản lý Vé</a>
    <a href="{{ route('auth.logout') }}">🔓 Đăng xuất</a>
</nav>

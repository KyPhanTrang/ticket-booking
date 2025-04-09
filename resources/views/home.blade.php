<!-- Danh sách phim đang chiếu -->
<section class="container my-5">
    <h2 class="text-center my-5"><i class="fa-solid fa-clapperboard mx-2"></i>Phim Đang Chiếu</h2>
    <div class="row">
        @foreach ($movies as $movie)
            <div class="col-md-4 my-3">
                <div class="card">
                    <div class="image-container">
                        <img src="{{ $movie->post_url }}" class="card-img-top" alt="{{ $movie->title }}">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $movie->title }}</h5>
                        <p class="card-text">Thể loại: {{ $movie->genre }}</p>
                        <a href="{{ route('tickets.create', ['movie_id' => $movie->id]) }}" class="btn btn-primary">
                            Đặt vé ngay
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

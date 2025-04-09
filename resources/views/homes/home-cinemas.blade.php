<div class="container">
    <div class="row justify-content-center">
        <div class="col-8 border border-black my-5 rounded-2">
            <h1 class="text-black-50 text-center my-5"> Rạp chiếu </h1>
            <hr>
            <ul class="navbar-nav ms-auto d-flex flex-wrap custom-list my-3">
                @foreach ($provinces as $province)
                    <li class="nav-item mx-4 my-1">
                        <a class="nav-link provinces-btn" href="#"
                            data-location="{{ $province }}">
                            {{ $province }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <div id="cinema-selection" class="mt-4" style="display: none;">
                <hr>
                <ul class="navbar-nav ms-auto d-flex flex-wrap custom-list my-3" id="cinema-container" style="display: none;">
                    <!-- load rạp ở đây -->
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container border border-dark-subtle mt-3 rounded-4">
    <div class="row">
        <div class="col-4 text-center my-4">
            <h2 class="text-dark-emphasis h2">Detail Movie</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card w-75 mx-auto">
                <div class="image-container">
                    <img src="{{ $movie->post_url }}" class="card-img-top" alt="{{ $movie->title }}">
                </div>
            </div>
        </div>
        <div class="col-md-8 my-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">duration</th>
                        <th scope="col">genre</th>
                        <th scope="col">release_date</th>
                        <th scope="col">rating</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $movie->title }}</td>
                        <td>{{ $movie->description }}</td>
                        <td>{{ $movie->duration }}</td>
                        <td>{{ $movie->genre }}</td>
                        <td>{{ $movie->release_date }}</td>
                        <td>{{ $movie->rating }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 my-3 d-flex justify-content-center">
            <a class="btn btn-outline-danger" href="{{ route('movies.index') }}">Quay lại</a>
        </div>
    </div>
</div>

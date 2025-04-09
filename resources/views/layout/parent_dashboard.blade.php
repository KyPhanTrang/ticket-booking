<!DOCTYPE html>
<html lang="en">
<head>
    @include('dashboard.component.head')
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            @include('dashboard.component.sidebar')
            <main class="col-md-10 content" id="main-content">
                @include($template)
            </main>
        </div>
    </div>
</body>
@include('dashboard.component.script')
</html>
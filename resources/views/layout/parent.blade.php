<!DOCTYPE html>
<html lang="vi">
{{-- @php $title = 'Home' @endphp --}}
<head>
    @include('homes.component.notifi-error')
    @include('homes.component.head')
    @include('homes.component.script')
    
</head>

<body>
    <!-- Navbar -->
    @include('homes.component.navbar')
    
    <!-- main -->
    @include($template)
    
    <!-- Footer -->
    @include('homes.component.footer')
</body>

</html>
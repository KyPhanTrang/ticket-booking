@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger my-2 message">{{ $error }}</div>
    @endforeach
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Lấy tất cả thông báo lỗi
            const messages = document.querySelectorAll('.message');
            messages.forEach(function(message) {
                setTimeout(function() {
                    message.style.display = 'none';
                }, 3000);
            });
        });
    </script>
@endif

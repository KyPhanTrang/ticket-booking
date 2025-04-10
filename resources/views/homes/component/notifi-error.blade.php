@if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const errorMessages = @json($errors->all());
            errorMessages.forEach(function(error) {
                Toastify({
                    text: error,
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "red",
                }).showToast();
            });
        });
    </script>
@endif
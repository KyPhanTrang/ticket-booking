<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // View showtimes.add, find hall in cinema, and fill in the select tag option
    document.getElementById('cinema_id').addEventListener('change', function() {
        let cinemaId = this.value;
        fetch('/get-halls/' + cinemaId)
            .then(response => response.json())
            .then(data => {
                let hallSelect = document.getElementById('hall_id');
                hallSelect.innerHTML = ''; // Xóa các option cũ
                data.forEach(hall => {
                    let option = document.createElement('option');
                    option.value = hall.id;
                    option.text = hall.hall_name;
                    hallSelect.appendChild(option);
                });
            });
    });
</script>

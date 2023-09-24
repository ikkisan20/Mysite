$(document).on('submit', '#loginForm', function (e) {
    e.preventDefault();

    $.ajax({
        method: "POST",
        url: "index.php",
        data: $(this).serialize(),
        success: function (data) {

            if (data === 'success') {
                window.location.href = "home.php";
            } else {
                $('#msg').html(data);
                $('#loginForm').find('input').val('');
            }

        }
    });
});

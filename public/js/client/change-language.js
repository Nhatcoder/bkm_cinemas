$(document).ready(function () {
    $('.btnChangeLanguage').on('click', function (e) {
        e.preventDefault();
        let url = $(this).data('url');
        let language = $(this).data('language');

        $.ajax({
            url: url,
            method: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                language: language
            },
            success: function () {
                location.reload();
            },
            error: function () {
                alert('Error changing language.');
            }
        });
    });
});

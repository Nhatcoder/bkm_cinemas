$(document).ready(function () {
    $('.formLogin').on('submit', function(e) {
        const email = $('.emailInput').val();
        const password = $('.passwordInput').val();

        const errorFormEmail = $('.errorFormEmail');
        const errorFormPassword = $('.errorFormPassword');

        let hasError = false;

        if (email === '') {
            hasError = true;
            errorFormEmail.text('Vui lòng nhập email.');
        } else {
            errorFormEmail.text('');
        }

        if (password === '') {
            hasError = true;
            errorFormPassword.text('Vui lòng nhập mật khẩu.');
        } else {
            errorFormPassword.text('');
        }

        if (hasError) {
            e.preventDefault();
        } else {
            $('.formLogin').submit();
        }
    });
});

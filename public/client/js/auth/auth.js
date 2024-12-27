import { modal_deposit } from '../commons/common.js';

$(document).ready(function () {
    $(document).on('change', '.date-filter', function (e) {
        e.preventDefault();

        let url = $(this).data('url');
        let date = $(this).val();

        $.ajax({
            url: url,
            type: 'GET',
            data: {date: date},
            success: function (response) {
                $('#ticket-main').html(response.tbody);
                modal_deposit();
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            }
        });
    });

    $(document).on('click', '.pagination-tickets .pagination a', function (e) {
        e.preventDefault();
        let url = $(this).attr('href');

        $.ajax({
            url: url,
            type: 'GET',
            success: function (response) {
                $('#ticket-main').html(response.tbody);
                $('.pagination-container').html(response.pagination);
                modal_deposit();
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            }
        });
    });

    $(document).on('submit', '#updateAvatarForm', function (e) {
        e.preventDefault();
    
        let form = $(this);
        let url = form.attr('action');
        let data = new FormData(this);
        let imageSuccess = form.attr('data-success');
    
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.status) {
                    Swal.fire({
                        position: "center",
                        imageUrl: imageSuccess,
                        imageWidth: 100,
                        imageHeight: 100,
                        width: "400px",
                        title: "Cập nhật ảnh đại diện thành công",
                        showConfirmButton: false,
                        timerProgressBar: true,
                        timer: 1500,
                    }).then(() => {
                        $('#modalAvatarImage').hide();

                        if (response.imageUrl) {
                            $('#current-avatar img').attr('src', response.imageUrl).css('display', 'block');
                            $('.avatar-placeholder').css('display', 'none');
                            $('.input-box-image').css('background-image', 'url(' + response.imageUrl + ')');
                            $('.account-header .avatar').attr('src', response.imageUrl).show();
                            $('.account-header .avatar-placeholder-header').hide();
                            $('.avatar-placeholder-header').replaceWith(`
                                <img class="avatar" src="${response.imageUrl}" alt="Avatar">
                            `);
                        } else {
                            let firstLetter = response.firstLetter || 'A';
                            let backgroundColor = response.backgroundColor || '#FF5733';
                            $('.avatar-placeholder').css({
                                display: 'block',
                                'background-color': backgroundColor,
                            }).text(firstLetter);
                            $('#current-avatar img').css('display', 'none');
                            $('.account-header .avatar-placeholder-header').css({
                                display: 'block',
                                'background-color': backgroundColor,
                            }).text(firstLetter);
                            $('.account-header .avatar').hide();
                        }
    
                        $('#avatarInput').val('');
                        $('#avatar').val('');
                    });
                }
            },
            error: function (error) {
                console.error(error);
                alert("Đã xảy ra lỗi khi cập nhật ảnh đại diện.");
            }
        });
    });

    $(document).on("submit", ".form-login", function (e) {
        e.preventDefault();

        // Xóa thông báo lỗi cũ
        $('.form-login div[class$="_error"]').text('');

        let form = $(this);
        let url = form.attr("action");
        let image = form.data("image");
        let data = form.serialize();

        let hasErrors = false;

        let emailOrPhone = form.find("input[name='emailOrPhone']").val();
        if (!emailOrPhone) {
            form.find(".emailOrPhone_error")
                .text("Vui lòng nhập email hoặc số điện thoại.")
                .css("color", "red");
            hasErrors = true;
        }

        let password = form.find("input[name='password']").val();
        if (!password) {
            form.find(".password_error")
                .text("Vui lòng nhập mật khẩu.")
                .css("color", "red");
            hasErrors = true;
        }

        if (!hasErrors) {
            $.ajax({
                url: url,
                method: "POST",
                data: data,
                success: function (response) {
                    if (response.status) {
                        Swal.fire({
                            position: "center",
                            imageUrl: image,
                            imageWidth: 100,
                            imageHeight: 100,
                            width: "400px",
                            title: "Đăng nhập thành công.",
                            showConfirmButton: false,
                            timerProgressBar: true,
                            timer: 1500,
                        }).then(() => {
                            window.location.href = response.url;
                        });
                    } else {
                        if (response.errors) {
                            $.each(response.errors, function (key, value) {
                                if (key == "emailOrPhone") {
                                    form.find(".emailOrPhone_error")
                                        .text(value)
                                        .css("color", "red");
                                } else if (key == "password") {
                                    form.find(".password_error")
                                        .text(value)
                                        .css("color", "red");
                                }
                            });
                        }
                    }
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function (key, messages) {
                            let errorContainer = form.find("." + key + "_error");
                            if (errorContainer.length) {
                                errorContainer.text(messages[0]).css("color", "red");
                            }
                        });
                    } else {
                        Swal.fire({
                            position: "center",
                            icon: "error",
                            title: "Đã xảy ra lỗi!",
                            text: "Vui fitte liên hệ với bộ phận kỹ thuật.",
                            showConfirmButton: false,
                            timer: 2500,
                        });
                    }
                },
            });
        }
    });

    $(document).on("submit", ".form-register", function (e) {
        e.preventDefault();

        // Xóa thông báo lỗi cũ
        $('.form-register div[class$="_error"]').text('');

        let form = $(this);
        let url = form.attr("action");
        let image = form.data("image");
        let data = form.serialize();

        let hasErrors = false;

        let name = form.find("input[name='name']").val();
        if (!name) {
            form.find(".name_error").text("Vui lòng nhập tên.").css("color", "red");
            hasErrors = true;
        }

        let firstName = form.find("input[name='first_name']").val();
        if (!firstName) {
            form.find(".first_name_error").text("Vui lòng nhập họ.").css("color", "red");
            hasErrors = true;
        }

        let lastName = form.find("input[name='last_name']").val();
        if (!lastName) {
            form.find(".last_name_error").text("Vui lòng nhập tên đệm và tên.").css("color", "red");
            hasErrors = true;
        }

        let email = form.find("input[name='email']").val();
        if (!email) {
            form.find(".email_error").text("Vui lòng nhập email.").css("color", "red");
            hasErrors = true;
        }

        let gender = form.find("input[name='gender']:checked").val(); // Lấy giá trị của ô radio được chọn
        if (!gender) {
            form.find(".gender_error").text("Vui lòng chọn giới tính.").css("color", "red");
            hasErrors = true;
        }

        let phone = form.find("input[name='phone']").val();
        if (!phone) {
            form.find(".phone_error").text("Vui lòng nhập số điện thoại.").css("color", "red");
            hasErrors = true;
        }

        let date_birth = form.find("input[name='date_birth']").val();
        let currentDate = new Date();

        let dateRegex = /^\d{2}-\d{2}-\d{4}$/;

        if (!date_birth) {
            form.find(".date_birth_error").text("Vui lòng nhập ngày sinh.").css("color", "red");
            hasErrors = true;
        } else if (!dateRegex.test(date_birth)) {
            form.find(".date_birth_error").text("Định dạng ngày không hợp lệ (dd-mm-yyyy).").css("color", "red");
            hasErrors = true;
        } else {
            let parts = date_birth.split("-");
            let inputDate = new Date(parts[2], parts[1] - 1, parts[0]); 

            if (inputDate > currentDate) {
                form.find(".date_birth_error").text("Ngày sinh không được lớn hơn ngày hiện tại.").css("color", "red");
                hasErrors = true;
            } else {
                form.find(".date_birth_error").text("");
            }
        }


        let city_id = form.find("select[name='city_id']").val();
        if (!city_id) {
            form.find(".city_id_error").text("Vui lòng chọn tỉnh/thành phố.").css("color", "red");
            hasErrors = true;
        }

        let password = form.find("input[name='password']").val();
        if (!password) {
            form.find(".password_error").text("Vui lòng nhập mật khẩu.").css("color", "red");
            hasErrors = true;
        }

        let passwordConfirm = form.find("input[name='password_confirmation']").val();
        if (!passwordConfirm) {
            form.find(".password_confirmation_error").text("Vui lòng nhập lại mật khẩu.").css("color", "red");
            hasErrors = true;
        }

        // Kiểm tra checkbox điều khoản
        let isTermsAccepted = form.find("input[name='is_terms_accepted']").is(":checked");
        if (!isTermsAccepted) {
            form.find(".is_terms_accepted_error").text("Bạn phải chấp nhận các điều khoản.").css("color", "red");
            hasErrors = true;
        }

        if (!hasErrors) {
            Swal.fire({
                title: "Đang xử lý yêu cầu...",
                icon: "info",
                showConfirmButton: false,
                allowOutsideClick: false,
            });

            $.ajax({
                url: url,
                type: "POST",
                data: data,
                success: function (response) {
                    if (response.success) {
                        Swal.fire({
                            title: response.message,
                            text: "Chúc mừng bạn đã đăng ký thành công.",
                            imageUrl: image,
                            imageWidth: 100,
                            imageHeight: 100,
                            showConfirmButton: false,
                            timerProgressBar: true,
                            timer: 3000,
                            with: "400px",
                        }).then(() => {
                            $(".form-register").trigger("reset");
                            $('#city').val('').trigger('change');

                            $('.nav-tabs li').removeClass('active');
                            $('.nav-tabs a[href="#dang-nhap"]').closest('li').addClass('active');

                            $('.nav-tabs a[href="#dang-nhap"]').tab('show');

                            $('#dang-nhap').addClass('active in');
                            $('#dang-ky').removeClass('active in');
                        });
                    }
                },
                error: function (xhr) {
                    Swal.close();
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        for (const [key, messages] of Object.entries(errors)) {
                            form.find(`.${key}_error`).text(messages[0]).css("color", "red");
                        }
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Đã xảy ra lỗi!",
                            text: "Vui lòng thử lại sau.",
                            showConfirmButton: false,
                            timer: 2500,
                        });
                    }
                }
            });
        }
    });

    $(document).on("submit", "#forgotPass", function (e) {
        e.preventDefault();

        // Xóa thông báo lỗi cũ
        $('#forgotPass div[class$="_error"]').empty();

        let url = $(this).attr("action");
        let form = $(this);
        let data = form.serialize();

        // Kiểm tra lỗi trước khi gửi yêu cầu
        let hasErrors = false;

        // Kiểm tra trường emailOrPhone
        let emailOrPhone = form.find("input[name='email']").val();
        if (!emailOrPhone) {
            form.find(".email_error")
                .html("Vui lòng nhập email.")
                .css("color", "red");
                hasErrors = true;
        }

        if (!hasErrors) {
            Swal.fire({
                title: "Đang gửi yêu cầu...",
                text: "Vui lòng chờ trong giây lát.",
                icon: "info",
                showConfirmButton: false,
                allowOutsideClick: false,
            });

            $.ajax({
                url: url,
                type: "POST",
                data: data,
                success: function (response) {
                // Kiểm tra nếu gửi thành công
                if (response.sendResetLink) {
                    Swal.fire({
                        title: "Yêu cầu thay đổi mật khẩu đã được gửi.",
                        text: "Chúng tôi đã gửi yêu cầu thay đổi mật khẩu đến email của bạn. Vui lòng kiểm tra lại email.",
                        icon: "success",
                        showConfirmButton: true,
                        allowOutsideClick: false,
                    }).then(() => {
                        $("#forgotPass").trigger("reset");
                    });
                }
                },
                error: function (xhr) {
                    // Đóng thông báo đang xử lý
                    Swal.close();
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        for (const [key, messages] of Object.entries(errors)) {
                            form.find(`.${key}_error`).text(messages[0]).css("color", "red");
                        }
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Đã xảy ra lỗi!",
                            text: "Vui lòng thử lại sau.",
                            showConfirmButton: false,
                            timer: 2500,
                        });
                    }
                },
            });
        }
    });

    $(document).on("submit", "#confirmResetPassword", function (e) {
        e.preventDefault();
        console.log(e);
        
        $('#confirmResetPassword div[class$="_error"]').empty();

        let form = $(this);
        let token = form.data("token");
        let image = form.data("image");
        let email = form.data("email");
        let data = form.serialize();

        // Thêm token và email vào data
        data += `&token=${encodeURIComponent(token)}&email=${encodeURIComponent(email)}`;

        $.ajax({
            url: $(this).attr("action"),
            type: "POST",
            data: data,
            success: function (response) {
                if (response.sendResetPassword) {
                    Swal.fire({
                        position: "center",
                        imageUrl: image,
                        imageWidth: 100,
                        imageHeight: 100,
                        width: "400px",
                        title: "Thay đổi mật khẩu thành công!",
                        text: "Bây giờ bạn có thể đăng nhập bằng mật khẩu mới bạn vừa thay đổi.",
                        showConfirmButton: true,
                    }).then((result) => {
                        if (result.isConfirmed) {
                        // Chuyển hướng và reset form sau khi bấm "OK"
                        window.location.href = response.url;
                            $("#confirmResetPassword").trigger("reset");
                        }
                    });
                }
            },
            error: function (xhr, status, error) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    for (const [key, messages] of Object.entries(errors)) {
                        form.find(`.${key}_error`).text(messages[0]).css("color", "red");
                    }
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Đã xảy ra lỗi!",
                        text: "Vui lòng thử lại sau.",
                        showConfirmButton: false,
                        timer: 2500,
                    });
                }
            },
        });
    });

    $(document).on("submit", "#form-changepassword", function (e) {
        e.preventDefault();

        // Xóa thông báo lỗi cũ
        $('#form-changepassword div[class$="_error"]').text('');

        let form = $(this);
        let urlLogout = form.data("url-logout");
        let urlRedirect = form.data("url-redirect");
        let url = form.attr("action");
        let image = form.data("image");
        let data = form.serialize();

        let hasErrors = false;

        let old_password = form.find("input[name='old_password']").val();
        if (!old_password) {
            form.find(".old_password_error")
                .text("Vui lòng nhập mật khẩu hiện tại.")
                .css("color", "red");
            hasErrors = true;
        }

        let password = form.find("input[name='password']").val();
        if (!password) {
            form.find(".password_error")
                .text("Vui lòng nhập mật khẩu.")
                .css("color", "red");
            hasErrors = true;
        }

        let confirm_password = form.find("input[name='confirm_password']").val();
        if (!confirm_password) {
            form.find(".confirm_password_error")
                .text("Vui lòng nhập lại mật khẩu.")
                .css("color", "red");
            hasErrors = true;
        }

        if (!hasErrors) {
            Swal.fire({
                title: "Đang gửi yêu cầu...",
                text: "Vui lòng chờ trong giây lát.",
                icon: "info",
                showConfirmButton: false,
                allowOutsideClick: false,
            });

            $.ajax({
                url: url,
                type: "POST",
                data: {
                    _token: $('meta[name="csrf_token"]').attr('content'),
                    old_password: old_password,
                    password: password,
                    confirm_password: confirm_password
                },
                success: function (response) {
                    if (response.status) {
                        Swal.fire({
                            position: "center",
                            title: "Thay đổi mật khẩu thành công!",
                            text: "Bạn có muốn duy trì đăng nhập?",
                            imageUrl: image,
                            imageWidth: 100,
                            imageHeight: 100,
                            showCancelButton: true,
                            confirmButtonText: "Duy trì",
                            cancelButtonText: "Đăng xuất khỏi thiết bị",
                            width: "400px"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $("#form-changepassword").trigger("reset");
                            } else {
                                $.ajax({
                                    url: urlLogout,
                                    type: "POST",
                                    data: data,
                                    success: function () {
                                        window.location.href = urlRedirect;
                                    },
                                    error: function () {
                                        Swal.fire({
                                            icon: "error",
                                            title: "Có lỗi xảy ra khi đăng xuất!",
                                            showConfirmButton: false,
                                            timer: 2500,
                                        });
                                    },
                                });
                            }
                        });
                    }
                },
                error: function (xhr, status, error) {
                    Swal.close();
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        for (const [key, messages] of Object.entries(errors)) {
                            form.find(`.${key}_error`).text(messages[0]).css("color", "red");
                        }
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Đã xảy ra lỗi!",
                            text: "Vui lòng thử lại sau.",
                            showConfirmButton: false,
                            timer: 2500,
                        });
                    }
                },
            });
        }
    });

    $(document).on('submit', '#form-updateProfile', function(e) {
        e.preventDefault();

        let form = $(this);
        let url = form.attr('action');
        let image = form.data('image');
        let data = form.serialize();

        $.ajax({
            url: url,
            type: "POST",
            data: data,
            success: function (response) {
                if (response.status) {
                    Swal.fire({
                        position: "center",
                        imageUrl: image,
                        imageWidth: 100,
                        imageHeight: 100,
                        width: "400px",
                        title: "Thông tin đã được cập nhật!",
                        showConfirmButton: false,
                        timerProgressBar: true,
                        timer: 2500,
                    });
                }
            },
            error: function (xhr, status, error) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    for (const [key, messages] of Object.entries(errors)) {
                        form.find(`.${key}_error`).text(messages[0]).css("color", "red");
                    }
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Đã xảy ra lỗi!",
                        text: "Vui lòng thử lại sau.",
                        showConfirmButton: false,
                        timer: 2500,
                    });
                }
            },
        });
    });

    // tính tổng chi tiêu  theo năm

    $('#moneySpending').on('change', function(e) {
        // Lấy giá trị năm chính xác từ datepicker
        const selectedYear = $(this).val() // Lấy năm từ datepicker
        $('#year').text(selectedYear);


        var url = $(this).attr('data-url');
        var csrfToken = $(this).attr('data-token');

        // Gửi yêu cầu AJAX
        $.ajax({
            url: url, // Đường dẫn đến route xử lý
            method: 'POST',
            data: {
                _token: csrfToken, // Token CSRF
                year: selectedYear, // Gửi năm được chọn
            },
            success: function(response) {
                // Cập nhật tổng chi tiêu và năm
                $('#totalPendingMoney').text(response.totalMoneyFormatted || 0);
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
    $('#moneySpending').trigger('change');


    // tính tổng chi tiêu theo tháng
    $('#moneySpendingByMonth').on('change', function(e) {
        // Lấy giá trị năm chính xác từ datepicker
        const selectedMonth = $(this).val() // Lấy năm từ datepicker
        
        $('#month').text(selectedMonth);


        var url = $(this).attr('data-url');
        
        var csrfToken = $(this).attr('data-token');

        // Gửi yêu cầu AJAX
        $.ajax({
            url: url, // Đường dẫn đến route xử lý
            method: 'POST',
            data: {
                _token: csrfToken, // Token CSRF
                month: selectedMonth, // Gửi năm được chọn
            },
            success: function(response) {
                // Cập nhật tổng chi tiêu và năm
                $('#totalPendingMoneyByMonth').text(response.totalMoneyFormatted || 0);
            },
            error: function(error) {
                console.log(error); 
            }
        });
    });
    $('#moneySpendingByMonth').trigger('change');


    

       



            
       
        
    
});

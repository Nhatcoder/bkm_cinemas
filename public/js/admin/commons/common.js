$(document).ready(function () {
    function checkSeoInputCharacterCount(inputSelector, feedbackSelector, minLength, maxLength, isRequired, isKeyword = false) {
        $(inputSelector).on('input', function () {
            let inputVal = $(this).val(); // Lấy giá trị và loại bỏ khoảng trắng thừa
            let feedback = $(feedbackSelector);
            let inputLength;
            let unit;
            let remainingUnits;

            if (isKeyword) {
                // Nếu là từ khóa, đếm số từ phân tách bằng dấu phẩy
                let keywords = inputVal.split(',').filter(function (kw) {
                    return kw.trim() !== ""; // Loại bỏ từ rỗng
                });
                inputLength = keywords.length;
                unit = 'từ'; // Đổi đơn vị thành từ
                remainingUnits = maxLength - inputLength;
            } else {
                // Đếm số ký tự cho các trường khác (tiêu đề và mô tả SEO)
                inputLength = inputVal.length;
                unit = 'ký tự'; // Đặt đơn vị là ký tự
                remainingUnits = maxLength - inputLength;
            }

            // Kiểm tra điều kiện nhập dữ liệu
            if (inputVal === "") {
                feedback.text(maxLength + ' ' + unit + ' có thể nhập')
                    .addClass('good').removeClass('error');
            } else if (isKeyword && inputLength < minLength) {
                // Nếu nhập ít hơn số lượng tối thiểu cho từ khóa
                feedback.text('Tối thiểu cần ' + minLength + ' ' + unit + ' cho từ khóa')
                    .addClass('error').removeClass('good');
            } else if (!isKeyword && inputLength < minLength) {
                // Nếu nhập ít hơn số lượng tối thiểu cho tiêu đề hoặc mô tả
                feedback.text('Tối thiểu cần ' + minLength + ' ký tự, hiện tại: ' + inputLength + ' ký tự')
                    .addClass('error').removeClass('good');
            } else if (inputLength <= maxLength) {
                feedback.text(remainingUnits + ' ' + unit + ' còn lại')
                    .addClass('good').removeClass('error');
            } else {
                feedback.text('- ' + Math.abs(remainingUnits) + ' ' + unit + ' vượt quá giới hạn')
                    .addClass('error').removeClass('good');
            }
        });

        // Khi trang mới tải, kiểm tra và hiển thị số ký tự/từ tối đa
        $(inputSelector).trigger('input');
    }
    // Gọi hàm kiểm tra cho tiêu đề SEO (10 - 70 ký tự)
    checkSeoInputCharacterCount('#title_seo', '#titleSeo_feedback', 10, 70, true);

    // Gọi hàm kiểm tra cho mô tả SEO (150 - 160 ký tự)
    checkSeoInputCharacterCount('#description_seo', '#descriptionSeo_feedback',160, 160, true);

    // Gọi hàm kiểm tra cho từ khóa SEO (2 đến 5 từ, phân cách bằng dấu phẩy)
    checkSeoInputCharacterCount('#keyword_seo', '#keywordSeo_feedback', 2, 5, false, true); // isKeyword = true


    $('#name').on('input', function () {
        let name = $('#name').val().trim().toLowerCase();

        var nameValue = $('#name').val();

        const vnAccents = [
            'à', 'á', 'ạ', 'ả', 'ã', 'â', 'ầ', 'ấ', 'ậ', 'ẩ', 'ẫ', 'ă', 'ằ', 'ắ', 'ặ', 'ẳ', 'ẵ',
            'è', 'é', 'ẹ', 'ẻ', 'ẽ', 'ê', 'ề', 'ế', 'ệ', 'ể', 'ễ',
            'ì', 'í', 'ị', 'ỉ', 'ĩ',
            'ò', 'ó', 'ọ', 'ỏ', 'õ', 'ô', 'ồ', 'ố', 'ộ', 'ổ', 'ỗ', 'ơ', 'ờ', 'ớ', 'ợ', 'ở', 'ỡ',
            'ù', 'ú', 'ụ', 'ủ', 'ũ', 'ư', 'ừ', 'ứ', 'ự', 'ử', 'ữ',
            'ỳ', 'ý', 'ỵ', 'ỷ', 'ỹ',
            'đ',
            'À', 'Á', 'Ạ', 'Ả', 'Ã', 'Â', 'Ầ', 'Ấ', 'Ậ', 'Ẩ', 'Ẫ', 'Ă', 'Ằ', 'Ắ', 'Ặ', 'Ẳ', 'Ẵ',
            'È', 'É', 'Ẹ', 'Ẻ', 'Ẽ', 'Ê', 'Ề', 'Ế', 'Ệ', 'Ể', 'Ễ',
            'Ì', 'Í', 'Ị', 'Ỉ', 'Ĩ',
            'Ò', 'Ó', 'Ọ', 'Ỏ', 'Õ', 'Ô', 'Ồ', 'Ố', 'Ộ', 'Ổ', 'Ỗ', 'Ơ', 'Ờ', 'Ớ', 'Ợ', 'Ở', 'Ỡ',
            'Ù', 'Ú', 'Ụ', 'Ủ', 'Ũ', 'Ư', 'Ừ', 'Ứ', 'Ự', 'Ử', 'Ữ',
            'Ỳ', 'Ý', 'Ỵ', 'Ỷ', 'Ỹ',
            'Đ'
        ];

        const vnAccentsOut = [
            'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a',
            'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e',
            'i', 'i', 'i', 'i', 'i',
            'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o',
            'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u',
            'y', 'y', 'y', 'y', 'y',
            'd',
            'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A',
            'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E',
            'I', 'I', 'I', 'I', 'I',
            'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O',
            'U', 'U', 'U', 'U', 'U', 'U', 'U', 'U', 'U', 'U', 'U',
            'Y', 'Y', 'Y', 'Y', 'Y',
            'D'
        ];

        for (let i = 0; i < vnAccents.length; i++) {
            name = name.replace(new RegExp(vnAccents[i], 'g'), vnAccentsOut[i]);
        }

        name = name.replace(/[^\w\s-]/g, '');
        name = name.replace(/\s+/g, '-');

        $('#slug').val(name);
        $('#pathAlias').val(name);
        $('#title_seo').val(nameValue);
        $('#keyword_seo').val(nameValue);
        $('#description_seo').val(nameValue);
        $('#resultTitle_vi').val(nameValue);
        $('#resultUrl_vi').val(name);

        $('#resultDescription_vi').html(nameValue);
        $('#title_seo').trigger('input');
        $('#description_seo').trigger('input');
        $('#keyword_seo').trigger('input');
    });

    $('.formDelete').on('submit', function (e) {
        e.preventDefault();
        const form = $(this);
        Swal.fire({
            title: 'Bạn chắc chắn muốn xóa?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Đồng ý',
            cancelButtonText: 'Huỷ'
        }).then((result) => {
            if (result.isConfirmed) {
                form.off('submit').submit();
            }
        });
    });

    $(".folder-layout-tab").on('click', function () {
        $('.folder-layout-tab, .folder-structure ').toggleClass("grid");
    });

    $('#automatic-selection').on('change', function () {
        var selectedLanguage = $("#automatic-selection option:selected").text();

        if (selectedLanguage == '-- Chọn ngôn ngữ --') {
            selectedLanguage = '';
        }

        $('#language_name').val(selectedLanguage);
    });

    // Thay đổi type password
    $(".changeTypePassword").on("click", function() {
        var passwordField = $("#password");
        var icon = $("#toggleIcon");

        // Toggle between text and password type for the input field
        if (passwordField.attr("type") === "text") {
            passwordField.attr("type", "password"); // Switch to password
            icon.removeClass("fa-eye").addClass("fa-eye-slash"); // Change icon to eye-slash
        } else {
            passwordField.attr("type", "text"); // Switch to text
            icon.removeClass("fa-eye-slash").addClass("fa-eye"); // Change icon to eye
        }
    });

    $('.role_id').change(function() {
        var selectedType = $(this).find('option:selected').data('type');

        $('.type').val(selectedType);
    });

    function togglePasswordBox() {
        const boxNewPassword = $('#box-new-password');
        const inputNewPassword = $('.newPassword');

        boxNewPassword.toggleClass('d-none');

        // Clear input value when the box is hidden
        if (boxNewPassword.hasClass('d-none')) {
            inputNewPassword.val('');
        }
    }

    // Event listener for both buttons: create new password and destroy
    $('.createNewPassword, .destroyBoxNewPassword').on('click', function() {
        togglePasswordBox();
    });
})

var selectRoles = $('.selectRoles');

if(selectRoles.val() === 'admin') {
    $('.permissionBox').hide();
}
selectRoles.on('change', function() {

    var permissionBox = $('.permissionBox');

    var selectedValue = $(this).val();

    if (selectedValue === 'admin') {
        permissionBox.hide();
    } else {
        permissionBox.show();
    }
});

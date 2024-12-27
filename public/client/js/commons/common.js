export function modal_deposit() {
    $('.open-modal').click(function () {
        const modalId = $(this).data('modal');
        $(modalId).show();
    });

    $('.custom-close, .close-modal, .custom-modal').click(function (e) {
        if ($(e.target).is('.custom-close, .close-modal, .custom-modal')) {
            $(this).closest('.custom-modal').hide();
        }
    });

    $('.submit-top-up').click(function () {
        const modal = $(this).closest('.custom-modal');
        const amount = modal.find('input[type="number"]').val();
        if (amount) {
            alert(`Nạp tiền thành công với số tiền: ${amount}`);
            modal.hide();
        } else {
            alert('Vui lòng nhập số tiền!');
        }
    });

    let currentTab = null; // Biến lưu trữ tab hiện tại

    $('.list-method-button').on('click', function () {
        const tab = $(this).data('tab');

        // Kiểm tra nếu nhấp vào chính tab hiện tại
        if (currentTab === tab) {
            // Ẩn tab hiện tại
            $(`.list-method-item-content[data-content="${tab}"]`).hide();

            // Xóa giá trị và trạng thái chọn của input
            $(`input[name="amount[${tab}]"]`).val(''); // Xóa giá trị của input trong tab hiện tại
            $(this).find('input[type="radio"]').prop('checked', false); // Bỏ chọn radio

            // Đặt currentTab về null vì không có tab nào đang hiển thị
            currentTab = null;
        } else {
            // Nếu nhấp vào tab khác tab hiện tại
            // Ẩn tất cả nội dung các tab
            $('.list-method-item-content').hide();

            // Xóa giá trị của các input "amount" trong các tab trước
            $('input[name^="amount"]').val(''); // Đặt tất cả các input bắt đầu bằng "amount" về rỗng

            // Hiển thị tab được chọn
            $(`.list-method-item-content[data-content="${tab}"]`).show();

            // Đặt trạng thái chọn cho phương thức thanh toán đã chọn
            $(this).find('input[type="radio"]').prop('checked', true);

            // Reset style của input khi chuyển tab
            $('input[name^="amount"]').css({
                'border': '',
                'box-shadow': ''
            });

            // Cập nhật tab hiện tại
            currentTab = tab;
        }
    });


    $('#depositForm').on('submit', function (e) {
        e.preventDefault();

        let imageError = $(this).data('error');
        const selectedPaymentMethod = $('input[name="payment_method"]:checked').val();

        if (!selectedPaymentMethod) {
            Swal.fire({
                position: "center",
                imageUrl: imageError,
                imageWidth: 100,
                imageHeight: 100,
                width: "600px",
                title: "Vui lòng chọn phương thức thanh toán!",
                showConfirmButton: true,
                confirmButtonText: "Ok",
            });

            return false;
        }

        let amountInput;

        if (selectedPaymentMethod === 'vnpay') {
            amountInput = $('input[name="amount[vnpay]"]');
        } else if (selectedPaymentMethod === 'momo') {
            amountInput = $('input[name="amount[momo]"]');
        } else if (selectedPaymentMethod === 'zalopay') {
            amountInput = $('input[name="amount[zalopay]"]');
        }

        if (amountInput && amountInput.val().trim() === '') {
            Swal.fire({
                position: "center",
                imageUrl: imageError,
                imageWidth: 100,
                imageHeight: 100,
                width: "600px",
                title: "Vui lòng nhập số tiền cần nạp cho phương thức đã chọn!",
                showConfirmButton: true,
                confirmButtonText: "Ok",
            }).then(() => {
                amountInput.css({
                    'border': '1px solid red',
                    'box-shadow': '0 0 10px rgba(255, 0, 0, 0.5)'
                });
                amountInput.focus();
            });

            return false;
        } else {
            amountInput.css({
                'border': '',
                'box-shadow': ''
            });
        }

        if (amountInput && amountInput.val() < 10000) {
            Swal.fire({
                position: "center",
                imageUrl: imageError,
                imageWidth: 100,
                imageHeight: 100,
                width: "600px",
                title: "Số tiền cần nạp phải ít nhất 10.000 VND",
                showConfirmButton: true,
                confirmButtonText: "Ok",
            }).then(() => {
                amountInput.css({
                    'border': '1px solid red',
                    'box-shadow': '0 0 10px rgba(255, 0, 0, 0.5)'
                });
                amountInput.focus();
            });

            return false;
        } else {
            amountInput.css({
                'border': '',
                'box-shadow': ''
            });
        }

        this.submit();
        amountInput.reset();
    });
}

$(document).ready(function () {
    window.dataLayer = window.dataLayer || [];
    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-XZVGYE20GD');

    var width = $(document).width()
    if (width > 1600) width = 1600
    var height = width / 2.7
    $("#home-slider .item").css('height', height + 'px')
    $('.bg-video').on('ended', function () {
        $("#carousel-id").carousel("next")
    })

    $('#carousel-id').on('slid.bs.carousel', function () {
        if ($('#carousel-id .item.active').children().hasClass('bg-video')) {
            $(".bg-video").trigger('play')
        }
        else {
            $(".bg-video").trigger('pause')
            setTimeout(function () {
                $("#carousel-id").carousel('next')
            }, 5000)
        }
    })

    if ($('#carousel-id .item.active').children().hasClass('bg-video')) {
        $('#carousel-id').carousel({
            interval: false
        })
    }
    $("#main-slider").owlCarousel({
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        smartSpeed: 800,
        video: true,
        loop: true,
        items: 1,
        nav: true,
        dots: true
    });
    $("#carousel-id").owlCarousel({
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        smartSpeed: 800,
        video: true,
        loop: true,
        items: 1,
        nav: true,
        dots: true
    });
    $("#promotion-slider").owlCarousel({
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        loop: true,
        nav: true,
        dots: false,
        margin: 20,
        responsive: {
            0: { items: 4, }, 420: { items: 2, }, 620: { items: 3, },
            768: { items: 3, }, 980: { items: 3 }, 1010: { items: 2 }, 1100: { items: 2 }
        }
    });

    $("#nowshowing-slider, #comingsoon-slider").owlCarousel({
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        loop: true,
        responsive: {
            0: { items: 3, }, 420: { items: 2, }, 620: { items: 3, },
            768: { items: 3, }, 980: { items: 3 }, 1010: { items: 3 }, 1100: { items: 4 }
        },
        nav: true,
        dots: false
    });

    $("#nowshowing-slider2").owlCarousel({
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        loop: true,
        responsive: {
            0: { items: 3, }, 420: { items: 2, }, 620: { items: 3, },
            768: { items: 3, }, 980: { items: 3 }, 1010: { items: 3 }, 1100: { items: 3 }
        },
        nav: true,
        dots: false
    });

    var mainpopup = sessionStorage.getItem('mainpopup');
    if (!mainpopup) {
        $("body").addClass("open-main-popup");
    }
    $(".main-popup").click(function () {
        sessionStorage.setItem('mainpopup', 'close');
        $("body").removeClass("open-main-popup");
    });


    var mainpopup = sessionStorage.getItem('mainpopup');
    if (!mainpopup) {
        $("body").addClass("open-main-popup");
    }
    $(".main-popup").click(function () {
        sessionStorage.setItem('mainpopup', 'close');
        $("body").removeClass("open-main-popup");
    });

    var chatbox = document.getElementById('fb-customer-chat');
    if (chatbox) {
        chatbox.setAttribute("page_id", "1853915061599035");
        chatbox.setAttribute("attribution", "biz_inbox");
    }


    window.fbAsyncInit = function () {
        FB.init({
            xfbml: true,
            version: 'v12.0'
        });
    };

    $('.select2').select2({
        placeholder: "Chọn tỉnh/thành phố", // Placeholder cho dropdown
        allowClear: true, // Cho phép xóa lựa chọn
        width: '100%',
    });

    // Khi người dùng nhấn vào liên kết trong phần Đăng nhập
    $('.attr-link a').on('click', function (event) {
        event.preventDefault();

        // Lấy ID của tab được nhấn
        var targetTab = $(this).attr('href');

        // Xóa class 'active' khỏi tất cả các tab và thẻ `li`
        $('.tab-pane, .menu li').removeClass('active');

        // Thêm class 'active' vào tab và thẻ `li` tương ứng
        $(targetTab).addClass('active in');
        $('.menu li').find('a[href="' + targetTab + '"]').parent().addClass('active');
    });

    $('.datepickerRegister').datepicker({
        format: 'dd-mm-yyyy', // Định dạng ngày
        autoclose: true,      // Tự động đóng khi chọn ngày
        todayHighlight: true   // Nổi bật ngày hôm nay
    });

    $('.datepickerProfile').datepicker({
        format: 'dd-mm-yyyy', // Định dạng ngày
        autoclose: true,      // Tự động đóng khi chọn ngày
        todayHighlight: true   // Nổi bật ngày hôm nay
    });

    $('.date-filter').datepicker({
        format: 'mm/yyyy',
        minViewMode: 1,
        autoclose: true,
        language: 'vi',
        endDate: new Date(),
    });
    $('.date-filter-year').datepicker({
        format: 'yyyy',
        minViewMode: "years", // Chế độ chỉ cho phép chọn năm
        autoclose: true,
        language: 'vi',
        endDate: new Date(),
    });
    $('.date-filter-month').datepicker({
        format: 'mm/yyyy',
        minViewMode: 1,
        autoclose: true,
        language: 'vi',
        endDate: new Date(),
    });

    function togglePasswordVisibility(passwordInput, icon) {
        const type = passwordInput.attr('type') === 'password' ? 'text' : 'password';
        passwordInput.attr('type', type);

        icon.toggleClass('fa-eye fa-eye-slash');
    }

    $('#toggle-password-icon-register').on('click', function () {
        const passwordInput = $('input[id="passwordRegister"]');
        togglePasswordVisibility(passwordInput, $(this));
    });

    $('#toggle-confirm-password-icon').on('click', function () {
        const passwordInput = $('input[name="password_confirmation"]');
        togglePasswordVisibility(passwordInput, $(this));
    });

    $('.toggle-password-login-icon').on('click', function () {
        const passwordInput = $('input[id="passwordLogin"]');
        togglePasswordVisibility(passwordInput, $(this));
    });

    $('.toggle-old-password-icon').on('click', function () {
        const passwordInput = $('input[name="old_password"]');
        togglePasswordVisibility(passwordInput, $(this));
    });

    $('.toggle-password-change-icon').on('click', function () {
        const passwordInput = $('input[name="password"]');
        togglePasswordVisibility(passwordInput, $(this));
    });

    $('#toggle-password-icon-forgot').on('click', function () {
        const passwordInput = $('input[name="password"]');
        togglePasswordVisibility(passwordInput, $(this));
    });

    $('.toggle-confirm-password-icon').on('click', function () {
        const passwordInput = $('input[name="confirm_password"]');
        togglePasswordVisibility(passwordInput, $(this));
    });

    // header menu mobile
    function header_mobile() {
        const menuMobile = $('.menu-icon');
        const btnCloseMenuMobile = $('.btn-close-menu');
        const menuContent = $('.menu-mobile-content');

        menuMobile.on('click', function () {
            menuMobile.css('opacity', '0');
            menuContent.toggleClass('active');
        });

        btnCloseMenuMobile.on('click', function () {
            menuMobile.css('opacity', '1');
            menuContent.toggleClass('active');
        });

        $('.menu-item > a').on('click', function (e) {
            e.preventDefault();
            $(this).parent().toggleClass('active');
        });
    }

    function icon_venom() {
        const popup = $("#venom-popup");
        const closeButton = $("#fragmentClose");

        // Kiểm tra nếu chưa đóng popup trước đó
        if (!localStorage.getItem("venomPopupHidden")) {
            popup.show(); // Hiện popup
        }

        // Xử lý khi bấm nút close
        closeButton.click(function () {
            popup.hide(); // Ẩn popup ngay lập tức
            localStorage.setItem("venomPopupHidden", "true"); // Lưu trạng thái đã đóng
        });
    }

    function payment_alert() {
        const transactionSucceed = $('meta[name="transaction_succeed"]').attr('content');
        const transactionFailed = $('meta[name="transaction_failed"]').attr('content');
        const statusFailed = $('meta[name="status_failed"]').attr('content');
        const amount = $('meta[name="amount"]').attr('content');
        const exp = $('meta[name="exp"]').attr('content');

        const image = $('meta[name="image-success"]').attr('content');
        const imageError = $('meta[name="image-error"]').attr('content');

        if (transactionSucceed === '1') {
            Swal.fire({
                imageUrl: image,
                imageWidth: 100,
                imageHeight: 100,
                title: 'Thanh toán thành công!',
                html: `Số tiền nạp: ${amount} VND<br>Bạn nhận được: ${exp} exp`, // Sử dụng html thay vì text
                confirmButtonText: 'OK',
                width: "400px",
            });
        } else if (transactionFailed === '0') {
            Swal.fire({
                imageUrl: imageError,
                imageWidth: 100,
                imageHeight: 100,
                title: 'Giao dịch của bạn đã bị hủy!',
                confirmButtonText: 'OK',
                width: "400px",
            });
        } else if (statusFailed === '0') {
            Swal.fire({
                imageUrl: imageError,
                imageWidth: 100,
                imageHeight: 100,
                title: 'Lỗi trong quá trình thanh toán',
                text: 'Đã có lỗi xảy ra trong quá trình thanh toán.',
                confirmButtonText: 'OK',
                width: "400px",
            });
        }
    }

    function change_avatar() {
        $('input[type="file"]').on('change', function (event) {
            const input = event.target;
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    // Thiết lập ảnh làm background cho div.input-box.input-ic-clear
                    $('.input-box-image.input-ic-clear').css('background-image', 'url(' + e.target.result + ')');
                    $('.input-box-image.input-ic-clear').css('background-size', 'cover'); // Đảm bảo ảnh phủ đầy div
                    $('.input-box-image.input-ic-clear').css('background-position', 'center'); // Căn giữa ảnh

                    // Cập nhật giá trị input hidden (nếu cần thiết)
                    $('#avatar').val(e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        });
    }

    function exp() {
        const exp = parseInt($('.expData').attr('data-exp')) || 0; // Chuyển giá trị EXP thành số
        const thresholds = [0, 4000000, 8000000]; // Các mốc EXP
        const $progress = $('.progress');
        const $progressText = $('.progress-text');

        // Xác định mốc hiện tại và tính % EXP
        let percentage = 0; // Phần trăm tiến trình
        let nextRankExp = 0; // Mốc EXP tiếp theo
        let currentRankExp = 0; // Mốc EXP hiện tại

        if (exp <= thresholds[1]) {
            // Nếu EXP trong khoảng 0 -> 4,000,000
            currentRankExp = thresholds[0];
            nextRankExp = thresholds[1];
            percentage = (exp / thresholds[1]) * 55; // Tính theo tỷ lệ phần trăm (0 -> 50%)
        } else if (exp <= thresholds[2]) {
            // Nếu EXP trong khoảng 4,000,000 -> 8,000,000
            currentRankExp = thresholds[1];
            nextRankExp = thresholds[2];
            percentage = ((exp - thresholds[1]) / (thresholds[2] - thresholds[1])) * 50 + 55; // (50% -> 100%)
        } else {
            // Nếu EXP vượt qua 8,000,000
            percentage = 100; // Đầy thanh
            currentRankExp = thresholds[2];
            nextRankExp = thresholds[2];
        }

        $progress.css('width', percentage + '%');
        $progressText.text(`${exp.toLocaleString('vi-VN')} / ${nextRankExp.toLocaleString('vi-VN')}`);

        if (percentage === 100) {
            $progress.css('background', '#ff5722'); // Đổi màu nếu đạt tối đa
        }
    }

    exp();
    change_avatar();
    payment_alert();
    icon_venom();
    header_mobile();
    modal_deposit();
})

// //modal trailer
// document.addEventListener('DOMContentLoaded', function () {
//     // Lưu lại src gốc của các iframe
//     const iframes = document.querySelectorAll('iframe[id^="iframe-trailer-"]');
//     iframes.forEach((iframe) => {
//         iframe.dataset.originalSrc = iframe.src; // Lưu src gốc vào data attribute
//     });

//     var trailer_url = "";
//     // Lắng nghe sự kiện đóng modal
//     const modals = document.querySelectorAll('div[id^="modal-trailer-"]');
//     modals.forEach((modal) => {
//         $(modal).on('hidden.bs.modal', function () {
//             // Lấy iframe bên trong modal này
//             const iframe = modal.querySelector('iframe');

//             if (iframe) {
//                 iframe.src = ''; // Xóa src để dừng video
//                 setTimeout(() => {
//                     iframe.src = iframe.dataset.originalSrc; // Khôi phục src
//                 }, 100); // Đợi 100ms trước khi khôi phục src
//             }
//         });
//     });
// });


// Modal trailer
// Modal trailer
document.addEventListener('DOMContentLoaded', function () {
    // Lắng nghe sự kiện đóng modal
    const modals = document.querySelectorAll('div[id^="modal-trailer-"]');
    modals.forEach((modal) => {
        $(modal).on('hidden.bs.modal', function () {
            // Lấy iframe bên trong modal này
            const iframe = modal.querySelector('iframe');

            if (iframe) {
                // Lưu src gốc vào biến tạm
                const originalSrc = iframe.src;

                // Xóa src để dừng video
                iframe.src = '';

                // Khôi phục src sau khi xóa
                setTimeout(() => {
                    iframe.src = originalSrc;
                }, 100); // Đợi 100ms trước khi gán lại
            }
        });
    });
});


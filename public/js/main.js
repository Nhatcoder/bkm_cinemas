const cinema_id = $('meta[name="cinema_id"]').attr('content');

$(function () {
    $("#datepicker").datepicker({
        autoclose: true,
        todayHighlight: true
    }).datepicker('update', new Date());

});

$(document).ready(function () {
    $(".booking-calender .fa.fa-clock-o").removeClass(this);
    $(".booking-calender .fa.fa-clock-o").addClass('fa-clock');
});
$('.my-select').selectpicker();

jQuery(document).ready(function () {
    setTimeout(function () {
        dlabSettingsOptions.version = 'light';
        new dlabSettings(dlabSettingsOptions);
    }, 1000)
    jQuery(window).on('resize', function () {
        dlabSettingsOptions.version = 'light';
        new dlabSettings(dlabSettingsOptions);
        // jQuery('.dz-theme-mode').addClass('active');
    });
});


const mySwiper = new Swiper('.swiper-container', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    speed: 300,
    mousewheel: true,
    slidesPerView: 6, // Hiển thị 5 ảnh cùng lúc
    spaceBetween: 15, // Khoảng cách giữa các ảnh

    coverflowEffect: {
        rotate: 30,
        slideShadows: true
    },

    // If we need pagination
    pagination: {
        el: '.swiper-pagination',
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

    // And if we need scrollbar
    scrollbar: {
        el: '.swiper-scrollbar',
    },
});

function formatTime(createdAt) {
    const date = new Date(createdAt);
    return date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', hour12: true });
}

function formatDate(createdAt) {
    const date = new Date(createdAt);
    return `${date.getDate()} Tháng ${date.getMonth() + 1}, ${date.getFullYear()}`;
}


echo.private('change_status_order.' + cinema_id)
    .listen('OrderStatusUpdated', (data) => {
        if (data.order.status === 'waiting_for_cancellation') {
            $.ajax({
                url: $('.list_notification').attr('data-url'),
                type: 'GET',
                data: {
                    cinema_id: cinema_id,
                },
                success: (response) => {
                    $('.T_notification').addClass('nav-item');
                    $('.list_notification').empty();

                    response.data.forEach(item => {
                        const listItem = `
                            <li>
                                <div class="timeline-panel">
                                    <div class="media-body">
                                        <h6 class="mb-1">${item.title}</h6>
                                        <small class="d-block">
                                            Lúc ${formatTime(item.created_at)} ${formatDate(item.created_at)}
                                        </small>
                                    </div>
                                </div>
                            </li>
                        `;
                        $('.list_notification').append(listItem);
                    });
                },
                error: (xhr) => {
                    console.error('Error:', xhr.responseText);
                }
            });

            toastr.warning(`Người dùng ${data.order.userName} yêu cầu hủy đơn: ${data.order.code}`);
        }
    });


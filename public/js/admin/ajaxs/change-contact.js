$(document).ready(function () {
    $('.btnStatus').on('click', function (e) {
        e.preventDefault();

        Swal.fire({
            title: 'Chuyển đổi trạng thái.',
            text: 'Bạn chắc chắn muốn chuyển trạng thái liên hệ sang hoàn thành?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Đồng ý',
            cancelButtonText: 'Huỷ'
        }).then((result) => {
            if (result.isConfirmed) {
                let id = $(this).data('id');

                let status = $(this).data('status');

                let url = $(this).data('url');

                var csrfToken = $('meta[name="csrf-token"]').attr("content");

                var btnStatus = $(this);

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        _token: csrfToken,
                        id: id,
                        status: status,
                    },
                    success: function (response) {
                        if (response.status == true) {
                            if (response.contact.status == 0) {
                                btnStatus.removeClass('btn-success');
                                btnStatus.addClass('btn-danger');
                                btnStatus.attr('data-status', 1);
                                btnStatus.text('Chưa xử lý');
                            }

                            if (response.contact.status == 1) {
                                btnStatus.removeClass('btn-danger');
                                btnStatus.addClass('btn-success');
                                btnStatus.attr('data-status', 0);
                                btnStatus.text('Hoàn thành');
                            }
                        } else {
                            Swal.fire({
                                title: "Đã xảy ra lỗi!",
                                icon: "error",
                                confirmButtonText: "OK",
                            });
                        }
                    },
                    error: function (xhr) {
                        Swal.fire({
                            title: "Đã xảy ra lỗi!",
                            icon: "error",
                            confirmButtonText: "OK",
                        });
                    }
                });
            }
        });
    });
});

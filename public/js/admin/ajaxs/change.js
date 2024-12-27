$(document).ready(function () {
    function toggleStatus(button, statusType) {
        var itemId = button.data("id");
        var url = button.data("url");
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        if (!url) {
            Swal.fire({
                title: "Bạn không có quyền truy cập!",
                icon: "warning",
                showConfirmButton: false,
                timer: 3000
            });
            return;
        }
        $.ajax({
            url: url,
            type: "POST",
            data: {
                id: itemId,
                _token: csrfToken,
            },
            success: function (response) {
                var newStatus = '';

                if(statusType === "active") {
                    newStatus = response.newStatus;
                } else if(statusType === "hot") {
                    newStatus = response.newHot;
                } else if(statusType === "approve") {
                    newStatus = response.newApprove;

                }

                // Đảm bảo nút được cập nhật chính xác
                button.attr("data-status", newStatus);  // Cập nhật lại thuộc tính data-status

                var buttonText = "";
                if (statusType === "active") {
                    buttonText = newStatus == 1 ? "Hiển thị" : "Ẩn";
                } else if (statusType === "hot") {
                    buttonText = newStatus == 1 ? "Nổi bật" : "Không";
                } else {
                    buttonText = newStatus == 1 ? "Đã duyệt" : "Chưa duyệt";
                }

                // Cập nhật text hiển thị của nút
                button.text(buttonText);

                // Cập nhật class của button (btn-success hoặc btn-danger)
                button.removeClass("btn-success btn-danger btn-warning");
                var buttonClass = newStatus == 1 ? "btn-success" : "btn-danger";

                if(statusType === "approve"){
                    var buttonClass = newStatus == 1 ? "btn-success" : "btn-warning";
                }
                button.addClass(buttonClass);

                // Thông báo thành công
                Swal.fire({
                    title: "Thành công!",
                    text: "Cập nhật trạng thái thành công!",
                    icon: "success",
                    confirmButtonText: "OK",
                });
            },
            error: function (xhr, status, error) {
                Swal.fire({
                    title: "Thất bại!",
                    text: xhr.responseJSON.message,
                    icon: "warning",
                    showConfirmButton: false,
                    timer: 3000
                });
            },

        });
    }


    function changeOrder(input) {
        var url = input.data("url");
        var itemId = input.data("id");
        var order = input.val();
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        $.ajax({
            url: url,
            type: "POST",
            data: {
                id: itemId,
                order: order,
                _token: csrfToken,
            },
            success: function (response) {
                Swal.fire({
                    title: "Số thứ tự đã được thay đổi",
                    icon: "success",
                    confirmButtonText: "OK",
                });
            }, error: function (xhr, status, error) {
                Swal.fire({
                    title: "Thất bại!",
                    text: xhr.responseJSON.message,
                    icon: "warning",
                    showConfirmButton: false,
                    timer: 3000
                });
            },
        });
    }

    function changePosition(input) {
        var url = input.data("url");
        var itemId = input.data("id");
        var position = input.val();
        var positionOld = input.data('value');

        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        $.ajax({
            url: url,
            type: "POST",
            data: {
                id: itemId,
                position: position,
                _token: csrfToken,
            },
            success: function (response) {
                if(response.status) {
                    Swal.fire({
                        title: "Vị trí đã được thay đổi",
                        icon: "success",
                        confirmButtonText: "OK",
                    });
                } else {
                    Swal.fire({
                        title: `Vị trí số '${position}' này đã tồn tại!`,
                        text: "Vui lòng chọn vị trí khác để hiển thị",
                        icon: "error",
                        confirmButtonText: "OK",
                    });

                    input.val(positionOld);
                }
            },
            error: function(error) {
                Swal.fire({
                    title: "Đã xảy ra lỗi!",
                    text: "Vui lòng liên hệ với bộ phận kỹ thuật.",
                    icon: "error",
                    confirmButtonText: "OK",
                });
            }
        });
    }



    // Event handler for toggling active status
    $(".toggle-active-btn").click(function () {
        toggleStatus($(this), "active");
    });

    // Event handler for toggling hot status
    $(".toggle-hot-btn").click(function () {
        toggleStatus($(this), "hot");
    });

    $(".changeStatusUser").click(function (e) {
        e.preventDefault();

        var url = $(this).data("url");
        var itemId = $(this).data("id");
        var status = $(this).data("status");
        var csrfToken = $('meta[name="csrf-token"]').attr("content");

        if(status == 1) {
            Swal.fire({
                title: 'Khóa tài khoản!',
                text: 'Bạn chắc chắn muốn khóa tài khoản này không?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng ý',
                cancelButtonText: 'Huỷ'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: {
                            id: itemId,
                            status: status,
                            _token: csrfToken,
                        },
                        success: function (response) {
                            Swal.fire({
                                title: "Khóa tài khoản thành công!",
                                text: "Để sử dụng tài khoản hãy kích hoạt nó.",
                                icon: "success",
                                confirmButtonText: "OK",
                            }).then(() => {
                                location.reload();
                            }, 1000);
                        },
                        error: function (xhr, status, error) {
                            console.log("Error:", error);
                        },
                    });
                }
            })
        } else {
            Swal.fire({
                title: 'Kích hoạt tài khoản!',
                text: 'Bạn chắc chắn muốn kích hoạt lại tài khoản này không?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng ý',
                cancelButtonText: 'Huỷ'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: {
                            id: itemId,
                            status: status,
                            _token: csrfToken,
                        },
                        success: function (response) {
                            Swal.fire({
                                title: "Kích hoạt tài khoản thành công!",
                                icon: "success",
                                confirmButtonText: "OK",
                            }).then(() => {
                                location.reload();
                            }, 1000);
                        },
                        error: function (xhr, status, error) {
                            console.log("Error:", error);
                        },
                    });
                }
            })
        }
    })

    $(".changeOrder").change(function () {
        changeOrder($(this));
    })
    $(".changePosition").change(function () {
        changePosition($(this));
    })

    $(".toggle-status-btn").click(function () {
        toggleStatus($(this), "approve");
    });


        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        $('.send-promotion').each(function(e) {
            $(this).on('click', function() {
                var id = $(this).attr('data-id');
                var url = $(this).attr('data-url');
                Swal.fire({
                    title: 'Xác nhận gửi',
                    text: 'Bạn có chắc chắn muốn gửi thông tin sự kiện đến mọi người không?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Có',
                    cancelButtonText: 'Không'
                })
            .then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        url: url,
                        method: "POST", // Phương thức gửi
                        data: {
                            _token: csrfToken, // Thêm token bảo mật
                            id: id,
                        },
                        success: function(response) {
                                Swal.fire({
                                    position: "top-center",
                                    icon: "success",
                                    title: response.message,
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                        },
                        error: function(xhr, status, error) {},
                    });
                }
            })

        })

        })
  

});

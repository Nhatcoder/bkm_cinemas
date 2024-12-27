$(document).ready(function() {
    $(document).on('click', '.removeImage', function() {
        let id = $(this).data('id');
        let url = $(this).data('url');
        let image = $(this).data('image');
        let $this = $(this);

        let imagePreview = $this.closest('.avatar-preview').find('.imagePreview');

        Swal.fire({
            title: 'Xác nhận xóa',
            text: 'Bạn có chắc chắn muốn xóa hình ảnh này không?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Có',
            cancelButtonText: 'Không'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        id: id,
                        _token: $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function(data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Thành công',
                            text: 'Hình ảnh đã được xóa thành công.'
                        }).then(() => {
                            $(imagePreview).css('background-image', `url(${image})`);
                            $this.hide();
                        });
                    },
                    error: function(data) {
                        // Hiển thị thông báo lỗi
                        Swal.fire({
                            icon: 'error',
                            title: 'Lỗi',
                            text: 'Có lỗi xảy ra. Vui lòng thử lại.'
                        });
                        console.log(data);
                    }
                });
            }
        });
    });

    $(".btnRemoveEditAjax").click(function() {
        var url = $(this).data('url');
        var method = $(this).data('method');
        var button = $(this);
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        Swal.fire({
            title: 'Bạn có chắc chắn muốn xóa ảnh này?',
            text: "Hành động này không thể hoàn tác!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xóa',
            cancelButtonText: 'Hủy'
        }).then(function(result) {
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    type: method,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function(data) {
                        Swal.fire(
                            data.message
                        );
                        var fileInputWrapper = button.closest('.variantColor');
                        fileInputWrapper.remove();
                    }.bind(this),
                    error: function(xhr, status, error) {
                        Swal.fire(
                            'Lỗi!',
                            'Có lỗi xảy ra trong quá trình xóa ảnh.',
                            'error'
                        );
                    }
                });
            }
        });
    });
});

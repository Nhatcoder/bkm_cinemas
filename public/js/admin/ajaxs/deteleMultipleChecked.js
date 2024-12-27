let tagAllChecked = document.querySelector('#item-all-checked') ?? document.createElement('div');
let items = document.querySelectorAll('.item-checked');
let hiddenInputItemId = document.querySelector('#value-item-id');
let selectedIds = [];

function updateHiddenInput() {
    hiddenInputItemId.value = selectedIds.join(',');
}

tagAllChecked.addEventListener('change', function(e) {
    let isChecked = tagAllChecked.checked;

    selectedIds = [];

    items.forEach(function(tagItem) {
        let id = tagItem.getAttribute('data-id');
        tagItem.checked = isChecked;

        if (isChecked && !selectedIds.includes(id)) {
            selectedIds.push(id);
        }
    });

    updateHiddenInput();

});

items.forEach(function(tagItem) {
    tagItem.addEventListener('change', function() {
        let id = tagItem.getAttribute('data-id');
        if (this.checked) {
            if (!selectedIds.includes(id)) {
                selectedIds.push(id);
            }
        } else {
            selectedIds = selectedIds.filter(function(item) {
                return item !== id;
            });
        }

        let allChecked = Array.from(items).every(function(item) {
            return item.checked;
        });
        tagAllChecked.checked = allChecked;

        updateHiddenInput();
    });
});

$(document).ready(function() {

    $("#btn-delete-all").click(function() {
        let url = $(this).data('url');
        if (selectedIds.length <= 0) {
            Swal.fire(
                'Cảnh báo!',
                'Vui lòng chọn ít nhất 1 bản ghi',
                'warning'
            );
            return;
        }
        Swal.fire({
            title: 'Bạn có chắc chắn muốn xóa ?',
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
                    type: "post",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        selectedIds: selectedIds
                    },
                    success: function(data) {
                        Swal.fire(
                            'Thành công!',
                            data.status_succeed,
                            'success'
                        ).then(function() {
                            window.location.reload();
                        });
                    },
                    error: function(xhr, status, error) {
                        Swal.fire(
                            'Lỗi!',
                            'Có lỗi xảy ra trong quá trình xóa',
                            'error'
                        );
                    }
                });
            }

        });
    })
})
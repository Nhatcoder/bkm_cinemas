function getMaxIndex() {
    let indices = $('.permission').map(function() {
        return parseInt($(this).data('index'));
    }).get();
    if (indices.length === 0) {
        return 1;
    }
    let maxIndex = Math.max(...indices);
    return maxIndex + 1;
}


$('#add-permission').on('click', function() {
    let index = getMaxIndex();
    let html = `<div class="row mb-4 permission" data-index="${index}">
            <div class="col-5">
                <label class="form-label mb-2">Tên chức năng</label>
                <input type="text" id="name" name="permissions[${index}][name]"
                    class="form-control" placeholder="Nhập tên chức năng (Thêm bài viết)"
                    value="">
            </div>
            <div class="col-5">
                <label class="form-label mb-2">Giá trị chức năng</label>
                <input type="text" id="name" name="permissions[${index}][value]"
                    class="form-control" placeholder="Nhập giá trị chức năng (create-post)"
                    value="">
            </div>
            <div class="col-2 d-flex flex-column justify-content-end">
                <button class="btn btn-danger delete-permission" type="button">
                    Xóa
                </button>
            </div>
        </div>`;

    $('#list-permission').append(html);
})

$('#list-permission').on('click', '.delete-permission', function() {
    $(this).closest('.permission').remove();
});









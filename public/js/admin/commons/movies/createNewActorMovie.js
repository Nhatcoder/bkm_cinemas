$('#add-actor').on('click', addActor);
$(document).on('click', '.avatar-preview', function () {
    const index = $(this).closest('.actor-row').data('index');
    $(`#actorImage${index}`).click();
});

function addActor() {
    let maxIndex = Math.max(0, ...$('#actor-list .actor-row').map(function() {
        return parseInt($(this).data('index'), 10);
    }).get());
    let index = maxIndex + 1;
    const actorRow = `
   <div class="actor-row row mt-3" data-index="${index}">
        <div class="col-2">
            <label
                class="form-label mb-2">Tên:</label>
            <input type="text" value=""
                name="actors[${index}][name]" class="form-control">
        </div>
        <div class="col-3">
            <label
                class="form-label mb-2">Ngày sinh:</label>
            <input type="date" value=""
                name="actors[${index}][birth_date]" class="form-control">
        </div>
        <div class="col-2">
            <label
                class="form-label mb-2">Quốc tịch:</label>
            <input type="text" value=""
                name="actors[${index}][nationality]" class="form-control">
        </div>
        <div class="col-2">
            <label
                class="form-label mb-2">Vai trò:</label>
            <input type="text" value=""
                value="" name="role[${index}]" class="form-control">
        </div>
        <div class="col-2">
            <label
                class="form-label mb-2 d-flex justify-content-center align-items-center">
                Ảnh diễn viên:
            </label>
            <div class="avatar-upload actor-upload">
                <div class="position-relative d-flex justify-content-center align-items-center">
                    <div class="avatar-preview">
                        <div class="imagePreview"
                            style="background-image: url('/../../images/no-img-avatar.png');">
                        </div>
                    </div>
                    <input type="file"
                        class="form-control d-none uploadImage"
                        id="actorImage${index}" name="actors[${index}][image]"
                        accept=".png, .jpg, .jpeg">
                </div>
            </div>
        </div>
        <div class="col-1 mt-4">
            <a href="#" class="btn btn-danger" onclick="deleteActor(event)">
                <i class="fa fa-trash"></i>
            </a>
        </div>
    </div>`;
    $('#actor-list').append(actorRow);
}

function deleteActor(event) {
    event.preventDefault(); // Ngăn chặn hành động mặc định của thẻ <a>
    const actorRow = event.target.closest('.actor-row'); // Tìm hàng cha
    if (actorRow) {
        actorRow.remove(); // Xóa hàng
    }
}

function attachFileInputListener(fileInput) {
    $(fileInput).on('change', function (event) {
        const files = event.target.files;
        let firstBox = true;
        for (let i = 0; i < files.length; i++) {
            let reader = new FileReader();
            reader.onload = function (e) {
                if (firstBox) {
                    let wrapper = $(fileInput).closest('.file-input-wrapper');
                    let img = wrapper.find('img');
                    let customButton = wrapper.find('.custom-button');
                    let removeButton = wrapper.find('.remove-button');

                    img.attr('src', e.target.result);
                    img.show();
                    customButton.hide();
                    removeButton.show();
                    firstBox = false;
                } else {
                    let container = $('#variantContainer');
                    let newBox = $('<div>').addClass('variantColor d-flex align-items-center').html(`
                        <div class="mb-3 w-25 file-input-wrapper" style="margin-right: 18px; width: 110px !important;">
                            <input type="file" accept=".png, .jpg, .jpeg" multiple name="relatedPhotos[]" class="form-control relatedPhotos">
                            <div class="custom-button" style="display: none;"><i class="nav-icon fas fa-upload"></i></div>
                            <img src="${e.target.result}" alt="Preview Image" style="display: block;">
                            <button class="remove-button" type="button" style="display: flex;">&times;</button>
                        </div>
                    `);
                    let removeButton = newBox.find('.remove-button');
                    attachRemoveButtonListener(removeButton);
                    container.append(newBox);
                }
            };
            reader.readAsDataURL(files[i]);
        }
    });
}

function attachRemoveButtonListener(removeButton) {
    $(removeButton).on('click', function (event) {
        var variantColor = $('.variantColor');
        variantColor.each(function (index, element) {
            if (variantColor.length === 1) {
                let wrapper = $(event.target).closest('.file-input-wrapper');
                let img = wrapper.find('img');
                let fileInput = wrapper.find('input[type="file"]');
                let customButton = wrapper.find('.custom-button');
                img.attr('src', '');
                img.hide();
                customButton.show();
                fileInput.val('');
                attachFileInputListener(fileInput);
                $(removeButton).hide();
            } else {
                $(event.target).closest('.variantColor').remove();
            }
        });
    });
}
function readURL(input) {
    if (input.files && input.files[0]) {
        const imagePreview = $(input).closest('.position-relative').find('.imagePreview')
        const reader = new FileReader();
        reader.onload = function (e) {
            $(imagePreview).css('background-image', 'url(' + e.target.result + ')');
            $(imagePreview).hide();
            $(imagePreview).fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$(document).ready(function () {

    $(document).on('change', '.uploadImage', function () {
        readURL(this);
    });

    $('.remove-img').on('click', function () {
        var imageUrl = "images/no-img-avatar.png";
        $('#avatar-preview, .imagePreview').removeAttr('style');
        $('.imagePreview').css('background-image', 'url(' + imageUrl + ')');
    });

    $('#addAnhLienQuan').on('click', function () {
        let container = $('#variantContainer');
        let newBox = $('<div>').addClass('variantColor d-flex align-items-center').html(`
            <div class="mb-3 w-25 file-input-wrapper" style="margin-right: 18px; width: 110px !important;">
                <input type="file" accept=".png, .jpg, .jpeg" multiple name="relatedPhotos[]" class="form-control relatedPhotos">
                <div class="custom-button"><i class="nav-icon fas fa-upload"></i></div>
                <img src="#" alt="Preview Image" style="display: none;">
                <button class="remove-button" type="button" style="display: flex;">&times;</button>
            </div>
        `);
        let fileInput = newBox.find('input[type="file"]');
        let removeButton = newBox.find('.remove-button');
        attachFileInputListener(fileInput);
        attachRemoveButtonListener(removeButton);
        container.append(newBox);
    });

    $('input[name="relatedPhotos[]"]').each(function () {
        attachFileInputListener(this);
    });

    $('.remove-button').each(function () {
        attachRemoveButtonListener(this);
    });

})




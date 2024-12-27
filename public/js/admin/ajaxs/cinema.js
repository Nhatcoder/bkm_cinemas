let isSubmitting = false;

$(document).on('change', '#select_city', changeCity);

function changeCity(e) {
    if (isSubmitting) return;
    isSubmitting = true;
    const select = $(e.target);
    const city_id = select.val();
    const url = select.attr('data-url');

    if (!url) {
        isSubmitting = false;
        return;
    }

    $.ajax({
        url: url,
        type: 'GET',
        data: {
            city_id: city_id
        },
        success: (response) => {
            let selectHtml = '<select name="area_id" class="form-control" id="select_area">';
            selectHtml += '<option value="">--chọn--</option>';
            $.each(response.areas, function(index, item) {
                selectHtml += `<option value="${item.id}">${item.name}</option>`;
            });
            selectHtml += '</select>';
            $('#select_area').closest('.bootstrap-select').replaceWith(selectHtml);
            $('#select_area').selectpicker('refresh');
            isSubmitting = false
        },

        error: (xhr) => {
            isSubmitting = false
        }
    });
}

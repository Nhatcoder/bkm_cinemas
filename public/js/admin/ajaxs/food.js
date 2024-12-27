function formatFoodOption(food) {
    if (!food.id) {
        return food.text;
    }

    var $foodOption = $(
        '<span><img src="' + $(food.element).data('image') +
        '" class="img-thumbnail" style="width: 40px; height: 40px; margin-right: 10px;" />' + food.text + '</span>'
    );
    return $foodOption;
}

$("#food").select2({
    templateResult: formatFoodOption,
    templateSelection: formatFoodOption
});
function getMaxIndex() {
    let indices = $('.food-item').map(function() {
        return parseInt($(this).data('index'));
    }).get();
    if (indices.length === 0) {
        return 1;
    }
    let maxIndex = Math.max(...indices);
    return maxIndex + 1;
}

let foodIds = [];
let index = getMaxIndex();
let isSubmit = true;
$('#food option:selected').each(function() {
    var foodId = $(this).val();
    if (!foodIds.includes(foodId)) {
        foodIds.push(foodId);
    }
});
$('#food').on('change', function() {
    var selectedFoods = $(this).find(':selected');
    var currentFoodIds = [];

    selectedFoods.each(function() {
        var foodId = $(this).val();
        currentFoodIds.push(foodId);

        if (!foodIds.includes(foodId)) {
            index++;
            var foodName = $(this).text();
            var foodImage = $(this).data('image');

            foodIds.push(foodId);

            var foodDiv = `
                <div id="food-${foodId}" class="col-4 p-1 food-item" data-index="${index}">
                    <div class="d-flex align-items-center justify-content-center">
                        <h5 class="me-3" style="width: 75px">${foodName}</h5>
                        <img src="${foodImage}" alt="" style="width: 75px; height:75px;" class="me-3">
                        <div class="me-3">
                            <label for="">Số lượng</label>
                            <input type="number" name="item[${index}][quantity]"
                                class="form-control" placeholder="Số lượng" min="1" value="1" style="width: 100px;">
                            <input type="text" hidden value="${foodId}" name="item[${index}][food_id]">
                        </div>
                        <button type="button" class="btn btn-danger shadow btn-xs sharp me-3 btn-remove" data-id="${foodId}">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                </div>`;
            $('#list-food').append(foodDiv);
        }
    });

    foodIds = foodIds.filter(function(foodId) {
        if (!currentFoodIds.includes(foodId)) {
            $('#food-' + foodId).remove();
            return false;
        }
        return true;
    });

    console.log(foodIds);
});

$('#list-food').on('click', '.btn-remove', function() {

    var foodId = $(this).data('id');
    $('#food-' + foodId).remove();
    foodIds = foodIds.filter(id => id != foodId);
    console.log(foodIds);
    $('#food option[value="' + foodId + '"]').prop('selected', false);
    $('#food').trigger('change.select2');
});

$('#form-combo').on('submit', function(e) {
    e.preventDefault();
    if (!isSubmit) {
        return;
    }
    isSubmit = false;

    var formData = new FormData(this);
    var formAction = $(this).attr('action');

    $.ajax({
        url: formAction,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        success: function(response) {
            Swal.fire({
                icon: 'success',
                title: response.message,
                timer: 1000,
                showConfirmButton: false
            }).then(() => {
                window.location.href = response.url;
            });
        },
        error: function(xhr, status, error) {
            if (xhr.status === 422) {
                const errors = xhr.responseJSON.errors;

                $('.text-red').remove();
                $.each(errors, function(field, messages) {
                    const fieldId = field.replace(/\./g, '_');
                    const fieldElement = $('#' + fieldId + '_error');
                    fieldElement.html('<span class="text-red">' + messages
                        .join('<br>') + '</span>');
                });

            } else {
                Swal.fire({
                    icon: 'error',
                    title: xhr.responseJSON.message,
                    timer: 1000,
                    showConfirmButton: false
                }).then(() => {
                    window.location.href = xhr.responseJSON.url;
                });
            }
        },
        complete: function() {
            isSubmit = true;
        }
    });
});






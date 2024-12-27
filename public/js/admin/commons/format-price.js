// Hàm để thêm dấu chấm vào số
function formatNumberInput(value) {
    return value.replace(/\D/g, '') // Xóa ký tự không phải số
        .replace(/\B(?=(\d{3})+(?!\d))/g, ','); // Thêm dấu chấm sau mỗi 3 chữ số
}

$(document).ready(function() {
    $('#price').on('input', function() {
        $(this).val(formatNumberInput($(this).val()));
    });

    $('#price_old').on('input', function() {
        $(this).val(formatNumberInput($(this).val()));
    });
});

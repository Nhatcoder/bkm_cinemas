$(document).ready(function() {
    // Checkbox chọn tất cả modules
    $('#selectAllModules').change(function() {
        const isChecked = $(this).is(':checked');

        // Check hoặc uncheck tất cả các module và permissions
        $('.module-checkbox, .permission-checkbox').prop('checked', isChecked);
    });

    // Lắng nghe sự kiện click trên các checkbox module
    $('.module-checkbox').change(function() {
        const moduleId = $(this).data('module-id');
        const isChecked = $(this).is(':checked');

        // Check hoặc uncheck tất cả các permission trong module này
        $(`.permission-checkbox[data-module-id="${moduleId}"]`).prop('checked', isChecked);
    });

    // Lắng nghe sự kiện click trên các checkbox permission
    $('.permission-checkbox').change(function() {
        const moduleId = $(this).data('module-id');

        // Kiểm tra nếu tất cả các permission của module này đã được check
        const allPermissions = $(`.permission-checkbox[data-module-id="${moduleId}"]`);
        const allChecked = allPermissions.length === allPermissions.filter(':checked').length;

        // Check hoặc uncheck checkbox của module nếu tất cả các permission đều được check
        $(`.module-checkbox[data-module-id="${moduleId}"]`).prop('checked', allChecked);

        // Kiểm tra nếu tất cả các modules và permissions đã được check
        const allModulesAndPermissions = $('.module-checkbox, .permission-checkbox');
        const allCheckedModulesAndPermissions = allModulesAndPermissions.length === allModulesAndPermissions.filter(':checked').length;

        // Check hoặc uncheck checkbox chọn tất cả
        $('#selectAllModules').prop('checked', allCheckedModulesAndPermissions);
    });
});

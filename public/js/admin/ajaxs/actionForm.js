let btn_submit = $('.btn_submit');
btn_submit.click(function() {
    let buttonId = $(this).attr('id');
    let url = $(this).attr('data-url');
    if (buttonId === 'addNewPost' || buttonId === 'saveTemporary' || buttonId === 'storeCopy') {
        $('#myForm').attr('action', url).submit();
    }
});
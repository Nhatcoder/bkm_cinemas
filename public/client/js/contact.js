
$("#contact-form").on("submit", function (e) {
    e.preventDefault();
    let formAction = $(this).attr('action');

    let formData = {
        full_name: $("input[name='contact[full_name]']").val()?.trim() || "",
        email: $("input[name='contact[email]']").val()?.trim() || "",
        phone_number: $("input[name='contact[phone_number]']").val()?.trim() || "",
        title: $("input[name='contact[title]']").val()?.trim() || "",
        content: $("textarea[name='contact[content]']").val()?.trim() || "",
    };

    let rules = {
        full_name: { required: "Họ và tên là bắt buộc." },
        email: {
            required: "Email là bắt buộc.",
            pattern: { regex: /^[^\s@]+@[^\s@]+\.[^\s@]+$/, message: "Vui lòng nhập đúng định dạng email." },
        },
        phone_number: {
            required: "Số điện thoại là bắt buộc.",
            pattern: { regex: /^(0[3|5|7|8|9])+([0-9]{8})$/, message: "Số điện thoại không đúng định dạng Việt Nam." },
        },
        title: { required: "Tiêu đề là bắt buộc." },
        content: {
            required: "Nội dung là bắt buộc.",
            length: { min: 10, max: 1000, message: "Nội dung phải có từ 10 đến 1000 ký tự." },
        },
    };

    $(".error-message").remove();

    let valid = true;

    for (let field in formData) {
        let value = formData[field];
        let rule = rules[field];

        if (rule.required && !value) {
            showError(`input[name='contact[${field}]'], textarea[name='contact[${field}]']`, rule.required);
            valid = false;
            continue;
        }

        if (rule.pattern && value) {
            let { regex, message } = rule.pattern;
            if (!regex.test(value)) {
                showError(`input[name='contact[${field}]'], textarea[name='contact[${field}]']`, message);
                valid = false;
                continue;
            }
        }

        if (rule.length && value) {
            let { min, max, message } = rule.length;
            if (value.length < min || value.length > max) {
                showError(`textarea[name='contact[${field}]']`, message);
                valid = false;
            }
        }
    }

    if (valid) {
        $.ajax({
            url: formAction,
            type: 'POST',
            data: $(this).serializeArray(),
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            success: function (response) {
                Swal.fire({
                    icon: 'success',
                    title: response.message,
                    timer: 1000,
                    showConfirmButton: false
                }).then(() => {
                    $("#contact-form")[0].reset();
                });
            },
            error: function (xhr, status, error) {
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    $(".error-message").remove();
                    $('.text-red').remove();
                    $.each(errors, function(field, messages) {
                        const fieldId = field.replace(/\./g, '_');
                        const fieldElement = $('#' + fieldId + '_error');
                        fieldElement.html('<span style="color: red">' + messages
                            .join('<br>') + '</span>');
                    });

                } else {
                    Swal.fire({
                        icon: 'error',
                        title: xhr.responseJSON.message,
                        timer: 1000,
                        showConfirmButton: false
                    });
                }
            }
        });
    }
});

function showError(selector, message) {
    let error = `<span class="error-message text-danger">${message}</span>`;
    $(selector).after(error);
}

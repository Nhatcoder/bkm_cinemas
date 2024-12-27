$(".btn-email-subscribe").click(function () {
    var email = $("#email-subscribe").val();
    console.log(email);
  
    var url = $(this).attr("data-url");
    var csrfToken = $(this).attr("data-token");
  
    $.ajax({
      url: url,
      type: "POST",
      data: {
        _token: csrfToken, // Thêm token bảo mật
        email: email,
      },
  
      success: function (response) {
        Swal.fire({
          icon: "success",
          title: response.message,
          timer: 1000,
          showConfirmButton: false,
        }).then(() => {
          window.location.href = response.url;
        });
      },
      error: function (xhr, status, error) {
        if (xhr.status === 422) {
          const errors = xhr.responseJSON.errors;
  
          $(".text-red").remove();
          $.each(errors, function (field, messages) {
            const fieldId = field.replace(/\./g, "_");
            const fieldElement = $("#" + fieldId + "_error");
            fieldElement.html(
              '<span style="color:red">' + messages.join("<br>") + "</span>",
            );
          });
        } else {
          Swal.fire({
            icon: "error",
            title: xhr.responseJSON.message,
            timer: 1000,
            showConfirmButton: false,
          }).then(() => {
            window.location.href = xhr.responseJSON.url;
          });
        }
      },
    });
  });
  
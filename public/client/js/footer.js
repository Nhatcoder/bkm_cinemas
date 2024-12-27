$(".btn-email-subscribe").click(function () {
  var email = $("#email-subscribe").val();

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
      $(".text-red").remove(); // Ẩn tất cả thông báo lỗi khi thành công
      if (response.result.original.status === "success") {
        Swal.fire({
          position: "top-center",
          icon: "success",
          title: response.result.original.message,
          showConfirmButton: false,
          timer: 1500,
        }).then(() => {
          $("#modal-subscribe").modal("hide");
          $('#email-subscribe').val('');
        });
      } else if (response.result.original.status === "faile") {
        Swal.fire({
          position: "top-center",
          icon: "error",
          title: response.result.original.message,
          showConfirmButton: false,
          timer: 1500,
        });
      }
    },
    error: function (xhr, status, error) {
      if (xhr.status === 422) {
        const errors = xhr.responseJSON.errors;

        $(".text-red").remove(); // Xóa tất cả lỗi cũ trước khi hiển thị lỗi mới
        $.each(errors, function (field, messages) {
          const fieldId = field.replace(/\./g, "_");
          const fieldElement = $("#" + fieldId + "_error");
          fieldElement.html(
            '<span class="text-red" style="color:red">' +
              messages.join("<br>") +
              "</span>",
          );
        });
      }
    },
  });
});

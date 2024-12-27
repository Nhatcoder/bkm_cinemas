$(document).ready(function () {
  $(".del-item-notification").click(function () {
    var csrfToken = $(this).attr("data-token");
    var id = $(this).attr("data-id");
    var url = $(this).attr("data-url");
    var button = $(this); // Tham chiếu đến nút hiện tại

    $.ajax({
      url: url,
      type: "POST",
      data: {
        _token: csrfToken, // Thêm token bảo mật
        id: id,
      },
      success: function (response) {
        console.log(response);
        // Xóa phần tử sau khi xóa thành công
        button.closest(".notification-item").remove();
      },
      error: function (xhr, status, error) {
        console.log(error);
      },
    });
  });
});

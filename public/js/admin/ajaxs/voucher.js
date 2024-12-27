$(document).ready(function () {
  // Gán sự kiện click cho nút tặng voucher
  // load ajax hiển thị danh sách tài khoản thỏa mãn điều kiện của voucher và search
  $(".giftButton").click(function () {
    var voucherId = $(this).data("voucher-id");
    var url = $(this).attr("data-url");
    var csrfToken = $('meta[name="csrf-token"]').attr("content");
    // Gửi yêu cầu Ajax
    $.ajax({
      url: url,
      type: "POST",
      data: {
        _token: csrfToken,
        id: voucherId,
      },
      success: function (response) {
        // Xử lý dữ liệu trả về và hiển thị trong modal
        var modalBody = $("#basicModal_" + voucherId + " .modal-body");
        var accountsHtml = "";

        // Giả sử response là mảng tài khoản
        if (response.data && response.data.length > 0) {
          response.data.forEach(function (account) {
            // In đối tượng account ra console để kiểm tra
            // Thêm HTML vào accountsHtml, kiểm tra hasVoucher

            accountsHtml += `
                                <div class="form-check">
                                    <label class="form-check-label" for="checkbox_${account.id}">
                                        ${account.name} (${account.email})
                                    </label>
                                    <input class="form-check-input"
                                           type="checkbox"
                                           value="${account.id}"
                                           id="checkbox_${account.id}"
                                           ${account.hasVoucher ? "checked" : ""}>
                                </div>
                            `;
          });
        } else {
          accountsHtml =
            "<h4>Không có tài khoản nào thỏa mãn điều kiện của voucher.</h4>";
        }
        // Chèn danh sách checkbox vào modal
        modalBody.find(".overflow-auto").html(accountsHtml);

        // Lắng nghe sự kiện nhập từ khóa tìm kiếm
        $("[id^='searchUserInput_']").on("input", function () {
          var idVoucher = $(this).attr("id").split("_")[1]; // Lấy ID của voucher
          var url = $(this).attr("data-url");
          var query = $(this).val(); // Lấy từ khóa tìm kiếm
          var csrfToken = $('meta[name="csrf-token"]').attr("content");

          // Gửi yêu cầu Ajax để tìm kiếm người dùng theo từ khóa
          $.ajax({
            url: url, // API tìm kiếm
            type: "POST",
            data: {
              _token: csrfToken, // Thêm token bảo mật
              keyword: query, // Truyền từ khóa tìm kiếm
              id: idVoucher, // Truyền voucherId
            },
            success: function (response) {
              var modalBody = $("#basicModal_" + idVoucher + " .modal-body");
              var accountsHtml = "";

              // Kiểm tra nếu có dữ liệu trả về từ tìm kiếm
              if (response.data && response.data.length > 0) {
                response.data.forEach(function (account) {
                  accountsHtml += `
        <div class="form-check">
            <label class="form-check-label" for="checkbox_${account.id}">
                ${account.name} (${account.email})
            </label>
            <input class="form-check-input"
                   type="checkbox"
                   value="${account.id}"
                   id="checkbox_${account.id}"
                   ${account.hasVoucher ? "checked" : ""}>
        </div>
    `;
                });
              } else {
                accountsHtml = "<h4>Không tìm thấy kết quả nào.</h4>";
              }

              // Cập nhật danh sách tài khoản trong modal
              modalBody.find(".overflow-auto").html(accountsHtml);
            },
            error: function (xhr, status, error) {
              console.log("Có lỗi xảy ra: " + error);
            },
          });
        });

        // bắt đầu xử lý tặng voucher cho tài khoản
        $(".giftVoucher").on("click", function () {
          var url = $(this).attr("data-url");
          var csrfToken = $('meta[name="csrf-token"]').attr("content");
          const arrayUserSelected = $(".form-check-input:checked")
            .map(function () {
              return $(this).val(); // Lấy giá trị (value) của từng checkbox
            })
            .get(); // Chuyển thành mảng JavaScript

          const userSelected = arrayUserSelected.filter(function (userId) {
            return userId !== "all"; // Loại bỏ phần tử "all"
          });
          // if (userSelected.length <= 0) {
          //     Swal.fire(
          //         'Cảnh báo!',
          //         'Vui lòng chọn ít nhất 1 tài khoản',
          //         'warning'
          //     );
          //     return;
          // }

          // Gửi dữ liệu qua AJAX
            $.ajax({
              url: url,
              method: "POST", // Phương thức gửi
              data: {
                _token: csrfToken, // Thêm token bảo mật
                voucherId: voucherId,
                userIds: userSelected, // các tài khoản đã chọn
              },
              success: function (response) {
                if (response.data.original.status == "success") {
                  Swal.fire({
                    position: "top-center",
                    icon: "success",
                    title: response.data.original.message,
                    showConfirmButton: false,
                    timer: 1500,
                  }).then(() => {
                    // Sau khi Swal hoàn tất, tải lại trang
                    location.reload();
                  });
                } else if (response.data.original.status == "faile") {
                  Swal.fire({
                    position: "top-center",
                    icon: "error",
                    title: response.data.original.message,
                    showConfirmButton: false,
                    timer: 1500,
                  });
                }

              },
              error: function (xhr, status, error) {},
            });
        });


        $(".modal_voucher").each(function (e) {
          const self = $(this);
          var checkedAllAccount = self.find("#checked_all_account");

          function initiallyChecked() {
            var totalCheckboxes = self
            .find(".form-check-input")
            .not("#checked_all_account").length;



          // Số lượng checkbox nhỏ được chọn
          var checkedCheckboxes = self
            .find(".form-check-input:checked")
            .not("#checked_all_account").length;
            console.log(checkedCheckboxes);
          // Cập nhật trạng thái của nút "Chọn tất cả"
          checkedAllAccount.prop("checked", totalCheckboxes === checkedCheckboxes);
          }
          initiallyChecked();

          // Sự kiện khi nhấn vào nút "Chọn tất cả"
          checkedAllAccount.on("click", function () {
            // Chọn hoặc bỏ chọn tất cả các checkbox nhỏ
            self
              .find(".form-check-input")
              .not("#checked_all_account")
              .prop("checked", this.checked);
          });

          self.find(".close-modal").on("click", function () {
            self
            .find("#checked_all_account").prop("checked", false);
          })
          // Tổng số checkbox nhỏ (không tính nút "Chọn tất cả")


        // Cập nhật trạng thái của nút "Chọn tất cả"

          // Sự kiện khi nhấn vào từng checkbox nhỏ
          $(document).on("click", ".form-check-input", function () {

            if ($(this).attr("id") === "checked_all_account") return; // Bỏ qua nút "Chọn tất cả"

            // Tổng số checkbox nhỏ (không tính nút "Chọn tất cả")
            var totalCheckboxes = self
              .find(".form-check-input")
              .not("#checked_all_account").length;
              console.log(totalCheckboxes);


            // Số lượng checkbox nhỏ được chọn
            var checkedCheckboxes = self
              .find(".form-check-input:checked")
              .not("#checked_all_account").length;

            // Cập nhật trạng thái của nút "Chọn tất cả"
            checkedAllAccount.prop("checked", totalCheckboxes === checkedCheckboxes);
          });

        });

      },
      error: function (xhr, status, error) {
        console.log("Có lỗi xảy ra: " + error);
      },
    });

  }); // Đóng sự kiện click

});


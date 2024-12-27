$(document).ready(function () {
  var fullConditionType = $("#full-conditionType");
  var fullLevelType = $("#full-levelType");

  function initializeForm() {
    var condition = $("#discountCondition").val();
    var conditionType = $("#conditionType").val();
    var levelType = $("#levelType").val();

    if (condition === "all") {
      fullConditionType.addClass("d-none");
      fullLevelType.addClass("d-none");
      $("#conditionType").val("");
      $("#levelType").val("");
    } else if (condition === "condition") {
      fullConditionType.removeClass("d-none");
      $("#conditionType").val(conditionType || "");

      if (conditionType === "level_up") {
        fullLevelType.removeClass("d-none");
        $("#levelType").val(levelType || "");
      } else {
        fullLevelType.addClass("d-none");
        $("#levelType").val("");
      }
    }
  }

  initializeForm();

  $("#discountCondition").change(function () {
    var condition = $(this).val();
    if (condition === "condition") {
      $("#time_voucher").attr("hidden", true);
      $("#quantity_voucher").attr("hidden", true);
      fullConditionType.removeClass("d-none");
      $("#conditionType").val("");
    } else if (condition === "all") {
      $("#time_voucher").attr("hidden", false);
      $("#quantity_voucher").attr("hidden", false);
      fullConditionType.addClass("d-none");
      fullLevelType.addClass("d-none");
    }
  });

  $("#conditionType").change(function () {
    var conditionType = $(this).val();
    if (conditionType === "level_up") {
      fullLevelType.removeClass("d-none");
      $("#levelType").val("");
      
    } else if (conditionType === "new_member") {
      fullLevelType.addClass("d-none");
    }
  });

  function validateVoucherConditions() {
    var discountCondition = $("#discountCondition").val();
    var conditionType = $("#conditionType").val();
    var levelType = $("#levelType").val();
    var errorMessage = "";

    $(".validation-error").remove();

    if (discountCondition === "condition" && !conditionType) {
      $(
        "<p class='text-danger validation-error'>Bạn phải chọn loại điều kiện.</p>",
      ).appendTo("#full-conditionType");
    }

    if (conditionType === "level_up" && !levelType) {
      $(
        "<p class='text-danger validation-error'>Bạn phải chọn loại hạng.</p>",
      ).appendTo("#full-levelType");
    }

    if (
      (discountCondition === "condition" && !conditionType) ||
      (conditionType === "level_up" && !levelType)
    ) {
      return false;
    }

    return true;
  }

  $("#discountCondition").change(function () {
    if ($(this).val() === "all") {
      $("#conditionType").val("");
      $("#levelType").val("");
      $(".validation-error").remove();
    } else {
      validateVoucherConditions();
    }
  });

  $("#conditionType").change(function () {
    validateVoucherConditions();
  });

  $("form").submit(function (event) {
    if (!validateVoucherConditions()) {
      event.preventDefault();
    }
  });

  // xử lý chỗ chọn phần % thì hiện input nhập %, chọn tiền thì hiện input nhập tiền
  var discount_value = $(".discount_value").data("value");
  var discount_type = $(".discount_type").data("value");
  console.log(discount_type);

  if (discount_type == "money") {
    $("#discount_value_money").val(discount_value); //
    $("#discount_value_percent").val("");
  } else if (discount_type == "percent") {
    $("#discount_value_percent").val(discount_value); //
    $("#discount_value_money").val(""); // Đặt lại giá trị rỗng cho ô %.
  }

  $("#discount_value").change(function () {
    var discount_type = $(this).val();
    if (discount_type === "percent") {
      $("#full-discount_value_percent").removeClass("d-none");
      $("#full-discount_value_money").addClass("d-none");
      $("#discount_value_money").prop("disabled", true); // Disable trường không cần
      $("#discount_value_percent").prop("disabled", false);
      $("#error_discount_value_money").text(""); // Xóa lỗi khi chuyển đổi
    } else if (discount_type === "money") {
      $("#full-discount_value_money").removeClass("d-none");
      $("#full-discount_value_percent").addClass("d-none");
      $("#discount_value_percent").prop("disabled", true); // Disable trường không cần
      $("#discount_value_money").prop("disabled", false);
      $("#error_discount_value_percent").text(""); // Xóa lỗi khi chuyển đổi
    }
  });

  // Hàm kiểm tra giá trị và hiển thị lỗi
  function validateField(inputId, errorId, type) {
    var value = $(inputId).val();
    var errorElement = $(errorId);

    // Kiểm tra giá trị nhập
    if (!value) {
      errorElement.text("Vui lòng nhập giá trị giảm.");
      return false;
    } else if (type === "percent" && (value < 1 || value > 100)) {
      errorElement.text("Phần trăm giảm giá phải nằm trong khoảng 1-100.");
      return false;
    } else if (type === "money" && (value <= 0 || value > 1000000)) {
      errorElement.text("Số tiền phải lớn hơn 0 và không quá 1,000,000.");
      return false;
    } else {
      errorElement.text(""); // Xóa lỗi nếu hợp lệ
      return true;
    }
  }

  // Xử lý sự kiện submit form
  $("#voucher-form").on("submit", function (event) {
    var isValid = true;

    // Kiểm tra từng trường dữ liệu
    if ($("#discount_value").val() === "money") {
      isValid &= validateField(
        "#discount_value_money",
        "#error_discount_value_money",
        "money",
      );
    }

    if ($("#discount_value").val() === "percent") {
      isValid &= validateField(
        "#discount_value_percent",
        "#error_discount_value_percent",
        "percent",
      );
    }

    // Nếu có lỗi, ngăn submit
    if (!isValid) {
      event.preventDefault();
    }
  });

  // Ràng buộc giá trị tối đa cho ô input khi nhập
  $("#discount_value_money").on("input", function () {
    var maxMoney = 1000000;
    if ($(this).val() > maxMoney) {
      $(this).val(maxMoney);
    }
  });

  $("#discount_value_percent").on("input", function () {
    var maxPercent = 100;
    if ($(this).val() > maxPercent) {
      $(this).val(maxPercent);
    }
  });

  // Khởi tạo: Đảm bảo trường ban đầu hoạt động đúng
  $("#discount_value").trigger("change");
});

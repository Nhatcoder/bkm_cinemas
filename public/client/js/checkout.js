$(document).ready(function () {
	function handleShopeePay(redirect) {
		isShopeePay = true;
		window.location = redirect;
	}
	$(".btn-checkout").click(function () {
		if (!agree) {
			bootbox.alert({
				message:
					"Báº¡n chÆ°a Ä‘á»“ng Ă½ vá»›i Ä‘iá»u khoáº£n thanh toĂ¡n trá»±c tuyáº¿n cá»§a chĂºng tĂ´i!",
				backdrop: true,
			});
			return;
		}
		if (!age_required) {
			bootbox.alert({
				message:
					"Báº¡n cáº§n Ä‘á»“ng Ă½ vĂ  hiá»ƒu ráº±ng phim nĂ y <b>KHĂ”NG DĂ€NH CHO</b> ngÆ°á»i cĂ³ Ä‘á»™ tuá»•i dÆ°á»›i <b>" +
					maxAge +
					" tuá»•i</b> vĂ o ráº¡p xem!",
				backdrop: true,
			});
			return;
		}

		$(".btn-checkout").attr("disabled", true);
		$(".btn-checkout .loading").removeClass("hidden");
		$.ajax({
			url: url_post_checkout,
			type: "POST",
			data: {
				payment_method: payment_method,
				gifts: { tickets: gift_tickets, combo: gift_combo },
			},
			dataType: "JSON",
			success: function (data) {
				if (data.status == "success") {
					if (payment_method == "shopeepay") {
						handleShopeePay(data.location);
					} else {
						window.location = data.location;
					}
				} else {
					bootbox.alert({
						message: data.msg,
						backdrop: true,
					});
					$(".btn-checkout").attr("disabled", false);
				}
				$(".btn-checkout .loading").addClass("hidden");
			},
			error: function () {
				bootbox.alert({
					message: "Lá»—i káº¿t ná»‘i tá»›i server! Vui lĂ²ng thá»­ láº¡i",
					backdrop: true,
				});
				$(".btn-checkout .loading").addClass("hidden");
			},
		});
	});

	$("#agree").change(function () {
		agree = $(this).prop("checked");
		allowConfirm();
	});

	$("#age_required").change(function () {
		age_required = $(this).prop("checked");
		allowConfirm();
	});
	function allowConfirm() {
		if (agree && age_required) {
			$(".btn-checkout").addClass("pay");
		} else {
			$(".btn-checkout").removeClass("pay");
		}
	}

	$("input[name='payment_method']").click(function () {
		payment_method = $(this).val();
	});
	// Coupon

	$("#applyCoupon").click(function () {
		const coupon = $("#coupon").val();
		if (coupon == "") {
			bootbox.alert({
				message: "Vui lĂ²ng nháº­p mĂ£ giáº£m giĂ¡!",
				backdrop: true,
			});
			return;
		}
		applyCoupon(coupon);
	});

	$("#selectCoupon").click(function () {
		const coupon = $("input[name='coupon']:checked").val();
		console.log(coupon);
		if (!coupon) {
			bootbox.alert({
				message: "Vui lĂ²ng chá»n mĂ£ giáº£m giĂ¡!",
				backdrop: true,
			});
			return;
		}
		applyCoupon(coupon);
	});

	$("#removeCoupon").click(function () {
		bootbox.confirm(
			"Báº¡n cháº¯c cháº¯n muá»‘n xĂ³a mĂ£ giáº£m giĂ¡?",
			function (result) {
				if (result == true) {
					$.ajax({
						url: url_remove_coupon,
						type: "POST",
						dataType: "JSON",
						success: function (data) {
							if (data.status == "success") {
								$("#totalPrice").text(
									numberWithCommas(data.amount)
								);
								$("#decrease").text("");
								$("#formCoupon").show();
								$("#useCoupon").hide();
								$("input[name='payment_method']").prop(
									"disabled",
									false
								);
							} else {
								bootbox.alert({
									message: data.msg,
									backdrop: true,
								});
							}
						},
						error: function () {
							bootbox.alert({
								message:
									"Lá»—i káº¿t ná»‘i tá»›i server! Vui lĂ²ng thá»­ láº¡i",
								backdrop: true,
							});
						},
					});
				}
			}
		);
	});

	function applyCoupon(coupon) {
		$("#applyCoupon ,#selectCoupon").prop("disabled", true);
		$("#applyCoupon .loading, #selectCoupon .loading").removeClass(
			"hidden"
		);
		$("#applyCoupon .textbtn, #selectCoupon .textbtn").addClass("hidden");
		$.ajax({
			url: url_apply_coupon,
			type: "POST",
			data: { coupon: coupon, payment_method: payment_method },
			dataType: "JSON",
			success: function (data) {
				if (data.status == 1) {
					$("#coupon").val("");
					$("#coupon-code").text(coupon);
					$("#totalPrice").text(numberWithCommas(data.amount));
					$("#decrease").text(
						"(-" + numberWithCommas(data.decrease) + " Ä‘)"
					);
					$("#origin_amount").text(
						numberWithCommas(data.origin_amount) + " Ä‘"
					);
					$("#formCoupon").hide();
					$("#useCoupon").show();
					if (data.payment_methods) {
						if (jQuery.inArray("all", data.payment_methods) == -1) {
							$("input[name='payment_method']").each(function (
								pm
							) {
								if (
									jQuery.inArray(
										$(this).val(),
										data.payment_methods
									) == -1
								) {
									$(this).prop("disabled", true);
								}
							});
						}
					}
					$("#couponModal").modal("hide");
				} else {
					bootbox.alert({
						message: data.message,
						backdrop: true,
					});
				}
				$("#applyCoupon .loading, #selectCoupon .loading").addClass(
					"hidden"
				);
				$("#applyCoupon .textbtn, #selectCoupon .textbtn").removeClass(
					"hidden"
				);
			},
			error: function () {
				bootbox.alert({
					message: "Lá»—i káº¿t ná»‘i tá»›i server! Vui lĂ²ng thá»­ láº¡i",
					backdrop: true,
				});
				$("#applyCoupon .loading, #selectCoupon .loading").addClass(
					"hidden"
				);
				$("#applyCoupon .textbtn, #selectCoupon .textbtn").removeClass(
					"hidden"
				);
			},
		}).always(function () {
			$("#applyCoupon ,#selectCoupon").prop("disabled", false);
		});
	}
	// Count down
	function checkoutCountDown() {
		var x = setInterval(function () {
			if (isShopeePay) {
				var orderId = $(".ticketId ins").text();
				$.getJSON(
					"/api/mobile/v2/transaction/" + orderId,
					function (response) {
						if (
							response.data.order.status == "ThĂ nh cĂ´ng" ||
							response.data.order.status == "Giao dá»‹ch Ä‘Ă£ bá»‹ há»§y"
						) {
							clearInterval(x);
							window.location = "/giao-dich/" + orderId;
						}
					}
				);
				return;
			}

			--distance;
			if (distance < 0) {
				$("#count-time").text("00:00");
				clearInterval(x);
				$.ajax({
					url: url_cancel_transaction,
					data: { transactionID: transactionID },
					type: "POST",
					success: function () {
						console.log("ok");
					},
				}).always(function () {
					alert("Háº¿t thá»i gian Ä‘áº·t vĂ©, vui lĂ²ng Ä‘áº·t láº¡i");
					window.location = url_movie_with_showtime;
				});
				return;
			}

			var minutes = Math.floor((distance % (60 * 60)) / 60);
			var seconds = Math.floor(distance % 60);
			if (minutes < 10) minutes = "0" + minutes;
			if (seconds < 10) seconds = "0" + seconds;
			$("#count-time").text(minutes + ":" + seconds);
		}, 1000);
	}

	checkoutCountDown();
});